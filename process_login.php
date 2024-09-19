<?php
// Your login authentication logic goes here
// For simplicity, let's assume successful login

// Set a cookie to indicate that the user is logged in
setcookie("login_status", "logged_in", time() + 20, "/");
// You may want to set other cookies with user-specific information

// Redirect to the homepage after successful login
header("Location: homepage.php");
exit();
?>
