<?php
$conn = new mysqli('localhost', 'root', 'KARTHIK@2004', 'om');

// Handle form deletion
if (isset($_GET['delete_form_id'])) {
    $form_id = $_GET['delete_form_id'];

    // Step 1: Get form details (poster image, QR code) from the `forms` table
    $form = $conn->query("SELECT * FROM forms WHERE id = $form_id")->fetch_assoc();
    $poster_image = $form['poster_image'];
    $qr_image = $form['qr_image'];

    // Step 2: Delete poster and QR image from server
    if (file_exists($poster_image)) {
        unlink($poster_image); // Delete the poster image
    }
    if (file_exists($qr_image)) {
        unlink($qr_image); // Delete the QR code image
    }

    // Step 3: Delete the form metadata from the `forms` table
    $conn->query("DELETE FROM forms WHERE id = $form_id");

    // Step 4: Drop the dynamic table for the form (e.g., `form_1`)
    $table_name = "form_" . $form_id;
    $conn->query("DROP TABLE IF EXISTS $table_name");

    // Redirect after deletion
    header("Location: admin_manage_forms.php?message=Form+Deleted+Successfully");
}

// Fetch all forms to display in the admin panel
$forms = $conn->query("SELECT * FROM forms");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Forms</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Manage Forms</h2>

    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success"><?php echo $_GET['message']; ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Poster Image</th>
                <th>QR Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($form = $forms->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $form['id']; ?></td>
                    <td><?php echo $form['form_title']; ?></td>
                    <td><?php echo $form['form_description']; ?></td>
                    <td><img src="<?php echo $form['poster_image']; ?>" alt="Poster" style="max-width: 100px;"></td>
                    <td><img src="<?php echo $form['qr_image']; ?>" alt="QR Code" style="max-width: 100px;"></td>
                    <td>
                        <!-- Link to delete the form -->
                        <a href="admin_manage_forms.php?delete_form_id=<?php echo $form['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this form?');">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
