<?php
include('config.php');
$msg = "";
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    mysqli_query($con, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
    echo "<script> window.location.href = 'login2.php' </script>";
}
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Sign-up</title>
    <link href="css/signup.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="sign-up">
            <div id="png"><a href="index.php" title="HOME"><img style="width:55px; height:55px ; "
                        src="images/home-page.png"></a></div>
            <!--heading-->
            <form action="" method="post">
                <h1 align="center"><b>Welcome</b></h1><br>
                <h3 class="heading">
                    <div class="para">Please Fill in the blanks To Sign Up</div>
                </h3><br>
                <!--name-box-->
                <div class="text">
                    <img height="20px" src="images/user.png">
                    <input placeholder=" Username" type="text" name="username">
                </div>
                <!--Password-box-->
                <div class=" text">
                    <img height="20px" src="images/password.png">
                    <input placeholder=" Password" type="password" name="password">
                </div>
                <!--trems-->

                <div class="trems">
                    <input class="check" type="checkbox" required>
                    <p class="conditions">I read and agree to the <a href="#">Trems & Conditions</a></p>
                </div>
                <!--button-->
                <div class="toop">
                    <button type="submit" class="btn btn-primary" name="signup">CREATE ACCOUNT</button>
                </div>

            </form>
            <!--sign-in-->
            <div class="t">
                <p class="conditions" id="p3">Already have an account <a href="login.php">Sign in</a></p>
            </div>
        </div>
    </div>
    <!--text-container-->
    <div class="text-container">

        <h1 style="color: #2d2c2c;font-family:cursive;">Glad to see you</h1>

        <div class="diag"><img class="fig1" width="100%" height="105%" src="images/Inkeddia_LI.jpg"> </div>
    </div>
    </div>
</body>

</html>