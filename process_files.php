<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Define upload directory and paths
    $uploadDir = 'uploads/';
    $wordTemplatePath = $uploadDir . basename($_FILES['word_template']['name']);
    $excelFilePath = $uploadDir . basename($_FILES['excel_file']['name']);

    // Create uploads directory if it does not exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Move uploaded files from temporary directory to the upload directory
    if (move_uploaded_file($_FILES['word_template']['tmp_name'], $wordTemplatePath) &&
        move_uploaded_file($_FILES['excel_file']['tmp_name'], $excelFilePath)) {

        // Path to Python script
        $pythonScriptPath = 'generate_certificates.py';

        // Command to execute Python script
        $command = escapeshellcmd("python $pythonScriptPath \"$excelFilePath\" \"$wordTemplatePath\"");

        // Execute the command and capture output and errors
        $output = [];
        $return_var = 0;
        exec($command, $output, $return_var);

        echo "<pre>" . implode("\n", $output) . "</pre>";
        if ($return_var === 0) {
            echo "Certificates have been generated and sent.";
        } else {
            echo "There was an error generating the certificates.";
        }
    } else {
        echo "File upload failed.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Files</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Upload Word Template and Excel File</h1>
    <form action="" method="POST" enctype="multipart/form-data" class="mt-4">
        <div class="mb-3">
            <label for="word_template" class="form-label">Word Template (.docx)</label>
            <input type="file" class="form-control" name="word_template" accept=".docx" required>
        </div>
        <div class="mb-3">
            <label for="excel_file" class="form-label">Excel File (.xlsx)</label>
            <input type="file" class="form-control" name="excel_file" accept=".xlsx" required>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Generate and Send Certificates</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
