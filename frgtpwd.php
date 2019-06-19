<?php
	$check = 0;
	if(isset($_GET['fcode']))
	{
		include 'conn.php';
		
		$code = $_GET['fcode'];
		
		$sql = "select forgot_bit from user_info where forgot_code = '$code'";
		$run = mysqli_query($con, $sql);

		if(mysqli_num_rows($run) > 0)
		{
			$row = mysqli_fetch_array($run);
		
			$bit = $row['forgot_bit'];
			if($bit == 0)
			{
				$check = 1;
				$errdata = "THIS LINK IS EXPIRED !!!";
			}
		}
		else
		{
			$check = 1;
			$errdata = "INVALID LINK !!!";
		}
	}
	else
	{
		$check = 1;
		$errdata = "INVALID LINK !!!";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<style>
		#message{
			top:30%;
		}
	</style>
</head>
<body oncontextmenu="return false">
	<div class="outer-container">
		
		<h1><center>Sir Padampat Singhania University</center></h1>

		<article id="message">
			<div id="div1">
				<?php
					if($check == 1){
				?>	
						<div class="form-head-2">
							<center><h3><?php echo $errdata; ?></h3></center>
						</div>
				<?php		
					}else{
				?>
						<div class="form-head-2">
							<center><h3>Change Password</h3></center>
						</div>
						<center id="result" style="color:red;font-size:20px;"></center>
						<form method="POST" id="frgt_pwd_form">
							<label class="full">New Password: </label>
							<input class="form-input-2" id="pwd1" type="password" name="new_password" placeholder="New Password" required>
							<label class="full">Confirm Password: </label>
							<input class="form-input-2" id="pwd2" type="password" name="con_password" placeholder="Confirm Password" required>
							<input class="form-input-2" type="hidden" name="frgt_code" value="<?php echo $code; ?>">
							<center><button class="form-btn-2">Submit</button></center>
						</form>
				<?php
					}
				?>
			</div>
			<div id="div2" style="display:none;">
				<div class="form-head-2">
					<center><h3 id="afterResults"></h3></center>
				</div>
				<form action="index.php">
					<center><button class="form-btn-2">Home</button></center>
				</form>
			</div>
		</article>
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