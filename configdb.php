<?php
	@session_start();
	$_SESSION['judul'] = 'SPK Shei Tai';
	$_SESSION['welcome'] = 'SPK Untuk Perekrutan Calon Karyawan <br> Pada PT. Shei Tai Industrial <br> Menggunakan Metode SAW';
	$_SESSION['by'] = 'FIRSTPLATO LAB';
	$mysqli = new mysqli('localhost','ppdiwebi_saw','@saw1717','ppdiwebi_saw');
	if($mysqli->connect_errno){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
?>