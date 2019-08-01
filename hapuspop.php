<?php 
session_start();
if ( !isset($_SESSION["login"]) ){
	header("Location: login.php");
	exit;
}

require 'function.php';


$id = $_GET["pop_id"];

if(hapuspop($id) > 0){
	echo "
	<script>
		alert('data successfully deleted!');
		document.location.href = 'pop.php';
	</script>";
} else {
	echo "
	<script>
		alert('data failed to delete!');
		document.location.href = 'pop.php';
	</script>";
}


?>