<?php
	include 'conn.php';
	session_start();
	if(isset($_SESSION['acctype'])){
		$acctype = $_SESSION['acctype'];
		$email = $_SESSION['email'];
		
		if($acctype == 1){
			header('location: mentorship-admin.php');
		}else{
			$group = "select mentor_grp from user_info where email like '$email'";
			$grun = mysqli_query($con, $group);
			$_SESSION['grp'] = mysqli_num_rows($grun);
			$grow = mysqli_fetch_array($grun);
			if(mysqli_num_rows($grun)==1){
				$_SESSION['group'] = $grow[0];
				header('location: home.php');
			}else{
				header('location: select-group.php');
			}
		}
	}
	else{
		
		header('location: index.php');
	}
?>