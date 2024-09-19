<?php
// Database connection
$conn = new mysqli('localhost', 'root', 'KARTHIK@2004', 'your_database');

// Check if form_id is set in the URL
if (!isset($_GET['form_id'])) {
    die('Form ID is missing in the URL.');
}

$form_id = intval($_GET['form_id']);  // Sanitize and convert to integer

// Debugging: Print form_id to check if it's being received correctly
echo "Form ID received: " . $form_id . "<br>";

if (empty($form_id)) {
    die('Form ID is empty or invalid.');
}

// Fetch form metadata
$form_data_query = $conn->prepare("SELECT * FROM forms WHERE id = ?");
$form_data_query->bind_param("i", $form_id);
$form_data_query->execute();
$form_data_result = $form_data_query->get_result();

if ($form_data_result->num_rows == 0) {
    die('Form not found.');
}

$form_data = $form_data_result->fetch_assoc();

// Debugging: Print form title to verify the form data
echo "Form title: " . $form_data['form_title'] . "<br>";

// Fetch submissions for the form
$table_name = "form_" . $form_id;
$submissions_query = "SELECT * FROM `$table_name`";
$submissions_result = $conn->query($submissions_query);

if (!$submissions_result) {
    die('Error fetching submissions: ' . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Submissions</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Submissions for <?php echo htmlspecialchars($form_data['form_title']); ?></h2>

    <!-- Display submissions -->
    <?php if ($submissions_result->num_rows > 0): ?>
        <div class="list-group">
            <?php while ($submission = $submissions_result->fetch_assoc()): ?>
                <button type="button" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#submission_<?php echo $submission['id']; ?>">
                    Submission ID: <?php echo $submission['id']; ?>
                </button>
                <div id="submission_<?php echo $submission['id']; ?>" class="collapse">
                    <pre><?php print_r($submission); ?></pre>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>No submissions found.</p>
    <?php endif; ?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
