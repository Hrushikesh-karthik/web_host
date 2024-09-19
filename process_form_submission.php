<?php
// Start the session to store errors
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', 'KARTHIK@2004', 'om');

// Check for connection error
if ($conn->connect_error) {
    $_SESSION['errors'][] = 'Database connection failed: ' . $conn->connect_error;
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form_id = intval($_POST['form_id']); // Sanitize form_id

    // Prepare an array to store form field values
    $form_data = [];
    foreach ($_FILES as $key => $file) {
        if ($file['error'] == UPLOAD_ERR_OK) {
            $upload_dir = 'uploads/';
            $file_name = basename($file['name']);
            $file_path = $upload_dir . $file_name;

            // Move the file to the uploads directory
            if (move_uploaded_file($file['tmp_name'], $file_path)) {
                $form_data[$key] = $file_path;
            } else {
                $_SESSION['errors'][] = 'Failed to upload file: ' . $file_name;
            }
        }
    }

    // Insert form data into the database
    $form_data['form_id'] = $form_id;
    $columns = implode(", ", array_keys($form_data));
    $placeholders = implode(", ", array_fill(0, count($form_data), '?'));
    $stmt = $conn->prepare("INSERT INTO form_$form_id ($columns) VALUES ($placeholders)");

    // Bind parameters
    $types = str_repeat('s', count($form_data)); // Assuming all values are strings
    $stmt->bind_param($types, ...array_values($form_data));
    $stmt->execute();

    // Redirect or show a success message
    header('Location: user.php'); // Redirect to a success page or similar
    exit();
}
?>
