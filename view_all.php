<?php
// Start the session to store errors
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', 'KARTHIK@2004', 'om');

// Check for connection error
if ($conn->connect_error) {
    $_SESSION['errors'][] = 'Database connection failed: ' . $conn->connect_error;
    header('Location: error_page.php'); // Redirect to an error page
    exit;
}

// Initialize variables
$form_id = isset($_GET['form_id']) ? intval($_GET['form_id']) : null;
$result = null; // Initialize result variable
$form_title = ''; // Initialize form_title variable

if ($form_id === null) {
    $_SESSION['errors'][] = 'Form ID is missing.';
} else {
    $form_table = "form_" . $form_id;

    // Get the form title from the forms table
    $form_result = $conn->query("SELECT form_title FROM forms WHERE id = $form_id");
    if ($form_result && $form_result->num_rows > 0) {
        $form_data = $form_result->fetch_assoc();
        $form_title = htmlspecialchars($form_data['form_title']);
    } else {
        $_SESSION['errors'][] = 'Form not found.';
    }

    // Handle search
    $search_query = '';
    if (isset($_POST['search']) && !empty($_POST['search'])) {
        $search_term = $conn->real_escape_string($_POST['search']);
        
        // Get all columns of the table
        $columns_result = $conn->query("SHOW COLUMNS FROM $form_table");
        $columns = [];
        while ($column = $columns_result->fetch_assoc()) {
            $columns[] = $column['Field'];
        }
        
        // Build the search query dynamically
        $search_conditions = array_map(function($column) use ($search_term) {
            return "$column LIKE '%$search_term%'";
        }, $columns);
        $search_query = " WHERE " . implode(' OR ', $search_conditions);
    }
    
    $result = $conn->query("SELECT * FROM $form_table" . $search_query);

    // Check for query errors
    if (!$result) {
        $_SESSION['errors'][] = 'Error fetching submissions: ' . $conn->error;
    } elseif ($result->num_rows == 0) {
        $_SESSION['errors'][] = 'No submissions found for this form.';
    }
}

// Handle deletion
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $conn->query("DELETE FROM $form_table WHERE id = $delete_id");
    header("Location: view_all.php?form_id=$form_id");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Form Submissions</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .image-preview {
            max-width: 200px;
            max-height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
<div class="container mt-5">

    <!-- Display Errors if there are any -->
    <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php foreach ($_SESSION['errors'] as $error): ?>
                <strong>Error:</strong> <?php echo htmlspecialchars($error); ?><br>
            <?php endforeach; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['errors']); // Clear errors after displaying ?>
    <?php endif; ?>

    <!-- Search Form -->
    <form method="post" class="mb-4">
        <div class="form-row align-items-center">
            <div class="col">
                <input type="text" class="form-control" name="search" placeholder="Search..." value="<?php echo isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ''; ?>">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <h2>Form Submissions for "<?php echo $form_title; ?>"</h2>
    
    <!-- Export to CSV Button -->
    <form action="export_csv.php" method="get">
        <input type="hidden" name="form_id" value="<?php echo htmlspecialchars($form_id); ?>">
        <button type="submit" class="btn btn-success mb-3">Export to CSV</button>
    </form>

    <?php if ($result && $result->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <?php
                        // Display dynamic table headers
                        $fields = $result->fetch_fields();
                        foreach ($fields as $field) {
                            if ($field->name != 'id' && $field->name != 'submitted_at') {
                                echo '<th>' . htmlspecialchars($field->name) . '</th>';
                            }
                        }
                        echo '<th>Submitted At</th>';
                        echo '<th>Actions</th>';
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($submission = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($submission['id']); ?></td>
                            <?php foreach ($submission as $field_name => $value): ?>
                                <?php if ($field_name != 'id' && $field_name != 'submitted_at'): ?>
                                    <td>
                                        <?php
                                        // Display image if it's an image file
                                        if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $value)): ?>
                                            <img src="uploads/<?php echo htmlspecialchars($value); ?>" alt="<?php echo htmlspecialchars($field_name); ?>" class="image-preview">
                                        <?php else: ?>
                                            <?php echo htmlspecialchars($value); ?>
                                        <?php endif; ?>
                                    </td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <td><?php echo htmlspecialchars($submission['submitted_at']); ?></td>
                            <td>
                                <a href="edit_submission.php?form_id=<?php echo $form_id; ?>&id=<?php echo htmlspecialchars($submission['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="view_all.php?form_id=<?php echo $form_id; ?>&delete_id=<?php echo htmlspecialchars($submission['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this submission?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-muted">No submissions found or there was an error retrieving the submissions.</p>
    <?php endif; ?>

</div>

<!-- Bootstrap JS and jQuery for functionality -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
