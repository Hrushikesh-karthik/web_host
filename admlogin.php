<?php
session_start();

if (isset($_POST['userid']) && isset($_POST['password'])) {
    $login_phone = $_POST['userid'];
    $login_password = $_POST['password'];

    $server = "localhost";
    $username = "root";
    $password = "KARTHIK@2004";
    $database = "om";
    $con = mysqli_connect($server, $username, $password, $database);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    try {
        // Check if the user exists with the provided phone number
        $stmt = $con->prepare("SELECT * FROM administrator WHERE userid=?");
        $stmt->bind_param("s", $login_phone);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // User found, verify the password
            $row = $result->fetch_assoc();

            if (password_verify($login_password, $row['password'])) {
                
                $_SESSION['admin_logged_in'] = true;
                header("Location: /admset.php");
                exit();
            } else {
                throw new Exception("Invalid password");
            }
        } else {
            throw new Exception("User not found");
        }
    } catch (Exception $e) {
        // Handle the exception
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    } finally {
        // Close the database connection
        mysqli_close($con);
    }
}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
   <!-- 
    - primary meta tag
  -->
  <title>Admin</title>
  <meta name="title" content="known for hosting technical events">
  <meta name="description" content="">

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="assets/images/logoo.png" type="image/svg+xml">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Google Font Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #d2bcf0;
  padding: 30px;
}

.container {
  position: relative;
  max-width: 850px;
  width: 100%;
  background: #fff;
  padding: 40px 30px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  perspective: 2700px;
}

.container .cover {
  position: absolute;
  top: 0;
  left: 50%;
  height: 100%;
  width: 50%;
  z-index: 98;
  transition: all 1s ease;
  transform-origin: left;
  transform-style: preserve-3d;
  backface-visibility: hidden;
}

.container #flip:checked ~ .cover {
  transform: rotateY(-180deg);
}

.container #flip:checked ~ .forms .login-form {
  pointer-events: none;
}

.container .cover .front,
.container .cover .back {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
}

.cover .back {
  transform: rotateY(180deg);
}

.container .cover img {
  position: absolute;
  height: 100%;
  width: 100%;
  object-fit: cover;
  z-index: 10;
}

.container .cover .text {
  position: absolute;
  z-index: 10;
  height: 100%;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.container .cover .text::before {
  content: '';
  position: absolute;
  height: 100%;
  width: 100%;
  opacity: 0.5;
  background: #7d2ae8;
}

.cover .text .text-1,
.cover .text .text-2 {
  z-index: 20;
  font-size: 26px;
  font-weight: 600;
  color: #fff;
  text-align: center;
}

.cover .text .text-2 {
  font-size: 15px;
  font-weight: 500;
}

.container .forms {
  height: 100%;
  width: 100%;
  background: #fff;
}

.container .form-content {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.form-content .login-form,
.form-content .signup-form {
  width: calc(100% / 2 - 25px);
}

.forms .form-content .title {
  position: relative;
  font-size: 24px;
  font-weight: 500;
  color: #333;
}

.forms .form-content .title:before {
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 25px;
  background: #7d2ae8;
}

.forms .signup-form .title:before {
  width: 20px;
}

.forms .form-content .input-boxes {
  margin-top: 30px;
}

.forms .form-content .input-box {
  display: flex;
  align-items: center;
  height: 50px;
  width: 100%;
  margin: 10px 0;
  position: relative;
}

.form-content .input-box input {
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  padding: 0 30px;
  font-size: 16px;
  font-weight: 500;
  border-bottom: 2px solid rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease;
}

.form-content .input-box input:focus,
.form-content .input-box input:valid {
  border-color: #7d2ae8;
}

.form-content .input-box i {
  position: absolute;
  color: #7d2ae8;
  font-size: 17px;
}

.forms .form-content .text {
  font-size: 14px;
  font-weight: 500;
  color: #333;
}

.forms .form-content .text a {
  text-decoration: none;
}

.forms .form-content .text a:hover {
  text-decoration: underline;
}

.forms .form-content .button {
  color: #fff;
  margin-top: 40px;
}

.forms .form-content .button input {
  color: #fff;
  background: #7d2ae8;
  border-radius: 6px;
  padding: 0;
  cursor: pointer;
  transition: all 0.4s ease;
}

.forms .form-content .button input:hover {
  background: #5b13b9;
}

.forms .form-content label {
  color: #5b13b9;
  cursor: pointer;
}

.forms .form-content label:hover {
  text-decoration: underline;
}

.forms .form-content .login-text,
.forms .form-content .sign-up-text {
  text-align: center;
  margin-top: 25px;
}

.container #flip {
  display: none;
}

@media (max-width: 730px) {
  .container .cover {
    display: none;
  }

  .form-content .login-form,
  .form-content .signup-form {
    width: 100%;
  }

  .form-content .signup-form {
    display: none;
  }

  .container #flip:checked ~ .forms .signup-form {
    display: block;
  }

  .container #flip:checked ~ .forms .login-form {
    display: none;
  }
}
 /* Back Button */
 .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: #0e4083;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 16px;
            display: flex;
            align-items: center;
            text-decoration: none;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #7896e9;
        }

        .back-button i {
            margin-right: 8px;
        }

        @media (max-width: 768px) {
            .card {
                width: 90%;
                margin: 10px 0;
            }

            .title h4 {
                font-size: 30px;
                padding: 10px;
            }

            .back-button {
                font-size: 14px;
                padding: 8px 16px;
                top: 10px;
                left: 10px;
            }
        }

        @media (max-width: 480px) {
            .card {
                width: 100%;
            }

            .title h4 {
                font-size: 24px;
                padding: 8px;
            }

            .back-button {
                font-size: 12px;
                padding: 6px 12px;
                top: 5px;
                left: 5px;
            }
        }
    </style>
   </head>
<body>
  
    <a href="index.php" class="back-button"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <div style="display: flex; align-items: center; justify-content: center; width: 100%; padding: 20px 0; box-sizing: border-box; text-align: center; flex-wrap: wrap;">
  <img src="images/mrce.png" alt="MRCE Logo" style="height: 70px; width: auto; margin-right: 15px; max-width: 100%; flex-shrink: 0;">
  <h1 style="margin: 0; font-size: 1.8em; text-align: center;" id="college-name">
    Malla Reddy College Of <span id="engineering">Engineering</span>
  </h1>
</div>

<!-- Media Query for Mobile Responsiveness -->
<style>
  /* Default styling for desktop view */
  #college-name {
    display: inline-block;
    font-size: 1.8em;
  }

  #engineering {
    display: inline;
  }

  /* Media Query for devices smaller than 768px */
  @media (max-width: 768px) {
    div[style*="display: flex"] {
      flex-direction: column; /* Stack image and text vertically */
    }
    img {
      margin: 0 0 10px 0; /* Margin below the image */
      width: 60px; /* Adjust image size */
      height: auto; /* Maintain aspect ratio */
    }
    #college-name {
      font-size: 1.5em;
      text-align: center;
    }
  

  /* Media Query for devices smaller than 480px */
  @media (max-width: 480px) {
    img {
      width: 50px; /* Further scale down image */
      height: auto; /* Maintain aspect ratio */
    }
    #college-name {
      font-size: 1.2em; /* Reduce font size on small screens */
    }
  }

  /* Media Query for devices smaller than 360px */
  @media (max-width: 360px) {
    img {
      width: 40px; /* Reduce image size */
      height: auto; /* Maintain aspect ratio */
    }
    #college-name {
      font-size: 1em; /* Reduce font size further */
      text-align: center;
      display: block; /* Ensure the entire text block is centered */
    }
    #engineering {
      display: block; /* Moves "Engineering" to the next line */
      margin-top: 5px; /* Add space between the lines */
    }
  }
</style>

  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="images/about-banner.jpg" alt="">
        <div class="text">
          <span class="text-1">"Driving Innovation Together"</span>
         
        </div>
      </div>
   
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Admin Login</div>
          <form action="admlogin.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your username" name="userid" id="form3Example3" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="password" id="form3Example4" required>
              </div>
              
              <div class="button input-box">
                <input type="submit" value="Submit">
              </div>
             
            </div>
        </form>
      </div>
      
     
    </div>
    </div>
    </div>
  </div>
</body>
</html>