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
    <title>Payment Options</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="a my-5">
        <h2 style="text-align: center;">QR and UPI</h2>
       
        <a class='btn btn-primary btn-sm' href="qr.php" role="button" style="background-color:green; width:100px; font-size:20px">Change</a>
        <a class='btn btn-primary btn-sm' href="admset.php" role="button" style="background-color:green; width:100px; font-size:20px">Back</a>
        <br><br>
        <h4>INCASE OF ANY CHANGE, DELETE THE PREVIOUS QR & UPI from below THEN ADD THE NEW QR AND UPI</h4>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>UPI ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "KARTHIK@2004";
                $database = "om";
                $conn = mysqli_connect($servername, $username, $password, $database);
                
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM qr";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid query: " . mysqli_error($conn));
                }

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><img src='qrimg.php?id={$row['id']}' width='350' height='150'></td>";
                    // Check if 'upi' key exists before accessing it
                    $upi = isset($row['upi']) ? $row['upi'] : 'N/A';
                    echo "<td>{$upi}</td>";
                    echo "<td style='padding-top:60px'>
                            <a class='btn btn-danger btn-sm' href='qrdel.php?id={$row['id']}'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
