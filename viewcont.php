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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="a my-5">
        <h2 style="text-align: center;">Responses</h2>
    
        
        <br><br>
        <table class="table">
            <thead >
                <tr class="table-primary">
                   
                    
                    <th>Name</th>
                    <th>Email</th>
                    <th>Class</th>
                    <th style="width:450px">Message</th>
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

                $sql = "SELECT * FROM contact";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid query: " . mysqli_error($conn));
                }

                while ($row = $result->fetch_assoc()) {
                    echo "<tr >";
                   

                    //echo "<td>{$row['id']}</td>";
                    
                   
                    echo "<td style='padding-top:60px'>{$row['name']}</td>";
                    echo "<td style='padding-top:60px'>{$row['email']}</td>";
                    echo "<td style='padding-top:60px'>{$row['class']}</td>";
                    echo "<td style='padding-top:60px;width:700px'>{$row['msg']}</td>";
    
                    echo "</td>";
                

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
