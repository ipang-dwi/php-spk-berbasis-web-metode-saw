<?php
	session_start();
	if (isset($_SESSION['login']))
		header('Location: dashboard.php');
	include 'lhast.php'; 
	include 'configdb.php';
			$result = $mysqli->query("select * from user WHERE user = '".$_POST['user']."' and pass = '".hashku(1,$_POST['pass'])."'");
			if(@$result->num_rows != 0){
				while ($row = $result->fetch_assoc()) {
					$_SESSION['login'] = 'KJHAbkfase86234809701234hgvbKHJGVYH%$&^$%&$^*';
					$_SESSION['user'] = $row['user'];
					$_SESSION['pass'] = $row['pass'];
				}
				header('Location: dashboard.php');
			}
			else{
				$_SESSION['error']=1;
				header('Location: index.php');
			}
?>