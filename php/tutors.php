<?php
include_once("dbconnect.php");
session_start();
if (!isset($_SESSION['sessionid'])) {
  $user_email = $_SESSION['user_email'];
  $user_name = $_SESSION['user_name'];
  $user_phone = $_SESSION['user_phone'];
  echo "<script>alert('Session not available. Please login');</script>";
  echo "<script> window.location.replace('login.php')</script>";
}

$results_per_page = 10;
if (isset($_GET['pageno'])) {
  $pageno = (int)$_GET['pageno'];
  $page_first_result = ($pageno - 1) * $results_per_page;
} else {
  $pageno = 1;
  $page_first_result = 0;
}

include_once("dbconnect.php");
  $sqltutors = "SELECT * FROM tbl_tutors";
  $stmt = $conn->prepare($sqltutors);
  $stmt->execute();
  $number_of_result = $stmt->rowCount();
  $number_of_page = ceil($number_of_result / $results_per_page);
  $sqltutors = $sqltutors . " LIMIT $page_first_result , $results_per_page";
  $stmt = $conn->prepare($sqltutors);
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $rows = $stmt->fetchAll();
  $conn= null;

  function truncate($string, $length, $dots = "...") {
    return (strlen($string) > $length) ? substr($string, 0, $length - strlen($dots)) . $dots : $string;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="../js/menu.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    body, h1, h2, h3, h4, h5, h6 {
        font-family: "Karma", serif
    }

    img {
        width: 200px;
        height: 300px;
        object-fit: contain;
    }
</style>

<style>

.checked {
      color: rgb(233, 131, 233);
    }

    /* Style buttons */
    .btn {
      background-color: rgb(155, 2, 194);
      border: none;
      color: white;
      padding: 12px 30px;
      cursor: pointer;
      font-size: 20px;
    }

    /* Darker background on mouse-over */
    .btn:hover {
      background-color: rgb(218, 89, 218);
    }

    * {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 2000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
    /* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
    /* Footer */
    .footer {
      position: static;
      left: 0;
      bottom: 0;
      height: 100px;
      width: 100%;
      color: white;
      text-align: center;
    }

    .footer a {
      text-decoration: none;
    }

    * {
      box-sizing: border-box;
    }
    
    /* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 5px;
}

.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 10px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #378080;
  color: white;
}

.fa {font-size:20px;}

    </style>
      <script>
        // Used to toggle the menu on small screens when clicking on the menu button
        function myFunction() {
          var x = document.getElementById("navDemo");
          if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
          } else {
            x.className = x.className.replace(" w3-show", "");
          }
        }

        
      </script>
<body>
<div class="w3-top">
    <div class="w3-bar w3-purple w3-padding-16" id="navBar">
      <!-- Float links to the right. Hide them on small screens -->
      <div class="w3-bar">
      <a href="index.php" class="w3-bar-item w3-button w3-wide w3-">
      <i class="fa fa-cogs"></i><b> MY TUTOR</b> </a>
      <a href="index.php" class="w3-bar-item w3-button w3-hide-small">Courses</a>
    <a href="tutors.php" class="w3-bar-item w3-button w3-hide-small">Tutors</a>
    <a href="#subscription" class="w3-bar-item w3-button w3-hide-small">Subscription</a>
    <a href="#profile" class="w3-bar-item w3-button w3-hide-small">Profile</a>
        <a href="javascript:void(0)" onClick="sideMenu()"
          class="w3-bar-item w3-button w3-hide-large w3-hide-medium">&#9776</a>
         
      </div>

      <div id="idsidebar" class="w3-bar-block w3-white w3-hide-medium w3-hide-large w3-hide">
        <a href="../php/index.php" class="w3-bar-item w3-button">Courses</a>
        <a href="../php/tutors.php" class="w3-bar-item w3-button">Tutors</a>
        <a href="" class="w3-bar-item w3-button">Subscription</a>
        <a href="" class="w3-bar-item w3-button">Profile</a>
      </div>
    </div>
  </div>


    <!-- Header -->
  <header class="w3-display-container w3-content" style="max-width:1400px;" id="home">
    <img class="w3-image" src="../res/pics/77.png" alt="Homepage" style="width:1400px; height:300px; object-fit: cover; filter: brightness(50%);">
    <div class="w3-display-middle w3-margin-top w3-margin-left w3-center" style="max-width:1400px;">
      <h1 class="w3-xxlarge w3-text-white"><span class=" w3-text-light-grey"><b>Tutor</b></span></h1>
      </h1>
    </div>
  </header>

  </div>
    <div class="w3-grid-template w3-margin-right w3-margin-left">
      <?php
        $i = 0;
        foreach ($rows as $tutor) {
        $i++;
        $tutorid = $tutor['tutor_id'];
        $tutorname = truncate($tutor['tutor_name'],60);
        $tutoremail = $tutor['tutor_email'];
        $tutorphone = $tutor['tutor_phone'];
        echo "<div class='w3-card-4 w3-round' style='margin: 10px'><header class='w3-container w3-purple'><b>$tutorname</b>
        </header><p><img class='w3-image' src=../assets/tutors/$tutorid.jpg" .
            " onerror=this.onerror=null;this.src='../res/images/profile.png' style='height: 150px; display: block; margin: auto'></p>
            <hr/>
            <p class='w3-container w3-center'>Email: $tutoremail<br />Phone Number: $tutorphone<br /></p>
        </div>";
    }

    echo "</table>";
?>}
    </div>
    <br>

    <?php
    $num = 1;
    if ($pageno == 1) {
        $num = 1;
    } else if ($pageno == 2) {
        $num = ($num) + 10;
    } else {
        $num = $pageno * 10 - 9;
    }
    echo "<div class='w3-container w3-row'>";
    echo "<center>";
    for ($page = 1; $page <= $number_of_page; $page++) {
        echo '<a href = "index.php?pageno=' . $page . '" style=
            "text-decoration: none">&nbsp&nbsp' . $page . ' </a>';
    }
    echo " ( " . $pageno . " )";
    echo "</center>";
    echo "</div>";
    ?>
    <br>

      <!--footer-->
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