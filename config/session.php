<?php 
session_start();
if($_SESSION["senha"] == null) {
	header("location:painelLogin.php");
}

?>

