<?php
session_start();
$insert = false;

if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "KARTHIK@2004";
    $database = "om";
    $con = mysqli_connect($server, $username, $password, $database);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $class = $_POST['class'];
    $msg = $_POST['msg'];
    
    // Handle image upload
   

    try {
        // Check for duplicate entries

        // Perform the database operation using prepared statements
        // SQL query inside try block
$stmt = $con->prepare("INSERT INTO contact (name, email, class, msg) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $class, $msg);
$stmt->execute();
$insert = true;
$_SESSION["name"] = $username;
header("Location: contact.php");
exit();


    } catch (Exception $e) {
        // Handle the exception
        echo "<p>Error: " . $e->getMessage() . "</p>";
    } finally {
        // Close the database connection
        mysqli_close($con);
    }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   <!-- 
    - primary meta tag
  -->
  <title>Contact us</title>
  <meta name="title" content="known for hosting technical events">
  <meta name="description" content="">

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="images/logoo.png" type="image/svg+xml">

  
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700;800&family=Poppins:wght@400;500&display=swap"
      rel="stylesheet">
    <style>
      *{
  margin: 0px;
  padding: 0px;
  box-sizing: border-box;
  font-family: 'Source Sans Pro', sans-serif;
  text-decoration: none;
  color: white;
}

body{
  background: url(images/footer-img.png);
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}

form{
  background: rgba(27,31,34,0.80);
  width: 640px;
  margin: 50px auto;
  max-width: 97%;
  border-radius: 4px;
  padding: 55px 30px;
}

form .title h2{
  letter-spacing: 6px;
  border-bottom: 1px solid white;
  display: inline-block;
  padding-bottom: 8px;
  margin-bottom: 32px;
}

form .half{
  display: flex;
  justify-content: space-between;
}

form .half .item{
  display: flex;
  flex-direction: column;
  margin-bottom: 24px;
  width: 48%;
}

form label{
  display: block;
  font-size: 13px;
  letter-spacing: 3.5px;
  margin-bottom: 16px;
}

form .half .item input{
  border-radius: 4px;
  border: 1px solid white;
  outline: 0;
  padding: 16px;
  width: 100%;
  height: 44px;
  background: transparent;
  font-size: 17px;
}

form .full{
  margin-bottom: 24px;
}

form .full textarea{
  background: transparent;
  border-radius: 4px;
  border: 1px solid white;
  outline: 0;
  padding: 12px 16px;
  width: 100%;
  height: 200px;
  font-size: 17px;
}

form .action{
  margin-bottom: 32px;
}

form .action input{
  background: transparent;
  border-radius: 4px;
  border: 1px solid white;
  cursor: pointer;
  font-size: 13px;
  font-weight: 600;
  height: 44px;
  letter-spacing: 3px;
  outline: 0;
  padding: 0 20px 0 22px;
  margin-right: 10px;
}

form .action input[type="submit"]{
  background: white;
  color: black;
}

form .icons a{
  border: 1px solid white;
  border-radius: 50%;
  line-height: 36px;
  text-align: center;
  font-weight: 600;
  width: 38px;
  margin-right: 10px;
}

form .half .item input:focus, form .full textarea:focus, form .action input[type="reset"]:hover, form .icons a:hover{
  background: rgba(255,255,255,0.075);
}

@media (max-width: 480px){
  form .half{
    flex-direction: column;
  }
  form .half .item{
    width: 100%;
  }
  form .action{
    display: flex;
    flex-direction: column;
  }
  form .action input{
    margin-bottom: 10px;
    width: 100%;
  }
}
nav {
  background-color: white;
  box-shadow: 3px 6px 5px rgba(0, 0, 0, 0.1);
  position: sticky;
  top: 0;
  z-index: 1000;
}

nav ul {
  width: 100%;
  list-style: none;
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

nav li {
  height: 60px;
}

nav a {
  height: 100%;
  padding: 0 30px;
  text-decoration: none;
  display: flex;
  align-items: center;
  color: black;
}

nav a:hover {
  background-color: #f0f0f0;
}

nav li:first-child {
  margin-right: auto;
}

.sidebar {
  position: fixed;
  top: 0;
  right: 0;
  height: 100vh;
  width: 250px;
  background-color: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(12px);
  box-shadow: -10px 0 10px rgba(0, 0, 0, 0.1);
  list-style: none;
  display: none;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
  transition: transform 0.3s ease;
}

.sidebar.show {
  display: flex;
}

.sidebar li {
  width: 100%;
}

.sidebar a {
  width: 100%;
}

.menu-button {
  display: none;
}

@media(max-width: 800px) {
  .hideOnMobile {
    display: none;
  }

  .menu-button {
    display: block;
  }
}

@media(max-width: 400px) {
  .sidebar {
    width: 100%;
  }
}

    </style>
  </head>
  <body>
    <nav>
      <ul class="sidebar">
        <li onclick="hideSidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/></svg></a></li>
        <li><a href="index.php">Home</a></li>
    <li><a href="team.php">Team</a></li>
    <li><a href="userpage.php">Events</a></li>
    <li><a href="gallery.php">Gallery</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="admlogin.php">Admin</a></li>
  </ul>
  <ul>
    <li><a href="#"><img src="images/logoo.png" alt="Logo" style="width: 75px; float: left; margin-right: 15px;"> <p>Techie-Hub</p></a></li>
    <li class="hideOnMobile"><a href="index.php">Home</a></li>
    <li class="hideOnMobile"><a href="team.php">Team</a></li>
    <li class="hideOnMobile"><a href="userpage.php">Events</a></li>
    <li class="hideOnMobile"><a href="gallery.php">Gallery</a></li>
    <li class="hideOnMobile"><a href="contact.php">Contact</a></li>
    <li class="hideOnMobile"><a href="admlogin.php">Admin</a></li>
        <li class="menu-button" onclick="showSidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/></svg></a></li>
      </ul>
    </nav>
    <script>
      function showSidebar() {
        document.querySelector('.sidebar').classList.add('show');
      }
    
      function hideSidebar() {
        document.querySelector('.sidebar').classList.remove('show');
      }
    </script>
    </nav>
    
    <form action="contact.php" method="post">
      <div class="title">
        <h2>CONNECT WITH US</h2>
      </div>
      <div class="half">
        <div class="item">
          <label for="name">NAME</label>
          <input type="text" name="name" value="" size="40" class="nameinput wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Name">
        </div>
        <div class="item">
          <label for="email">EMAIL</label>
          <input type="email" name="email" size="40" class="emailinput wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Email">
        </div>
        <div class="item">
          <label for="text">YEAR</label>
          <input type="text" name="class" value="" size="40" class="nameinput wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Year">
        </div>
      </div>
      <div class="full">
        <label for="message">MESSAGE</label>
        <textarea name="msg" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Message"></textarea>
      </div>
      <div class="action">
        <input type="submit" value = "SEND MESSAGE">
        <input type="reset" value = "RESET">
      </div>
      <div class="icons">
        <a href="" class = "fa fa-twitter"></a>
        <a href="" class = "fa fa-facebook"></a>
        <a href="" class = "fa fa-instagram"></a>
        <a href="" class = "fa fa-github"></a>
      </div>
    </form>
   
  </body>
</html>