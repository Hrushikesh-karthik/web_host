<?php
$conn = new mysqli('localhost', 'root', 'KARTHIK@2004', 'your_database');

$submission_id = $_GET['id'];
$form_id = $_GET['form_id'];
$table_name = "form_" . $form_id;

// Fetch submission data
$submission_result = $conn->query("SELECT * FROM $table_name WHERE id = $submission_id");
$submission = $submission_result->fetch_assoc();

// Handle update submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updates = [];
    foreach ($_POST as $key => $value) {
        if ($key != 'submit') {
            $updates[] = "$key='" . $conn->real_escape_string($value) . "'";
        }
    }
    $updates_str = implode(', ', $updates);
    $sql = "UPDATE $table_name SET $updates_str WHERE id = $submission_id";
    $conn->query($sql);
    echo "Submission updated successfully!";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Submission</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Submission</h2>
    <form method="post">
        <?php foreach ($submission as $key => $value): ?>
            <?php if ($key != 'id' && $key != 'submitted_at'): ?>
                <div class="form-group">
                    <label for="<?php echo htmlspecialchars($key); ?>"><?php echo htmlspecialchars($key); ?>:</label>
                    <input type="text" class="form-control" id="<?php echo htmlspecialchars($key); ?>" name="<?php echo htmlspecialchars($key); ?>" value="<?php echo htmlspecialchars($value); ?>">
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="view_all.php?form_id=<?php echo htmlspecialchars($form_id); ?>" class="btn btn-secondary mt-3">Back to Submissions</a>
</div>
</body>
</html> 
