<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- 
    - primary meta tag
  -->
  <title>Gallery</title>
  <meta name="title" content="known for hosting technical events">
  <meta name="description" content="">

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="images/logoo.png" type="image/svg+xml">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

  <style>
    /* Import Google font - Poppins */
   /* Import Google font - Poppins */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

#inauguration {
  display: flex;
  flex-direction: column;
  padding: 0 35px;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background-image: url(images/footer-bgg.png);
}

.wrapper {
  max-width: 1100px;
  width: 100%;
  position: relative;
}

.wrapper i {
  top: 50%;
  height: 50px;
  width: 50px;
  cursor: pointer;
  font-size: 1.25rem;
  position: absolute;
  text-align: center;
  line-height: 50px;
  background: #fff;
  border-radius: 50%;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.23);
  transform: translateY(-50%);
  transition: transform 0.1s linear;
}

.wrapper i:active {
  transform: translateY(-50%) scale(0.85);
}

.wrapper i:first-child {
  left: -22px;
}

.wrapper i:last-child {
  right: -22px;
}

.wrapper .carousel {
  display: grid;
  grid-auto-flow: column;
  grid-auto-columns: calc((100% / 3) - 12px);
  overflow-x: auto;
  scroll-snap-type: x mandatory;
  gap: 16px;
  border-radius: 8px;
  scroll-behavior: smooth;
  scrollbar-width: none;
}

.carousel::-webkit-scrollbar {
  display: none;
}

.carousel.no-transition {
  scroll-behavior: auto;
}

.carousel.dragging {
  scroll-snap-type: none;
  scroll-behavior: auto;
}

.carousel.dragging .card {
  cursor: grab;
  user-select: none;
}

.carousel .card {
  scroll-snap-align: start;
  height: 342px;
  list-style: none;
  background: #fff;
  cursor: pointer;
  padding: 0;
  flex-direction: column;
  border-radius: 8px;
  overflow: hidden;
}

.carousel .card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

#our-pics {
  font-size: 2.5rem;
  margin-bottom: 20px;
  text-align: center;
}

/* Custom styles for dynamically loaded gallery images */
.gallcontainer {
  margin-top: 30px;
  text-align: center;
}

.galleryy {
  display: grid;
  gap: 20px;
  grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
  justify-content: center;
  margin-bottom: 20px;
}

/* Remove border and add shadow to gallery images */
.galleryy img {
  border: none; /* Remove the border */
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect */
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.galleryy img:hover {
  transform: scale(1.05);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

/* Responsive button container styling */
#buttonContainer {
  display: flex;
  justify-content: center;
  gap: 15px;
  margin-top: 20px;
  flex-wrap: wrap; /* Allows buttons to wrap on smaller screens */
}

#buttonContainer button {
  padding: 12px 24px;
  border-radius: 5px;
  border: none;
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease, transform 0.2s ease;
}

#buttonContainer button:hover {
  background-color: #45a049;
  transform: scale(1.05);
}

/* Responsive button adjustments for smaller screens */
@media screen and (max-width: 600px) {
  #buttonContainer button {
    width: 100%; /* Full width on smaller screens */
    padding: 10px;
    font-size: 14px;
  }
}

@media screen and (max-width: 900px) {
  .wrapper .carousel {
    grid-auto-columns: calc((100% / 2) - 9px);
  }

  #our-pics {
    font-size: 2rem;
  }
}

@media screen and (max-width: 600px) {
  .wrapper .carousel {
    grid-auto-columns: 100%;
  }

  #our-pics {
    font-size: 1.75rem;
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

  <script src="js/gal_script.js" defer></script>
</head>
<body>
<script>
  function handleClick(url) {
      window.location.href = url;
  }
</script>

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
    <li class="menu-button"><a href="javascript:void(0)" onclick="showSidebar()">Menu</a></li>
  </ul>
</nav>


  

  <section id="inauguration">
    <h1 id="our-pics">Our Inauguration</h1>
    <div class="wrapper">
      <i id="left" class="fa-solid fa-angle-left"></i>
      <ul class="carousel">
        <li class="card">
          <img src="inaug pics/aug1.jpg" alt="img" draggable="false">
        </li>
        <li class="card">
          <img src="inaug pics/aug2.jpg" alt="img" draggable="false">
        </li>
        <li class="card">
          <img src="inaug pics/aug3.jpg" alt="img" draggable="false">
        </li>
        <li class="card">
          <img src="inaug pics/aug4.jpg"alt="img" draggable="false">
        </li>
        <li class="card">
          <img src="inaug pics/aug5.jpg" alt="img" draggable="false">
        </li>
        <li class="card">
          <img src="inaug pics/aug6.jpg" alt="img" draggable="false">
        </li>
        
      </ul>
      <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
  </section>
  <h1 id="our-pics">Our Gallery</h1>
  <div class="gallcontainer">
    <div class="galleryy">
    <?php
                $servername = "localhost";
                $username = "root";
                $password = "KARTHIK@2004";
                $database = "om";
                $conn = mysqli_connect($servername, $username, $password, $database);
                
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM gallery";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid query: " . mysqli_error($conn));
                }

                while ($row = $result->fetch_assoc()) {
                    echo "<td><img src='img.php?id={$row['id']}' width='350' height='350' border='3px gray solid' onclick='toggleFullScreen(this)'></td>";
                }
                ?>
    </div>
</div>
<div id="buttonContainer">
        <?php
        $conn = new mysqli('localhost', 'root', 'KARTHIK@2004', 'om');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query("SELECT label, url FROM buttons");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<button onclick=\"handleClick('{$row['url']}')\">{$row['label']}</button>";
            }
        } else {
            echo "No buttons available.";
        }
        $conn->close();
        ?>
    </div>

<script>
  function showSidebar() {
    document.querySelector('.sidebar').classList.add('show');
  }

  function hideSidebar() {
    document.querySelector('.sidebar').classList.remove('show');
  }
</script>
</body>
</html>
