<?php
		error_reporting(0);

		session_start();
		unset($_SESSION['name']);
		unset($_SESSION['email']);
		unset($_SESSION['acctype']);
		
		header('location: index.php');
?>