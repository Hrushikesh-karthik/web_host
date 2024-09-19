<?php
$conn = new mysqli('localhost', 'root', 'KARTHIK@2004', 'your_database');

// Handle field deletion
if (isset($_POST['delete_field'])) {
    $field_id = $_POST['field_id'];
    $form_id = $_POST['form_id'];

    // Fetch field details
    $stmt = $conn->prepare("SELECT field_name FROM form_fields WHERE id = ?");
    $stmt->bind_param('i', $field_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $field = $result->fetch_assoc();
    $field_name = $field['field_name'];

    // Delete the field from form_fields table
    $conn->query("DELETE FROM form_fields WHERE id = $field_id");

    // Alter the form's table to remove the column
    $table_name = "form_$form_id";
    $conn->query("ALTER TABLE $table_name DROP COLUMN $field_name");

    echo "Field deleted successfully!";
}

// Fetch forms for field deletion
$forms_result = $conn->query("SELECT * FROM forms");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Field</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Delete Field</h2>
    
    <form method="post">
        <div class="form-group">
            <label for="form_id">Select Form:</label>
            <select class="form-control" id="form_id" name="form_id">
                <?php while ($form = $forms_result->fetch_assoc()): ?>
                    <option value="<?php echo $form['id']; ?>"><?php echo htmlspecialchars($form['form_title']); ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="field_id">Select Field to Delete:</label>
            <select class="form-control" id="field_id" name="field_id">
                <?php
                // Fetch fields for the selected form
                if (isset($_POST['form_id'])) {
                    $form_id = $_POST['form_id'];
                    $fields_result = $conn->query("SELECT id, field_name FROM form_fields WHERE form_id = $form_id");
                    while ($field = $fields_result->fetch_assoc()): ?>
                        <option value="<?php echo $field['id']; ?>"><?php echo htmlspecialchars($field['field_name']); ?></option>
                    <?php endwhile; ?>
                }
                ?>
            </select>
        </div>
        
        <button type="submit" name="delete_field" class="btn btn-danger">Delete Field</button>
    </form>
</div>
</body>
</html>
