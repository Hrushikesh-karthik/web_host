<?php
$conn = new mysqli('localhost', 'root', 'KARTHIK@2004', 'om');

// Handle form submission
$error_message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize form inputs
    $form_title = $conn->real_escape_string($_POST['form_title']);
    $form_description = $conn->real_escape_string($_POST['form_description']);
    
    // Handle poster image upload
    $poster_image = null;
    if (isset($_FILES['poster_image']) && $_FILES['poster_image']['error'] === UPLOAD_ERR_OK) {
        $poster_tmp_name = $_FILES['poster_image']['tmp_name'];
        $poster_name = uniqid() . '_' . basename($_FILES['poster_image']['name']);
        $poster_dir = 'uploads/posters/';
        $poster_path = $poster_dir . $poster_name;
        
        if (move_uploaded_file($poster_tmp_name, $poster_path)) {
            $poster_image = $poster_path;
        } else {
            $error_message = "Error uploading poster image.";
        }
    }

    // Insert form metadata
    if (empty($error_message)) {
        $insert_form = "INSERT INTO forms (form_title, form_description, poster_image) VALUES ('$form_title', '$form_description', '$poster_image')";
        if ($conn->query($insert_form)) {
            $form_id = $conn->insert_id;

            // Create table for form fields
            $create_fields_table = "CREATE TABLE form_$form_id (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255),
                email VARCHAR(255) ,
                roll_no VARCHAR(255) ,

                submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP";
            
            // Loop through fields and dynamically add columns to the table
            foreach ($_POST['fields'] as $field) {
                $field_name = isset($field['name']) ? $conn->real_escape_string($field['name']) : ''; // Ensure field name exists
                $field_name = preg_replace('/[^a-zA-Z0-9_]/', '_', $field_name); // Handle MySQL keywords & spaces
                
                if (!isset($field['type']) || empty($field_name)) {
                    continue; // Skip if field type or name is missing
                }

                $field_type = $field['type']; // Validating field_type is set and correct

                if ($field_type === 'text') {
                    $create_fields_table .= ", `$field_name` VARCHAR(255)";
                } elseif ($field_type === 'textarea') {
                    $create_fields_table .= ", `$field_name` TEXT";
                } elseif ($field_type === 'file') {
                    $create_fields_table .= ", `$field_name` VARCHAR(255)";
                } else {
                    // Invalid field type, skip
                    continue;
                }
            }

            $create_fields_table .= ")";
            if ($conn->query($create_fields_table)) {
                // Insert form fields into form_fields table
                foreach ($_POST['fields'] as $field) {
                    $field_name = isset($field['name']) ? $conn->real_escape_string($field['name']) : '';
                    $field_name = preg_replace('/[^a-zA-Z0-9_]/', '_', $field_name); // Handle spaces and keywords
                    $field_type = isset($field['type']) ? $field['type'] : '';

                    // Ensure field name and type are valid before inserting
                    if (empty($field_name) || empty($field_type)) {
                        continue; // Skip if invalid
                    }

                    $insert_field = "INSERT INTO form_fields (form_id, field_name, field_type) VALUES ('$form_id', '$field_name', '$field_type')";
                    $conn->query($insert_field);
                }

                echo "<div class='alert alert-success'>Form created successfully!</div>";
            } else {
                $error_message = "Error creating form table: " . $conn->error;
            }
        } else {
            $error_message = "Error creating form: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .delete-field {
            cursor: pointer;
            color: red;
            float: right;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Create New Form</h2>
    
    <!-- Error Message -->
    <?php if (!empty($error_message)): ?>
        <div class="alert alert-danger">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="form_title">Form Title</label>
            <input type="text" class="form-control" id="form_title" name="form_title" required>
        </div>
        <div class="form-group">
            <label for="form_description">Form Description</label>
            <textarea class="form-control" id="form_description" name="form_description" required></textarea>
        </div>
        
        <!-- Poster Upload -->
        <div class="form-group">
            <label for="poster_image">Upload Poster</label>
            <input type="file" class="form-control" id="poster_image" name="poster_image" accept="image/*" required>
        </div>

        <div id="fields-container">
            <!-- Static Fields -->
            <div class="form-group field-container">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="fields[0][name]" value="name" readonly>
            </div>
            <div class="form-group field-container">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="fields[1][name]" value="email" readonly>
            </div>
            <div class="form-group field-container">
                <label for="roll_no">Roll Number</label>
                <input type="text" class="form-control" id="roll_no" name="fields[2][name]" value="roll_no" readonly>
            </div>
        </div>
        <button id="add-field" class="btn btn-secondary mt-3" type="button">Add Field</button><br><br>
        
        <!-- Submit and Cancel Buttons -->
        <button type="submit" class="btn btn-primary">Create Form</button>
        <button type="reset" class="btn btn-warning">Reset</button>
    </form>
</div>

<script>
document.getElementById('add-field').addEventListener('click', function() {
    const container = document.getElementById('fields-container');
    const fieldCount = container.children.length;

    const fieldHTML = `
         <div class="form-group field-container">
            <span class="delete-field" onclick="this.parentElement.remove()"><b>DELETE</b> </span>
            <label for="field_name_${fieldCount}">Field Name</label>
            <input type="text" class="form-control" id="field_name_${fieldCount}" name="fields[${fieldCount + 3}][name]" required>
            
            <label for="field_type_${fieldCount}">Field Type</label>
            <select class="form-control" id="field_type_${fieldCount}" name="fields[${fieldCount + 3}][type]" required>
                <option value="text">Text</option>
                <option value="textarea">Textarea</option>
                <option value="file">File</option>
            </select>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', fieldHTML);
});
</script>
</body>
</html>
