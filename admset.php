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
    <link rel="stylesheet" href="indexcss/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700;800&family=Poppins:wght@400;500&display=swap"
    rel="stylesheet">

    <title>Admin page</title>
    
    <style>
  
      @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Merriweather:wght@300;900&display=swap');

      
      @media(max-width: 700px){
        .intro h3{
          font-size: 20px;
        }
        .text h3{
          font-size: 25vw;
        }
       /* .card h2{
          font-size: 20px
        }
        .card p{
          font-size: 2vw;
          line-height: 1;
        }
       
        .card--display i{
          font-size: 20px;
        }*/
        }
        body{
          background: white;
        }
       
        .x,
.y,
.z{
  width: 500px;
  height: 300px;
  padding: 20px;
  background-color: wheat;
  overflow: auto;
  border-radius: 10px;
  box-shadow: 0 9px 8px rgba(0,0,0,0.1);
}
.button{
    display: inline-block;
    background: #020269;
    color: #fff;
    padding: 8px 30px;
    margin: 5px 0;
    border-radius: 30px;
    transition: background 0.5s;
}
.button:hover{
    background: rgb(230, 91, 149);
}
/*@media (max-width:1536px){
  .card-container {
    padding-left: 56vw;
   align-items: flex-start;
  }
}
@media (max-width:1280px){
  .card-container i{
    font-size: 30px;
  }
}
@media (max-width:1024px){
  .card-container{
    padding-left: 40vw;
    
  }
}
@media(max-width: 1000px){
  .card-container {
    padding-left: 3vw;
  }
 
}
@media (max-width:910px){
  .card-container{
    padding-left: 3vw;
      
  }  
  }
@media (max-width:820px){
  .card-container{
    padding-left: 30vw;
      align-items: flex-start;
  }
  }
  @media (max-width:768px){
    .card-container i{
      font-size: 30px;
    
    }
}
@media (max-width:640px){
  .auto{
    padding-left: 5vw;
   
  }
}
@media (max-width:475px){
  .auto{
    padding-left: 1vw;
    align-items: flex-start;
  }
}
*/
@media (max-width:780px){
  .box{
    width: 100%;
  }}
@media (max-width:700px){
  .box{
    width: 100%;
  }}
@media (max-width:480px){
  .box{
    width: 100%;
  }
  .header{
    width: 100%;
  }
  #nav-bar{
    width: auto;
  }
  .intro{
    width: 100%;
  }
 
}
@media (max-width:270px){
  .box{
    width: 10%;
   
  }
  .header{
    width: 100%;
  }
  #nav-bar{
    width: 100%;
  }
  .intro{
    width: 100%;
  }
 
}
.start {
            text-align: center;
            margin: 50px auto;
            max-width: 90%;
        }
        h1 {
            font-size: 2em;
            color: black;
        }
        a.button1 {
            display: inline-block;
            padding: 0.35em 1.2em;
            border: 0.1em solid #FFFFFF;
            margin: 0 0.3em 0.3em 0;
            border-radius: 0.12em;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Roboto', sans-serif;
            font-weight: 300;
            color: #FFFFFF;
            text-align: center;
            transition: all 0.2s;
            background-color: #16057a; /* Added background color */
        }
        a.button1:hover {
            color: #000000;
            background-color: #FFFFFF;
        }
        @media all and (max-width: 30em) {
            a.button1 {
                display: block;
                margin: 0.4em auto;
            }
            h1 {
                font-size: 1.5em;
            }
        }
        .home{
    min-height: 50vh;
    padding: 1rem 9% 2rem;
}

.home{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8rem;
    background-image: url(assets/images/hero-bg.svg);
}


.home .home-content{
  background-image: url(assets/images/hero-shape-2.png);
}




.home-content h2{
    font-size: 3rem;
   color: black;
    font-weight: 300;
}

.home-content p{
    font-size: 1.6rem;
    color: black;
}

.home-img{
    border-radius: 50%;
}

.home-img img{
    position: relative;
    width: 32vw;
    border-radius: 50%;
    box-shadow: 0 0 25px solid #b74b4b;
    cursor: pointer;
    transition: 0.2s linear;
}

.home-img img:hover{
    font-size: 1.8rem;
    font-weight: 500;
}

.btn{
    display: inline-block;
    padding: 1rem 2.8rem;
    background-color: rgb(13, 44, 131);
    border-radius: 4rem;
    font-size: 1.6rem;
    color: white;
    letter-spacing: 0.3rem;
    font-weight: 600;
    border: 2px solid #050404;
    transition: 0.3s ease;
    cursor: pointer;
}

.btn:hover{
    transform: scale3d(1.03);
    background-color: #eb2626;
    color: black;
    box-shadow: 0 0 25px #b74b4b;
}


@media (max-width: 1000px){
    .home{
        gap: 4rem;
    }
}

@media(max-width:995px){
    .home{
        flex-direction: column;
        margin: 5rem 4rem;
    }

    .home .home-content h3{
        font-size: 2.5rem;
    }

    .home-content h1{
        font-size: 5rem;
    }

    .home-img img{
        width: 70vw;
        margin-top: 4rem;
    }
}

    </style>
</head>
<body>
  <!-------------header image-------------->
  <nav>
  <ul class="sidebar">
    <li onclick="hideSidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/></svg></a></li>
    <li><a href="index.php">Home</a></li>
    <li><a href="team.php">Team</a></li>
    <li><a href="userpage.php">Events</a></li>
    <li><a href="gallery.php">Gallery</a></li>
    <li><a href="contact.php">Contact</a></li>
   
  </ul>
  <ul>
    <li><a href="#"><img src="images/logoo.png" alt="Logo" style="width: 75px; float: left; margin-right: 15px;"> <p>Techie-Hub</p></a></li>
    <li class="hideOnMobile"><a href="index.php">Home</a></li>
    <li class="hideOnMobile"><a href="team.php">Team</a></li>
    <li class="hideOnMobile"><a href="userpage.php">Events</a></li>
    <li class="hideOnMobile"><a href="gallery.php">Gallery</a></li>
    <li class="hideOnMobile"><a href="contact.php">Contact</a></li>
    
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
<div class="start">
    <h1 style="text-align: center;color: rgb(4, 11, 67); font-size: 50px;">Admin Panel</h1>
    <h4>View Registrations</h4><a href="manage_forms.php" class="button1">View Registrations</a><br>
    <h4>Add images to gallery</h4><a href="gal.php" class="button1">Add images</a><br>
<h4>Add google drive link for previous events</h4><a href="admbutton.php" class="button1">Add link</a><br>
<h4>Add a registration form</h4><a href="form_creation.php" class="button1">Add reg form</a>
<h4>Delete forms</h4><a href="admin_manage_forms.php" class="button1">Remove reg form</a>
<h4>View contact form responses</h4><a href="viewcont.php" class="button1">View response</a>
<h4>Payment options(if want to change)</h4><a href="qr-admin.php" class="button1">View QR</a>
<h4>Admin registration</h4><a href="admreg.php" class="button1">Register as an Admin</a>
</div>
<br><br><br><br><br>
<!---------------Footer-------------------->
<footer class="footer">
  <div class="waves">
    <div class="wave" id="wave1"></div>
    <div class="wave" id="wave2"></div>
    <div class="wave" id="wave3"></div>
    <div class="wave" id="wave4"></div>
  </div>
 
  

  <ul class="social-icon">
    <li>
      <img src="images/logoo.png" alt="Logo" style="width: 100px; float: left; margin-right: 15px;">
    </li>
    <li class="social-icon__item"><a class="social-icon__link" href="#">
        <ion-icon name="logo-facebook"></ion-icon>
      </a></li>
    <li class="social-icon__item"><a class="social-icon__link" href="#">
        <ion-icon name="logo-twitter"></ion-icon>
      </a></li>
    <li class="social-icon__item"><a class="social-icon__link" href="#">
        <ion-icon name="logo-linkedin"></ion-icon>
      </a></li>
    <li class="social-icon__item"><a class="social-icon__link" href="#">
        <ion-icon name="logo-instagram"></ion-icon>
      </a></li>
  </ul>
  <ul class="menu">
    <li class="menu__item"><a class="menu__link" href="index.html">Home</a></li>
    <li class="menu__item"><a class="menu__link" href="team.html">Team</a></li>
    <li class="menu__item"><a class="menu__link" href="events.php">Events</a></li>
    <li class="menu__item"><a class="menu__link" href="gallery.html">Gallery</a></li>
    <li class="menu__item"><a class="menu__link" href="contact.html">Contact</a></li>

  </ul>
  <p>&copy;Techie-Hub | All Rights Reserved</p>
</footer>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn" aria-label="back top top" data-back-top-btn>
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>