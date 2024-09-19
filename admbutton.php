<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: access.php"); // Redirect to login page
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - Add Buttons</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <!-- Back Button -->
        <div class="mb-4">
            <a class="btn btn-secondary btn-sm" href="admset.php" role="button" style="font-size: 18px;">Back</a>
        </div>

        <!-- Page Heading -->
        <h1 class="mb-4">Add New Button</h1>

        <!-- Form Section -->
        <div class="card shadow-sm p-4">
            <form method="post" action="admbutton.php">
                <div class="mb-3">
                    <label for="label" class="form-label">Button Label:</label>
                    <input type="text" class="form-control" id="label" name="label" placeholder="Enter button label" required>
                </div>

                <div class="mb-3">
                    <label for="url" class="form-label">Button URL:</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="Enter button URL" required>
                </div>

                <button type="submit" class="btn btn-primary">Add Button</button>
            </form>

            <!-- PHP to handle form submission -->
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $label = $_POST['label'];
                $url = $_POST['url'];

                // Database connection
                $conn = new mysqli('localhost', 'root', 'KARTHIK@2004', 'om');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Prepare and bind statement
                $stmt = $conn->prepare("INSERT INTO buttons (label, url) VALUES (?, ?)");
                $stmt->bind_param('ss', $label, $url);
                $stmt->execute();
                $stmt->close();
                $conn->close();

                echo "<div class='alert alert-success mt-4'>Button added successfully!</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
