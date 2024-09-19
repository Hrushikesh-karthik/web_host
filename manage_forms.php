<?php
// Database connection
$conn = new mysqli('localhost', 'root', 'KARTHIK@2004', 'om');

// Fetch all forms
$result = $conn->query("SELECT * FROM forms");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Forms</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
<a class='btn btn-primary btn-sm' href="admset.php" role="button" style="background-color:green; width:100px; font-size:20px">Back</a>
<br><br>
    <h2>Manage Forms</h2>
    
    <div class="list-group">
        <?php while ($form = $result->fetch_assoc()): ?>
            <a href="view_all.php?form_id=<?php echo htmlspecialchars($form['id']); ?>" class="list-group-item list-group-item-action">
                <?php echo htmlspecialchars($form['form_title']); ?>
            </a>
        <?php endwhile; ?>
    </div>
</div>
</body>
</html>
