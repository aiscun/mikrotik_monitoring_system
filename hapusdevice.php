<?php 
session_start();
if ( !isset($_SESSION["login"]) ){
	header("Location: login.php");
	exit;
}

require 'function.php';


$id = $_GET["device_id"];

if(hapusdevice($id) > 0){
	echo "
	<script>
		alert('data successfully deleted!');
		document.location.href = 'device.php';
	</script>";
} else {
	echo "
	<script>
		alert('data failed to delete!');
		document.location.href = 'device.php';
	</script>";
}


?>