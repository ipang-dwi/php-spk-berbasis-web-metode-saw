<?php
	session_start();
	if (!isset($_SESSION['login']))
		header('Location: index.php');
	include 'lhast.php'; 
	include('configdb.php');
	$user = $_POST['user']; 
	$pass = hashku(1,$_POST['pass']);
	
	$result = $mysqli->query("UPDATE user SET `user` = '".$user."', `pass` = '".$pass."' WHERE `user` = '".$_SESSION["user"]."';");
	if(!$result){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		$_SESSION["user"] = $user;
		$_SESSION["pass"] = $pass;
		header('Location: profile.php');
	}
?>