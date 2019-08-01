<?php 
// jika tombol register sudah ditekan
require 'function.php';

if (isset($_POST["register"])){

	if (registrasi($_POST) > 0 ){
		echo "<script>
				alert('new user successfully added!');
				document.location.href = 'login.php';
			 </script>";
	} else {
		echo mysqli_error($conn);
	}
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Form Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
     <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="shortcut icon" href="img/logo.png"/>
    <link rel="stylesheet" href="css/main.css"/>
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
          <img src="img/logo.png"/>
        </div>
        <br>
      </div>

 
  <form method="post" action="" class="login-form">
        <div class="input-container">
          <i class="fa fa-envelope"></i>
          <input type="text" class="input" name="username" id="username" placeholder="Email"/>
        </div>
        <div class="input-container">
          <i class="fa fa-user"></i>
          <input type="text" class="input" name="uname" id="uname" placeholder="Username"/>
        </div>
        <div class="input-container">
          <i class="fa fa-lock"></i>
          <input type="password"  id="password" class="input" name="password" placeholder="Password"/>
          <!-- <i id="show-password" class="fa fa-eye"></i> -->
        </div>
        <div class="input-container">
          <i class="fa fa-lock"></i>
          <input type="password"  id="password2" class="input" name="password2" placeholder="Retype Password"/>
          <!-- <i id="show-password" class="fa fa-eye"></i> -->
        </div>
        
      <input type="submit" name="register" value="REGISTER" class="
      button">
      <br>

      <br><br>
      <center>Already have an account?<a href="login.php"> <b>Login</b></a></center>
    
  </form>

</body>
</html>