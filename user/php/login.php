<?php

if (isset($_POST['submit'])) {
    include 'db_connect.php';
    $email = $_POST['email'];
    $pass = sha1($_POST['password']);
    $sqllogin = "SELECT * FROM db_login WHERE email = '$email' AND password = '$pass'";
    $stmt = $conn->prepare($sqllogin);
    $stmt->execute();
    $number_of_rows = $stmt->fetchColumn();
    
    if ($number_of_rows  > 0) {
        session_start();
        $_SESSION["sessionid"] = session_id();
        $_SESSION["email"] = $email ;
        echo "<script>alert('Login Success');</script>";
        echo "<script> window.location.replace('index.php')</script>";
    } else {
        echo "<script>alert('Login Failed');</script>";
        echo "<script> window.location.replace('login.php')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="../js/login.js" defer></script>

</head>
<style>
    
    body{
        background-image: url("1.png");
        }
</style>
<body onload="loadCookies()">
    <header class="w3-header w3-center">
<h2 style="font-weight:bold ">
    My Tutor
</h2>
    </header>
    <div style="display:flex; justify-content: center">
        <div class="w3-white w3-container w3-card w3-padding w3-margin" style="width:600px;margin:auto;text-align:left;border-radius: 20px;
">
<h3 class= "w3-center" style="font-weight:bold">Welcome Back To My Tutor</h3>
        <p>
            To keep connected with us please kogin with your personal information by email address and password.
        </p>
        <img src="2.png" class="w3-center" style="background-size: cover;">
        
            <form name="loginForm" action="login.php" method="post">
                <p>
                    <label><b>Email</b></label>
                    <input class="w3-input w3-round w3-border" type="email" name="email" id="idemail" placeholder="Your email" required>
                </p>
                <p>
                    <label><b>Password</b></label>
                    <input class="w3-input w3-round w3-border" type="password" name="password" id="idpass" placeholder="Your password" required>
                </p>
                <p>
                    <input class="w3-check" name="rememberme" type="checkbox" id="idremember" onclick="rememberMe()">
                    <label>Remember Me</label>
                </p>
                <p>
                    <input class="w3-button w3-round w3-border w3-brown" type="submit" name="submit" id="idsumit" value="Login">
                </p>
                <p class="w3-center">
                Doesn't have an account yet?
                <a href="regis.php" class="w3-bar-item">Sign up here!</a>
                </p>
            </form>
        </div>
    </div>
    <div id="cookieNotice" class="w3-center w3-block" style="display: none;">
        <div class="w3-white">
            <h4>Cookie Consent</h4>
            <p>This website uses cookies or similar technologies, to enhance your
                browsing experience and provide personalized recommendations.
                By continuing to use our website, you agree to our
                <a style="color:#115cfa;" href="/privacy-policy">Privacy Policy</a>
            </p>
            <div class="w3-button">
                <button onclick="acceptCookieConsent();">Accept</button>
            </div>
        </div>
    </div>
    <footer class="w3-footer w3-center">
        <p>
            Copyright © 2019 MyTutorWong 
        </p>

    </footer>
</body>
<script>
    let cookie_consent = getCookie("user_cookie_consent");
    if (cookie_consent != "") {
        document.getElementById("cookieNotice").style.display = "none";
    } else {
        document.getElementById("cookieNotice").style.display = "block";
    }
</script>
</html>