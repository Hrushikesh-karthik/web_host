<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- 
    - primary meta tag
  -->
  <title>TechieHub</title>
  <meta name="title" content="known for hosting technical events">
  <meta name="description" content="">

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="assets/images/logo-small.png" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="indexcss/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700;800&family=Poppins:wght@400;500&display=swap"
    rel="stylesheet">

  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="images/hero-bg.svg">
  <link rel="preload" as="image" href="images/hero-banner-1.jpg">
  <link rel="preload" as="image" href="images/hero-banner-2.jpg">
  <link rel="preload" as="image" href="images/hero-shape-1.svg">
  <link rel="preload" as="image" href="images/hero-shape-2.png">
  <script src="https://unpkg.com/ionicons@5.5.3/dist/ionicons/ionicons.js"></script>
  <style>
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



  <!-- 
    - #HEADER
-->
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

      <!-- 
        - #First page
      
      <section class="section hero has-bg-image" id="home" aria-label="home"
        style="background-image: url('./assets/images/hero-bg.svg')">
        
        <div class="container">

          
          
          <div class="hero-content">
          
            
            <p class="hero-text" style="display: flex; align-items: center;">
              <a href="#"><img src="assets/images/mrce.png" alt="" style="height: 70px; width: 70px; margin-right: 15px;"></a>
              <b>Department of Computer Science & Engineering</b>
            </p>
            <h1 class="h1 section-title">
            <span class="span" style="color: rgb(35, 159, 241);">TechieHub</span> <br>Minds of Innovation
            </h1>

            <p class="hero-text">
              Techie Hub, originating from the Department of Computer Science & Engineering, has become a vibrant platform for tech enthusiasts across disciplines. It organizes exciting events, competitions, and hackathons, providing a stage for students to showcase their skills and creativity            </p>

            <a href="#cat" class="btn has-before">
              <span class="span">Explore more</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>

          </div>
          <figure class="hero-banner">

            <div class="img-holder one" style="--width: 270; --height: 300;">
              <img src="./assets/images/logoo.png" width="270" height="300" alt="hero banner" class="img-cover" style="background-color: rgb(188, 212, 203);">
            </div>

            <div class="img-holder two" style="--width: 240; --height: 370;">
              <img src="./assets/images/man-prog.png" width="240" height="370" alt="hero banner"  class="img-cover" style="background-color: rgb(123, 230, 203);">
            </div>
            
            <img src="./assets/images/hero-shape-2.png" width="622" height="551" alt="" class="shape hero-shape-2">

          </figure>

        </div>
      </section>-->
  <!-- MRCE Image and College Name Container -->
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

<!-- Home Section -->
<section class="home" style="background-image:url(images/hero-bg.svg)">
  <div class="home-img">
    <img src="images/logoo.png" alt="">
  </div>
  <div class="home-content">
    <h2 style="margin: 0;">
      Department of Computer Science and Engineering
      <span style="display: block; font-weight: normal; font-size: 2em; color: rgb(8, 6, 97);">Techie Hub</span>
      <span style="display: block; font-weight: normal; font-size: 1em; color: #3a3737;">Minds Of Innovation</span>
    </h2>
    <p style="margin-top: 10px;">
      Techie Hub, originating from the Department of Computer Science & Engineering, has become a vibrant platform for tech enthusiasts across disciplines. It organizes exciting events, competitions, and hackathons, providing a stage for students to showcase their skills and creativity.
    </p>
    <br>
    <a href="#cat" class="btn">Explore more</a>
  </div>
</section>

  <!-- Marquee Section -->
<section style="width: 100%; overflow: hidden; background: linear-gradient(90deg, rgba(0,0,0,0.2), rgba(255,255,255,0.2)); padding: 10px 0;">
  <div class="marquee-container" style="display: flex; align-items: center; justify-content: center; height: 50px;">
    <div class="marquee" style="white-space: nowrap; overflow: hidden; box-sizing: border-box;">
      <p style="font-size: 1.2em; color: #0357d6; font-weight: bold; margin: 0;">🎉 Stay Tuned! We will inform you about future events and exciting updates! 🚀</p>
    </div>
  </div>
</section>

<!-- CSS for Faster Marquee Animation -->
<style>
  .marquee-container {
    position: relative;
    background: linear-gradient(90deg, rgba(0,0,0,0.2), rgba(255,255,255,0.2));
    border-radius: 5px;
    overflow: hidden;
    width: 100%;
  }

  .marquee {
    display: inline-block;
    animation: marquee 10s linear infinite; /* Faster scrolling */
  }

  @keyframes marquee {
    0% {
      transform: translateX(100%);
    }
    100% {
      transform: translateX(-100%);
    }
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .marquee {
      font-size: 1em; /* Smaller font size on smaller screens */
    }
  }
</style>

      <!-- 
        - #Objectives
      -->

      <section class="section category" id="cat" aria-label="category">
        <div class="container">

          <p class="section-subtitle">See through</p>

          <h2 class="h2 section-title">
            Our <span class="span">Objectives</span> 
          </h2>

          <p class="section-text">
            Innovate, Compete, Elevate!
          </p>

          <ul class="grid-list">

            <li>
              <div class="category-card" style="--color: 170, 75%, 41%">

                <div class="card-icon">
                  <img src="images/category-1.svg" width="40" height="40" loading="lazy"
                    alt="Online Degree Programs" class="img">
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">Cultivate subject knowledge</a>
                </h3>

                <p class="card-text">
                  Applying the course learnings and outcomes in real time
                </p>
              </div>
            </li>

            <li>
              <div class="category-card" style="--color: 351, 83%, 61%">

                <div class="card-icon">
                  <img src="images/category-2.svg" width="40" height="40" loading="lazy"
                    alt="Non-Degree Programs" class="img">
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title"> Foster Collaboration and Teamwork</a>
                </h3>

                <p class="card-text">
                  Combining students and professionals for essential learning
                </p>
              </div>
            </li>

            <li>
              <div class="category-card" style="--color: 229, 75%, 58%">

                <div class="card-icon">
                  <img src="images/category-3.svg" width="40" height="40" loading="lazy"
                    alt="Off-Campus Programs" class="img">
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">Promoting Coding environment</a>
                </h3>

                <p class="card-text">
                  Enhancing problem solving skills by fast paced competitions
                </p>

              </div>
            </li>

            <li>
              <div class="category-card" style="--color: 42, 94%, 55%">

                <div class="card-icon">
                  <img src="images/category-4.svg" width="40" height="40" loading="lazy"
                    alt="Hybrid Distance Programs" class="img">
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">Hands-on technical experiments</a>
                </h3>

                <p class="card-text">
                  Modern problems require modern solutions, which are achieved here
                </p>

              
              </div>
            </li>

          </ul>

        </div>
      </section>
      <!-- 
        - #ABOUT
      -->

      <section class="section about" id="about" aria-label="about">
        <div class="container">

          <figure class="about-banner">

            <div class="img-holder" style="--width: 520; --height: 370;">
              <img src="images/csee.jpeg" width="100%" height="370" loading="lazy" alt="about banner"
                class="img-cover">
            </div>
            <img src="images/about-shape-3.png" width="722" height="528" loading="lazy" alt=""
              class="shape about-shape-3">

          </figure>

          <div class="about-content">

            <p class="section-subtitle">Our Department</p>

            <h2 class="h2 section-title">
               <span class="span">Computer Science </span>and Engineering
            </h2>

            <p class="section-text">
              The Computer Science and Engineering (CSE) department focuses on imparting a strong foundation in both theoretical and practical aspects of computing. It fosters innovation and research, preparing students for cutting-edge technologies and real-world challenges..
            </p>

            <ul class="about-list">

              <li class="about-item">
                <ion-icon name="checkmark-done-outline" aria-hidden="true"></ion-icon>

                <span class="span">Engaging</span>
              </li>

              <li class="about-item">
                <ion-icon name="checkmark-done-outline" aria-hidden="true"></ion-icon>

                <span class="span">Mentorship</span>
              </li>

              <li class="about-item">
                <ion-icon name="checkmark-done-outline" aria-hidden="true"></ion-icon>

                <span class="span">Resourceful</span>
              </li>

            </ul>

            <img src="images/about-shape-4.svg" width="100" height="100" loading="lazy" alt=""
              class="shape about-shape-4">

          </div>

        </div>
      </section>

      <!-- 
        - #Administrators
      -->

      <section class="section blog has-bg-image" id="blog" aria-label="blog"
        style="background-image: url('images/blog-bg.svg')">
        <div class="container">

          <p class="section-subtitle">Guiding Lights of Our Progress</p>

          <h2 class="h2 section-title">Our Administrators</h2>

          <ul class="grid-list">

            <li>
              <div class="blog-card">

                <figure class="card-banner img-holder has-after" style="--width: 370; --height: 370;">
                  <img src="images/chairman.jpg" width="370" height="370" loading="lazy"
                    alt="Become A Better Blogger: Content Planning" class="img-cover">
                </figure>

                <div class="card-content">


                  <h3 class="h3">
                    <p class="card-title">Ch.Malla Reddy</p>
                  </h3>

                  <b><p class="card-subtitle">Founder and Chairman, MRCE</p></b><br>


                  <p class="card-text">
                    Our Chairman's visionary leadership and commitment to excellence have been instrumental in shaping the institution's growth. With a focus on innovation and quality education, he has created an environment where both faculty and students thrive. 
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner img-holder has-after" style="--width: 370; --height: 370;">
                  <img src="images/principal.jpg" width="370" height="370" loading="lazy"
                    alt="Become A Better Blogger: Content Planning" class="img-cover">
                </figure>

                <div class="card-content">


                  <h3 class="h3">
                    <p class="card-title">Dr. M Ashok</p>
                  </h3>

                  <b><p class="card-subtitle">  B. Tech, M. Tech, Ph.D. (CSE) <br> Principal, MRCE</p></b><br>


                  <p class="card-text">
                    Our Principal at MRCE leads with a deep commitment to academic excellence and student development. With his guidance, MRCE continues to set benchmarks in technical education.
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner img-holder has-after" style="--width: 370; --height: 370;">
                  <img src="images/HOD.jpeg" width="370" height="370" loading="lazy"
                    alt="Become A Better Blogger: Content Planning" class="img-cover">
                </figure>

                <div class="card-content">


                  <h3 class="h3">
                    <p class="card-title">Dr. Manjunath Gadiparthi</p>
                  </h3>

                  <b><p class="card-subtitle">B.Tech., M.Tech., Ph.D. <br> Head of Department, CSE</p></b><br>


                  <p class="card-text">
                    Our HOD of the CSE department is a dynamic leader with a passion for technology. Their leadership ensures that students are equipped with the skills and knowledge to excel in the ever-evolving tech industry.
                  </p>

                </div>

              </div>
              
            </li>

          </ul>

          <img src="images/blog-shape.png" width="186" height="186" loading="lazy" alt=""
            class="shape blog-shape">

        </div>
      </section>

    </article>

    <!--------faculty--------------->
   

    <section class="section blog has-bg-image" id="blog" aria-label="blog"
      style="background-image: url('images/blog-bg.svg')">
      <div class="container">

        <p class="section-subtitle"></p>

        <h2 class="h2 section-title">Our Faculty Coordinators</h2>

        <ul class="grid-list">

          <li>
            <div class="blog-card">

              <figure class="card-banner img-holder has-after" style="--width: 370; --height: 370;">
                <img src="images/Vivek-sir.jpg" width="370" height="370" loading="lazy"
                  alt="Become A Better Blogger: Content Planning" class="img-cover">
              </figure>

              <div class="card-content">


                <h3 class="h3">
                  <p class="card-title">Dr. Vivekanandhan VijayaRangan</p>
                </h3>

                <b><p class="card-subtitle">Associate Professor & Dean-EDC/IIIC</p></b><br>


                <p class="card-text">
                  Dr. Vivekanandhan VijayaRangan is an Associate Professor in the Department of Computer Science & Engineering and Dean EDC & IIIC at Malla Reddy College of Engineering. He has published extensively in reputed international journals and conferences
                </p>

              </div>

            </div>
          </li>

          <li>
            <div class="blog-card">

              <figure class="card-banner img-holder has-after" style="--width: 370; --height: 370;">
                <img src="images/Archana-mam.jpg" width="370" height="370" loading="lazy"
                  alt="Become A Better Blogger: Content Planning" class="img-cover">
              </figure>

              <div class="card-content">


                <h3 class="h3">
                  <p class="card-title">Mrs Kande Archana</p>
                </h3>

                <b><p class="card-subtitle">Assistant Professor</p></b><br>


                <p class="card-text">
                Mrs. Kande Archana is an Assistant Professor with a strong background in Computer Science and has experience in both teaching and research. She is known for her engaging teaching. Her dedication to student success is evident through her mentoring and guidance, helping students achieve their academic and professional goals.
                </p>

              </div>

            </div>
          </li>

          <li>
            <div class="blog-card">

              <figure class="card-banner img-holder has-after" style="--width: 370; --height: 370;">
                <img src="images/pushpa-mam.jpg" width="370" height="370" loading="lazy"
                  alt="Become A Better Blogger: Content Planning" class="img-cover">
              </figure>

              <div class="card-content">


                <h3 class="h3">
                  <p class="card-title">Mrs Pushpa Sanjay Joshi</p>
                </h3>

                <b><p class="card-subtitle">Assistant Professor</p></b><br>


                <p class="card-text">
                Mrs. Pushpa Sanjay Joshi serves as an Assistant Professor in the Department of Computer Science. She is highly regarded for her analytical approach to teaching and her dedication to advancing knowledge in her field. She employs a variety of pedagogical techniques to enhance the learning experience.
                </p>

              </div>

            </div>
          </li>

        </ul>

        <img src="images/blog-shape.png" width="186" height="186" loading="lazy" alt=""
          class="shape blog-shape">

      </div>
    </section>

  </article>
  </main>

<section class="video has-bg-image" aria-label="video" style="background-image: url('images/video-bg.png');">
  <div class="container">
    <p class="section-subtitle">Vision and Mission</p>
    <h2 class="h2 section-title">Our Motto</h2><br>

    <div class="video-card">
      <!-- Video element -->
      <div class="video-container">
        <video id="video-player" width="100%" height="auto" poster="images/video-banner.jpg">
          <source src="images/mainvid.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>

        <!-- Custom Play Button -->
        <button class="play-btn" aria-label="play video" id="play-pause-btn" onclick="togglePlay()">
          ▶
        </button>

        <!-- Progress Bar -->
        <div id="progress-container" style="position: absolute; bottom: 10px; left: 10px; width: calc(100% - 20px); background: rgba(0, 0, 0, 0.3); height: 5px; border-radius: 2px; cursor: pointer;">
          <div id="progress-bar" style="width: 0%; height: 100%; background: #fff;"></div>
        </div>
      </div>

    
      <img src="images/video-shape-2.png" width="158" height="174" loading="lazy" alt="" class="shape video-shape-2">
    </div>
  </div>
</section>

<script>
  const video = document.getElementById('video-player');
const playPauseBtn = document.getElementById('play-pause-btn');
const progressContainer = document.getElementById('progress-container');
const progressBar = document.getElementById('progress-bar');

// Function to play/pause video and toggle button visibility
function togglePlay() {
  if (video.paused) {
    video.play();
    playPauseBtn.style.display = 'none'; // Hide button when playing
  } else {
    video.pause();
    playPauseBtn.style.display = 'block'; // Show button when paused
  }
}

// Event listener to toggle play/pause by clicking the video
video.addEventListener('click', function () {
  togglePlay();
});

// Event listener to show the button when the video ends
video.addEventListener('ended', function () {
  playPauseBtn.style.display = 'block'; // Show button again when video ends
});

// Update progress bar as video plays
video.addEventListener('timeupdate', function () {
  const percent = (video.currentTime / video.duration) * 100;
  progressBar.style.width = percent + '%';
});

// Seek video when clicking on progress bar
progressContainer.addEventListener('click', function (e) {
  const offsetX = e.clientX - progressContainer.getBoundingClientRect().left;
  const newTime = (offsetX / progressContainer.clientWidth) * video.duration;
  video.currentTime = newTime;
});

// Automatically adjust video to fullscreen while keeping aspect ratio
video.addEventListener('loadedmetadata', function () {
  video.style.objectFit = 'cover'; // Crops some part for full-screen
});

// Enable video sound by default
video.muted = false;
video.volume = 1.0;

</script>  <br>
  <!-- 
    - #FOOTER
  -->
<!----
  <footer class="footer" style="background-image: url('./assets/images/footer-bgg.png')">

    <div class="footer-top section">
      <div class="container grid-list">

        <div class="footer-brand">

          <a href="#" class="logo">
            <img src="./assets/images/log.png" width="162" height="50" alt="EduWeb logo">
          </a>

          <p class="footer-brand-text">
           Techie hub from CSE Department
          </p>

          <div class="wrapper">
            <span class="span">Add:</span>

            <address class="address">Malla Reddy College Of Engineering</address>
          </div>

          <div class="wrapper">
            <span class="span">Call:</span>

            <a href="tel:+011234567890" class="footer-link">+01 123 4567 890</a>
          </div>

          <div class="wrapper">
            <span class="span">Email:</span>

            <a href="mailto:info@eduweb.com" class="footer-link">techiehub@mrce.in</a>
          </div>

        </div>

      

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Links</p>
          </li>

          <li>
            <a href="#" class="footer-link">Home</a>
          </li>

          <li>
            <a href="#" class="footer-link">Team</a>
          </li>

          <li>
            <a href="#" class="footer-link">Events</a>
          </li>

          <li>
            <a href="#" class="footer-link">Gallery</a>
          </li>

          <li>
            <a href="#" class="footer-link">Contact us</a>
          </li>

         

        </ul>

        <div class="footer-list">

          <p class="footer-list-title">Contacts</p>

          <p class="footer-list-text">
            Enter your email address to register to our newsletter 
          </p>

          <form action="" class="newsletter-form">
            <input type="email" name="email_address" placeholder="Your email" required class="input-field">

            <button type="submit" class="btn has-before">
              <span class="span">Subscribe</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </button>
          </form>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-youtube"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          Copyright All Rights Reserved by <a href="#" class="copyright-link">TechieHub</a>
        </p>

      </div>
    </div>

  </footer>
--->
<br><br><br><br><br><br>
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
    </li>
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
  <script src="js/script.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>