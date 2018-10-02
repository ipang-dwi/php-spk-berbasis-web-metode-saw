<?php
	session_start();
	if (!isset($_SESSION['login']))
		header('Location: index.php');
	include('configdb.php');
	$nik = $_POST['nik']; 
	$alternatif = $_POST['alternatif'];
	$dept = $_POST['dept']; 
	$k1 = $_POST['k1']; 
	$k2 = $_POST['k2'];
	$k3 = $_POST['k3'];
	$k4 = $_POST['k4'];
	
	$result = $mysqli->query("INSERT INTO `alternatif` (`id_alternatif`, `alternatif`, `k1`, `k2`, `k3`, `k4`) 
								VALUES (NULL, '".$alternatif."', '".$k1."', '".$k2."', '".$k3."', '".$k4."');");
	if(!$result){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		header('Location: alternatif.php');
	}
?>