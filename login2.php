<?php
include('config.php');
include('functions.php');
$msg = "";
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$res = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password='$password'");
	if (mysqli_num_rows($res) <= 0) {
		$msg = "Username/Password Incorrect!";
	} else {
		$row = mysqli_fetch_assoc($res);
		$_SESSION['UID'] = $row['id'];
		$_SESSION['UNAME'] = $row['username'];
		echo "<script> window.location.href = 'dashboard.php' </script>";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Login Form</title>
	<link rel="stylesheet" href="css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<script>
		function forgotpsw() {
			alert("Bhula kyu");
		}
	</script>

	<img class="wave" src="images/wave.png">
	<div class="container">

		<div class="img">
			<div id="png"><a href="index.php" title="HOME"><img style="width:75px; height:75px ; "
						src="images/home-page.png"></a></div>
			<img src="images/bg.svg">
		</div>


		<div class="login-content">

			<form action="" method="POST">
				<img src="images/avatar.svg">
				<h2 class="title">Welcome</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<input type="text" name="username" placeholder="Username" class="input" required>
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<input type="password" name="password" placeholder="Password" class="input" required>
					</div>
				</div>
				<a href="#" onclick="forgotpsw()">Forgot Password?</a>
				<input type="submit" class="btn" name="login" value="Login"><br><br><br>
				<div class="app">
					<p><b>Don't have an account?</b></p>
					<a id="app1" href="signup.php">REGISTER Here</a>
				</div>
				<?php echo $msg; ?>
			</form>
		</div>
	</div>
</body>

</html>