<?php
	session_start();
	if (!isset($_SESSION['login']))
		header('Location: index.php');
	include('configdb.php');
	$kriteria = $_POST['kriteria']; 
	$kepentingan = $_POST['kepentingan'];
	$cost_benefit = $_POST['cost_benefit'];
	
	$result = $mysqli->query("UPDATE kriteria SET `kriteria` = '".$kriteria."', `kepentingan` = '".$kepentingan."', `cost_benefit` = '".$cost_benefit."' WHERE `id_kriteria` = ".$_GET['id'].";");
	if(!$result){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		header('Location: kriteria.php');
	}
?>