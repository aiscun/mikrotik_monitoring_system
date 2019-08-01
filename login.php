<?php 

session_start();
require 'function.php';

if ( isset($_COOKIE['id']) && isset($_COOKIE['key']) ){
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	$result = mysqli_query($conn, "SELECT uname FROM admin WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	if ( $key === hash('sha256', $row['uname']) )
		$_SESSION['login'] = true;

	}


if ( isset($_SESSION["login"]) ){
	header("Location: index.php");
	exit;
}

if ( isset($_POST["login"]) ){

	$uname = $_POST["uname"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM admin WHERE uname = '$uname'");
	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])){
			$_SESSION["login"] = true;
			if ( isset($_POST['remember']) ){
				setcookie('id', $row['id'], time() + 60);
				setcookie('key', hash('sha256', $row['uname']), time() + 60);
			}
			header("Location: index.php");
			exit;
		}
	}
	$error = true;
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Form Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		   <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
		<link rel="shortcut icon" href="image/logoicon.png"/>
		<link rel="stylesheet" href="css/main11.css"/>
		<link rel="stylesheet" href="css/bgimg-login.css"/>
		<link rel="stylesheet" href="css/bgimg-nosocial.css"/>
		<link rel="stylesheet" href="css/font.css"/>
		<link rel="stylesheet" href="css/font-awesome.min.css"/>
		<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
	<div class="background"></div>
	<div class="backdrop"></div>
	<div class="login-form-container" id="login-form">
		<div class="login-form-content">
			<div class="login-form-header">
				<div class="logo">
					<img src="image/logo.png"/>
				</div>
				<br>
			</div>

	<?php if (isset($error)) : ?>
		echo "<script>
				alert('username / password incorrect!');
				document.location.href = 'login.php';
			 </script>";
	<?php endif; ?>

	<form method="post" action="" class="login-form">
				<div class="input-container">
					<i class="fa fa-user"></i>
					<input type="uname" class="input" name="uname" required="" placeholder="Username"/>
				</div>
				<div class="input-container">
					<i class="fa fa-lock"></i>
					<input type="password"  id="login-password" required="" class="input" name="password" placeholder="Password"/>
					<i id="show-password" class="fa fa-eye"></i>
				</div>
				<div class="rememberme-container">
					<input type="checkbox" name="rememberme" id="rememberme"/>
					<label for="rememberme" class="rememberme"><span>Keep me sign in</span></label>
				</div>
			<input type="submit" name="login" value="LOGIN" class="
			button">
			<br>
			<div class="separator">
			<span class="separator-text">OR</span>
				</div>
			<a href="registrasi.php" class="register">REGISTER</a>
	</form>

</body>
</html>