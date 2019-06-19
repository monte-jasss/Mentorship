<?php
	session_start();
	
	if(isset($_SESSION['email']) && $_SESSION['acctype']==1){
		header('location: mentorship-admin.php');
	}
	else if(isset($_SESSION['email']) && $_SESSION['acctype']==0){
		header('location: home.php');
	}
	else if(isset($_SESSION['email']) && $_SESSION['acctype']==2){
		header('location: select-group.php');
	}
	else{
		
		
		if(isset($_GET['err'])){
			$err = $_GET['err'];
			
			if($err == 1){
				echo "<script>alert('Query Submitted Successfully !!!');window.location = 'index.php';</script>";
			}
			else if($err == 2){
				echo "<script>alert('Username or password incorrect !!!');window.location = 'index.php';</script>";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<style>
		::-webkit-scrollbar {
			width: 0px;
		}
		optional: show position indicator in red 
		::-webkit-scrollbar-thumb {
			background: #000;
		}
	</style>
</head>
<body oncontextmenu="return false">
	<div class="outer-container">
		<div id="query-box">
			<article id="message">
				<a class="pull-right closeit">X</a>
				<div class="form-head-2">
					<center><h3>Query Form</h3></center>
				</div>
				<center id="result" style="color:red;font-size:20px;"></center>
				<form method="POST" action="todb.php" enctype="multipart/form-data" id="query_form">
					<label class="full">Email: </label>
					<input class="form-input-2" type="email" name="query_email" placeholder="Email" required>
					<label class="full">Password: </label>
					<input class="form-input-2" type="password" name="query_password" placeholder="Password" required>
					<label class="full">Subject: </label>
					<input class="form-input-2" type="text" name="query_subject" placeholder="Subject" required>
					<label class="full">Attachment (Optional): </label>
					<input class="form-input-2" type="file" name="uploaded_file" >
					<label class="full">Query: </label>
					<textarea class="form-input-2" type="text" name="query" placeholder="Query or Complain" required></textarea>
					<center><button id="query_submit" class="form-btn-2">Submit</button></center>
				</form>
			</article>
		</div>
		<div id="frgt-box">
			<article id="message">
				<a class="pull-right closeit">X</a>
				<div class="form-head-2">
					<center><h3>Forgot Password</h3></center>
				</div>
				<center id="resultfrgt" style="color:red;font-size:20px;"></center>
				<form method="POST" id="frgt_form">
					<label class="full">Email: </label>
					<input class="form-input-2" type="email" id="frgt_email1" name="frgt_email" placeholder="Email" required>
					<center><button id="query_submit" class="form-btn-2">Submit</button></center>
				</form>
			</article>
		</div>
		<div id="dialog-box">
			<div id="inner-box">
				<center>For any query or complaint <b id="query"><br class="hidden">Click here</b></center>
			</div>
			<a class="pull-right closeit">X</a>
		</div>
		<h1><center>Sir Padampat Singhania University</center></h1>
		<a href="javascript:void(0)" id="frgtPwd"><img id="frgtImg" src="assets/images/forgot-password.png" /></a>
		<div class="form-holder">
			<div class="form-head">
				<center><img src="assets/images/spsu.png"></center>
				<center><h3>MENTORSHIP PROGRAMME</h3></center>
			</div>
			<div class="form-dis">
				<div><center><h3  id="error" style="color:red;"></h3></center></div>
				<form autocomplete="OFF" id="login_form">
					<p><span><i class="fa fa-user"></i></span><input class="form-input" id="open" type="text" name="username" placeholder="Enter Username" required autofocus></p>
					<p class="close"><span><i class="fa fa-lock"></i></span><input class="form-input clear" type="password" name="pass1" placeholder="Enter Password" required></p>
					<center class="close"><button class="form-btn" id="">Go!</button></center>
				</form>
			</div>
		</div>
		<ul class="bubble">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<script src="assets/js/jquery-3.2.0.min.js"></script>
	<script src="assets/js/script.js"></script>
</body>