<?php
// Start the session
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', 'KARTHIK@2004', 'om');

// Check for connection error
if ($conn->connect_error) {
    $_SESSION['errors'][] = 'Database connection failed: ' . $conn->connect_error;
    header('Location: error_page.php');
    exit;
}

// Get form ID
$form_id = isset($_GET['form_id']) ? intval($_GET['form_id']) : null;

if ($form_id === null) {
    $_SESSION['errors'][] = 'Form ID is missing.';
    header('Location: error_page.php');
    exit;
}

// Fetch form title
$form_result = $conn->query("SELECT form_title FROM forms WHERE id = $form_id");
if ($form_result && $form_row = $form_result->fetch_assoc()) {
    $form_title = $form_row['form_title'];
} else {
    $_SESSION['errors'][] = 'Form not found.';
    header('Location: error_page.php');
    exit;
}

// Fetch the form submissions
$form_table = "form_" . $form_id;
$result = $conn->query("SELECT * FROM $form_table");

// Check for query errors
if (!$result) {
    $_SESSION['errors'][] = 'Error fetching submissions: ' . $conn->error;
    header('Location: view_all.php?form_id=' . $form_id);
    exit;
}

// Set the file name
$csv_filename = $form_title . '_Submissions.csv';
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=' . $csv_filename);

// Open output stream
$output = fopen('php://output', 'w');

// Fetch column names for the header
$columns_result = $conn->query("SHOW COLUMNS FROM $form_table");
$columns = [];
while ($column = $columns_result->fetch_assoc()) {
    $columns[] = $column['Field'];
}

// Write the header row
fputcsv($output, $columns);

// Write the data rows
while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

// Close the output stream
fclose($output);

// Close the database connection
$conn->close();
exit;
?>
