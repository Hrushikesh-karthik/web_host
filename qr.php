<?php
session_start();
$insert = false;
$errorMessage = $successmsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"]) && isset($_POST['upi'])) {
    $server = "localhost";
    $username = "root";
    $password = "KARTHIK@2004";
    $database = "om";
    $con = mysqli_connect($server, $username, $password, $database);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Handle image upload
    $imageData = handleImageUpload();
    $upi = $_POST['upi'];

    try {
        // Perform the database operation using prepared statements
        $stmt = $con->prepare("INSERT INTO `qr`(`image`,`upi`) VALUES (?, ?)");
        $stmt->bind_param("ss", $imageData, $upi);
        if ($stmt->execute()) {
            $insert = true;
            $successmsg = "Image uploaded successfully.";
        } else {
            throw new Exception("Error executing SQL statement: " . $stmt->error);
        }

        header("Location: qr-admin.php");
        exit();

    } catch (Exception $e) {
        // Handle the exception
        $errorMessage = "Error: " . $e->getMessage();
        error_log($errorMessage);
    } finally {
        // Close the database connection
        mysqli_close($con);
    }
}

function handleImageUpload() {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        throw new Exception("Sorry, your file is too large.");
    }

    // Allow certain file formats
    $allowedFormats = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedFormats)) {
        throw new Exception("Sorry, only JPG, JPEG, PNG, and GIF files are allowed.");
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        return file_get_contents($targetFile);
    } else {
        throw new Exception("Sorry, there was an error uploading your file.");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Upload Image</h2>
        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Error:</strong> $errorMessage
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="image" class="form-label">Select Image:</label>
                <input type="file" class="form-control" id="image" name="image">
                <label for="upi" class="form-label">Enter UPI:</label>
                <input type="text" class="form-control" id="upi" name="upi">
            </div>
            <?php
            if (!empty($successmsg)) {
                echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Success:</strong> $successmsg
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
            ?>
            <button type="submit" class="btn btn-primary">Upload</button>
            <a href="qr-admin.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
