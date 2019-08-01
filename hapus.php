<?php 
session_start();
if ( !isset($_SESSION["login"]) ){
	header("Location: login.php");
	exit;
}

require 'function.php';


$id = $_GET["customer_id"];

if(hapus($id) > 0){
	echo "
	<script>
		alert('data successfully deleted!');
		document.location.href = 'customer.php';
	</script>";
} else {
	echo "
	<script>
		alert('data failed to delete!');
		document.location.href = 'customer.php';
	</script>";
}


?>