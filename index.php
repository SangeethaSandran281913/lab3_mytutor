<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="../js/menu.js" defer></script>
  <style>
    body, h1, h2, h3, h4, h5, h6 {
      font-family: "Karma", serif
    }

    .w3-bar-block .w3-bar-item {
      padding: 20px
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      padding: 0 4px;
    }

    /* Create four equal columns that sits next to each other */
    .column {
      flex: 25%;
      max-width: 25%;
      padding: 0 4px;
    }

    .column img {
      margin-top: 8px;
      vertical-align: middle;
      width: 100%;
    }

    /* Responsive layout - makes a two column-layout instead of four columns */
    @media screen and (max-width: 800px) {
      .column {
        flex: 50%;
        max-width: 50%;
      }
    }

    /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
      .column {
        flex: 100%;
        max-width: 100%;
      }
    }

    img {
      width: 200px;
      height: 300px;
      object-fit: cover;
    }
  </style>
</head>

<body>
<div class="w3-top">
    <div class="w3-bar w3-flat-wisteria w3-card">
      <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)"
        onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"> </i></a>
      <a href="#"  onclick="window.location.reload(true)" class="w3-bar-item w3-button w3-padding-large w3-cursive"><i class="fa fa-cogs"></i><b> MY TUTOR</b> </a>
      <a href="php/login.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small"><i class="fa fa-lock"></i> Login 
        </a>
      <a href="php/signup.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small"><i class="fa fa-group"></i> Register
         </a>

     
      
    </a>
    </div>
  </div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
  <div id="navDemo" class="w3-bar-block w3-flat-wisteria w3-hide w3-hide-large w3-hide-medium w3-top"
  style="margin-top: 46px">
  <a href="php/login.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()"><i class="fa fa-lock"></i> Login</a>
  <a href="php/signup.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()"><i class="fa fa-group"></i> Register</a>
</div>

<!-- Content -->
<div class="w3-content" style="max-width: 2000px; margin-top: 46px">

<!-- slideshow -->
<header class="slideshow-container w3-display-container w3-center">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="images/1.png" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="images/2.png" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="images/3.png" style="width:100%">

</div>
      </header>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
<br>

<div class="row">
  <div class="column">
    <div class="card">
      <p><i class="fa fa-user"></i></p>
      <h3>50+</h3>
      <p>Tutors</p>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <p><i class="fa fa-check"></i></p>
      <h3>200+</h3>
      <p>Projects</p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <p><i class="fa fa-smile-o"></i></p>
      <h3>500+</h3>
      <p>Happy Clients</p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <p><i class="fa fa-coffee"></i></p>
      <h3>800+</h3>
      <p>Meetings</p>
    </div>
  </div>
</div>
<br>


    <footer id="footer" ; class="w3-container w3-purple w3-center w3-margin-top">
     <br>
      <a href="#"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
      <a href="#"><i class="fa fa-instagram w3-hover-opacity"></i></a>
      <a href="#"><i class="fa fa-twitter w3-hover-opacity"></i></a>
      <a href="#"><i
          class="fa fa-youtube w3-hover-opacity"></i></a>
          <p class="w3-center">&#169; MY TUTOR. 2022</p>
    </footer>

    <script>
        function sideMenu() {
            var x = document.getElementById("idsidebar");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>
</body>

</html>
