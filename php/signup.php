<?php
if (isset($_POST['submit'])) {
    include_once("dbconnect.php");
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = sha1($_POST['password']);
    $sqlregister = "INSERT INTO tbl_user (user_email, user_name, user_number, user_pass, user_address) VALUES ('$email', '$name', '$phone', '$password', '$address')";
    try {
        $conn->exec($sqlregister);

        if (file_exists($_FILES["fileToUpload"]["tmp_name"]) || is_uploaded_file ($_FILES["fileToUpload"]["tmp_name"])) {
            $last_id = $conn -> lastInsertId();
            uploadImage($last_id);
            echo "<script>alert('Success')</script>";
            echo "<script>window.location.replace('login.php')</script>";
        } 
    } catch (PDOException $e) {
        echo "<script>alert('Failed')</script>";
        echo "<script>window.location.replace('signup.php')</script>";
    }
}

function uploadImage($filename)
{
    $target_dir = "../res/user/";
    $target_file = $target_dir . $filename . ".png";
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
        object-fit: cover;
    }
</style>
</head>

<body>
    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
            <a href="index.php" class="w3-bar-item w3-button"><b>MYTutor</b></a>
            <!-- Float links to the right. Hide them on small screens -->
            <div class="w3-right">
                <a href="login.php" class="w3-bar-item w3-button">Log In</a>
                <a href="signup.php" class="w3-bar-item w3-button">Sign Up</a>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="w3-display-container w3-content" style="max-width:1400px;" id="home">
        <img src="../res/pics/signup.jpg" alt="Homepage" style="width:1400px; height:200px;">
        <style>
            img {
                filter: brightness(60%);
            }
        </style>
        <div class="w3-display-middle w3-margin-top w3-margin-left w3-center" style="max-width:1400px;">
            <h1 class="w3-xxxlarge w3-text-white"><span class=" w3-text-light-grey"><b>SIGN UP</b></span></h1>
        </div>
    </header>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main w3-content w3-padding w3-center" style="max-width:1500px;margin-top:30px">
        <div style="display:flex; justify-content: center">
            <div class="w3-container w3-card w3-padding w3-margin" style="width:600px;margin:auto;text-align:left;">
                <form name="signupForm" action="signup.php" method="post" enctype="multipart/form-data">
            <div class="w3-container w3-center">
                <img class="w3-image w3-margin" src="../res/profile.png" style="height:300px;width:350px"><br>
                <input type="file" name="fileToUpload" onchange="previewFile()">
            </div>
                    <p>
                        <label><b>Name</b></label>
                        <input class="w3-input w3-round w3-border" type="text" name="name" id="idname"
                            placeholder="Your name" required>
                    </p>
                    <p>
                        <label><b>Email</b></label>
                        <input class="w3-input w3-round w3-border" type="email" name="email" id="idemail"
                            placeholder="Your email" required>
                    </p>
                    <p>
                        <label><b>Phone Number</b></label>
                        <input class="w3-input w3-round w3-border" type="tel" name="phone" id="idphone"
                            placeholder="Your phone number" required>
                    </p>
                    <p>
                        <label><b>Password</b></label><br>
                        <input class="w3-input w3-round w3-border" type="password" name="password" id="idpass"
                            placeholder="Your password" required>
                    </p>
                    <p>
                        <label><b>Home Address</b></label>
                        <input class="w3-input w3-round w3-border" type="text" name="address" id="idaddress"
                            placeholder="Your home address" required>
                    </p>
                    <p style="font-size:16px;"> Already have an account? <a href="login.php">Login</a></p>
                    <p>
                        <button class="w3-button w3-round w3-border w3-dark-gray" type="submit" name="submit">Register</button>
                    </p>
                </form>
            </div>
        </div>


        <footer id="footer" ; class="w3-container w3-purple w3-center w3-margin-top">
     <br>
      <a href="#"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
      <a href="#"><i class="fa fa-instagram w3-hover-opacity"></i></a>
      <a href="#"><i class="fa fa-twitter w3-hover-opacity"></i></a>
      <a href="#"><i
          class="fa fa-youtube w3-hover-opacity"></i></a>
          <p class="w3-center">&#169; MY TUTOR. 2022</p>
    </footer>

</body>
<script src="../js/script.js"></script>
</html>