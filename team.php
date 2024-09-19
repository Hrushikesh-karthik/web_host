<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Font Awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- 
    - primary meta tag
  -->
  <title>Teams</title>
  <meta name="title" content="known for hosting technical events">
  <meta name="description" content="">

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="images/logoo.png" type="image/svg+xml">

    <style>
      
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #BE93C5;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #7BC6CC, #BE93C5);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #7BC6CC, #BE93C5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

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
.wrapper .title{
    text-align: center;
}

.title h4{
    display: inline-block;
    padding: 20px;
    color: #080808;
    font-size: 35px;
    font-weight: 500;
    letter-spacing: 1.2px;
    word-spacing: 5px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    text-transform: uppercase;
    backdrop-filter: blur(15px);
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
    word-wrap: break-word;
}
.title span{
  font-size: 15px;
}
.wrapper .card_Container{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    margin: 40px 0;
}

.card_Container .card{
    position: relative;
    width: 300px;
    height: 400px;
    margin: 20px;
    overflow: hidden;
    box-shadow: 0 30px 30px -20px rgba(0, 0, 0, 1),
                inset 0 0 0 1000px rgba(166, 190, 221, 0.986);
    border-radius: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.card .imbBx, .imbBx img{
    width: 100%;
    height: 100%;
}

.card .content{
    position: absolute;
    bottom: -160px;
    width: 100%;
    height: 160px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    backdrop-filter: blur(15px);
    box-shadow: 0 -10px 10px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    transition: bottom 0.5s;
    transition-delay: 0.65s;
}

.card:hover .content{
    bottom: 0;
    transition-delay: 0s;
}

.content .contentBx h3{
    text-transform: uppercase;
    color: #050505;
    letter-spacing: 2px;
    font-weight: 500;
    font-size: 18px;
    text-align: center;
    margin: 20px 0 15px;
    line-height: 1.1em;
    transition: 0.5s;
    transition-delay: 0.6s;
    opacity: 0;
    transform: translateY(-20px);
}

.card:hover .content .contentBx h3{
    opacity: 1;
    transform: translateY(0);
}

.content .contentBx h3 span{
    font-size: 12px;
    font-weight: 300;
    text-transform: initial;
    color: rgb(246, 246, 247);
}

.content .sci{
    position: relative;
    bottom: 10px;
    display: flex;
}

.content .sci li{
    list-style: none;
    margin: 0 10px;
    transform: translateY(40px);
    transition: 0.5s;
    opacity: 0;
    transition-delay: calc(0.2s * var(--i));
}

.card:hover .content .sci li{
    transform: translateY(0);
    opacity: 1;
}

.content .sci li a{
    color: #fff;
    font-size: 24px;
}
    </style>
</head>
<body>

    <div class="wrapper">
<div class="wrap" >
      <a href="index.php" class="back-button"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </div>
      <div class="title">
        <h4>Meet Our Team <br><ul><span>Masterminds behind the stage!!</span></ul></h4>
    </div>
        <div class="card_Container">

            <div class="card">

                <div class="imbBx">
                    <img src="./team-images/unknown.png" alt="">
                </div>

                <div class="content">
                    <div class="contentBx">
                        <h3>Sathwik Laxman Poosala <br><span>President</span></h3>
                    </div>
                    <ul class="sci">
                        <li style="--i: 1">
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li style="--i: 2">
                            <a href="#"><i class="fa-brands fa-github"></i></a>
                        </li>
                        <li style="--i: 3">
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="card">

                <div class="imbBx">
                    <img src="team-images/unknown.png" alt="">
                </div>

                <div class="content">
                    <div class="contentBx">
                        <h3>Soma Surya Chandra <br><span>Operational Head</span></h3>
                    </div>
                    <ul class="sci">
                        <li style="--i: 1">
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li style="--i: 2">
                            <a href="#"><i class="fa-brands fa-github"></i></a>
                        </li>
                        <li style="--i: 3">
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                    </ul>
                </div>

            </div>

          


            <div class="card">

                <div class="imbBx">
                    <img src="team-images/dedeepya.jpg" alt="">
                </div>

                <div class="content">
                    <div class="contentBx">
                        <h3>Dedeepya <br><span>Secretory</span></h3>
                    </div>
                    <ul class="sci">
                        <li style="--i: 1">
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li style="--i: 2">
                            <a href="#"><i class="fa-brands fa-github"></i></a>
                        </li>
                        <li style="--i: 3">
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="card">

              <div class="imbBx">
                  <img src="team-images/yuvraj.jpg" alt="">
              </div>

              <div class="content">
                  <div class="contentBx">
                      <h3>Yuvraj <br><span>Correspondent</span></h3>
                  </div>
                  <ul class="sci">
                      <li style="--i: 1">
                          <a href="#"><i class="fa-brands fa-instagram"></i></a>
                      </li>
                      <li style="--i: 2">
                          <a href="#"><i class="fa-brands fa-github"></i></a>
                      </li>
                      <li style="--i: 3">
                          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                      </li>
                  </ul>
              </div>

          </div><div class="card">

                <div class="imbBx">
                    <img src="team-images/sampath.jpg" alt="">
                </div>

                <div class="content">
                    <div class="contentBx">
                        <h3>Sampath <br><span>Treasurer</span></h3>
                    </div>
                    <ul class="sci">
                        <li style="--i: 1">
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li style="--i: 2">
                            <a href="#"><i class="fa-brands fa-github"></i></a>
                        </li>
                        <li style="--i: 3">
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card">

              <div class="imbBx">
                  <img src="team-images/bhanu.jpg" alt="">
              </div>
            <div class="content">
              <div class="contentBx">
                  <h3>Bhanu Charan <br><span>Event Organiser</span></h3>
              </div>
              <ul class="sci">
                  <li style="--i: 1">
                      <a href="#"><i class="fa-brands fa-instagram"></i></a>
                  </li>
                  <li style="--i: 2">
                      <a href="#"><i class="fa-brands fa-github"></i></a>
                  </li>
                  <li style="--i: 3">
                      <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                  </li>
              </ul>
          </div>

      </div>
            <div class="card">

              <div class="imbBx">
                  <img src="team-images/jathin.jpg" alt="">
              </div>

              <div class="content">
                  <div class="contentBx">
                      <h3>Jathin <br><span>Event Organiser</span></h3>
                  </div>
                  <ul class="sci">
                      <li style="--i: 1">
                          <a href="#"><i class="fa-brands fa-instagram"></i></a>
                      </li>
                      <li style="--i: 2">
                          <a href="#"><i class="fa-brands fa-github"></i></a>
                      </li>
                      <li style="--i: 3">
                          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                      </li>
                  </ul>
              </div>

          </div>
          <div class="card">

            <div class="imbBx">
                <img src="team-images/yamini.png" alt="">
            </div>

            <div class="content">
                <div class="contentBx">
                    <h3>Amrutha Yamini <br><span>Event Organiser</span></h3>
                </div>
                <ul class="sci">
                    <li style="--i: 1">
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    </li>
                    <li style="--i: 2">
                        <a href="#"><i class="fa-brands fa-github"></i></a>
                    </li>
                    <li style="--i: 3">
                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="card">

          <div class="imbBx">
              <img src="team-images/trisha.jpeg" alt="">
          </div>

          <div class="content">
              <div class="contentBx">
                  <h3>Trisha <br><span>Communication Officer</span></h3>
              </div>
              <ul class="sci">
                  <li style="--i: 1">
                      <a href="#"><i class="fa-brands fa-instagram"></i></a>
                  </li>
                  <li style="--i: 2">
                      <a href="#"><i class="fa-brands fa-github"></i></a>
                  </li>
                  <li style="--i: 3">
                      <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                  </li>
              </ul>
          </div>

      </div>
      <div class="card">

        <div class="imbBx">
            <img src="team-images/sanjay.png" alt="">
        </div>
      <div class="content">
        <div class="contentBx">
            <h3>Sanjay <br><span>Communication Officer</span></h3>
        </div>
        <ul class="sci">
            <li style="--i: 1">
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
            </li>
            <li style="--i: 2">
                <a href="#"><i class="fa-brands fa-github"></i></a>
            </li>
            <li style="--i: 3">
                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </li>
        </ul>
    </div>

</div>
<div class="card">

  <div class="imbBx">
      <img src="team-images/suvarna.jpg" alt="">
  </div>
<div class="content">
  <div class="contentBx">
      <h3>Suvarna Kumar <br><span>Discipline Officer</span></h3>
  </div>
  <ul class="sci">
      <li style="--i: 1">
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
      </li>
      <li style="--i: 2">
          <a href="#"><i class="fa-brands fa-github"></i></a>
      </li>
      <li style="--i: 3">
          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
      </li>
  </ul>
</div>

</div>
<div class="card">

  <div class="imbBx">
      <img src="team-images/amer.jpg" alt="">
  </div>
<div class="content">
  <div class="contentBx">
      <h3>Ameer Pasha
        <br><span>Volunteer Coordinator</span></h3>
  </div>
  <ul class="sci">
      <li style="--i: 1">
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
      </li>
      <li style="--i: 2">
          <a href="#"><i class="fa-brands fa-github"></i></a>
      </li>
      <li style="--i: 3">
          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
      </li>
  </ul>
</div>

</div>
<div class="card">

  <div class="imbBx">
      <img src="team-images/veekshan.jpeg" alt="">
  </div>
<div class="content">
  <div class="contentBx">
      <h3>Veekshan <br><span>Social Media Handler</span></h3>
  </div>
  <ul class="sci">
      <li style="--i: 1">
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
      </li>
      <li style="--i: 2">
          <a href="#"><i class="fa-brands fa-github"></i></a>
      </li>
      <li style="--i: 3">
          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
      </li>
  </ul>
</div>

</div>

<div class="card">
<div class="imbBx">
  <img src="team-images/gowthami.jpg" alt="">
</div>
<div class="content">
<div class="contentBx">
  <h3>Gowthami <br><span>Co-Operational Head</span></h3>
</div>
<ul class="sci">
  <li style="--i: 1">
      <a href="#"><i class="fa-brands fa-instagram"></i></a>
  </li>
  <li style="--i: 2">
      <a href="#"><i class="fa-brands fa-github"></i></a>
  </li>
  <li style="--i: 3">
      <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
  </li>
</ul>
</div>

</div>
<div class="card">
  <div class="imbBx">
    <img src="team-images/bhavana.jpeg" alt="">
  </div>
  <div class="content">
  <div class="contentBx">
    <h3>Bhavana<br><span>Co-Event Organiser</span></h3>
  </div>
  <ul class="sci">
    <li style="--i: 1">
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
    </li>
    <li style="--i: 2">
        <a href="#"><i class="fa-brands fa-github"></i></a>
    </li>
    <li style="--i: 3">
        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
    </li>
  </ul>
  </div>
  
  </div>
  <div class="card">
    <div class="imbBx">
      <img src="team-images/trishank.jpg" alt="">
    </div>
    <div class="content">
    <div class="contentBx">
      <h3>Trishank Raju<br><span>Co-Treasurer</span></h3>
    </div>
    <ul class="sci">
      <li style="--i: 1">
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
      </li>
      <li style="--i: 2">
          <a href="#"><i class="fa-brands fa-github"></i></a>
      </li>
      <li style="--i: 3">
          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
      </li>
    </ul>
    </div>
    
    </div>
        </div>

    </div>

</body>
</html>