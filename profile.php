<?php
	session_start();
	
	if(isset($_SESSION['email']))
	{
		//$sid = $_SESSION['sid'];
		$email = $_SESSION['email'];
	}
	else
	{
		
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sir Padampat Singhania University</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="assets/css/flat-admin.css">
  <link rel="shortcut icon" href="assets/images/logo.png">
  
</head>
<body>
  <div class="app app-default">

<aside class="app-sidebar" id="sidebar">
  <div class="sidebar-header">
    <a class="sidebar-brand" href="#"><span class="highlight">SPSU</span> Admin</a>
    <button type="button" class="sidebar-toggle">
      <i class="fa fa-times"></i>
    </button>
  </div>
  <div class="sidebar-menu">
    <ul class="sidebar-nav">
      <li class="">
        <a href="home.php">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">Dashboard</div>
        </a>
      </li>
	  <li class="">
        <a href="show.php">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">View</div>
        </a>
      </li>
      <li class="@@menu.messaging">
        <a href="assets/documents/time-table.pdf" target="_blank">
          <div class="icon">
            <i class="fa fa-book" aria-hidden="true"></i>
          </div>
          <div class="title">Time-Table</div>
        </a>
      </li>
	  <li class="@@menu.messaging">
		<a href="#">
		  <div class="icon">
            <i class="fa fa-cube " aria-hidden="true"></i>
          </div>
          <div class="title" style="color:#FF8F00;font-weight:bold;">Developed By:</div><div class="title" style="color:red;color:#FF8F00;"> Vaibhav Pal</div><div class="title" style="color:red;color:#FF8F00;">&nbsp;Monu Lakshkar</div>
		</a>  
      </li>
    </ul>
  </div>
</aside>

<script type="text/ng-template" id="sidebar-dropdown.tpl.html">
  <div class="dropdown-background">
    <div class="bg"></div>
  </div>
  <div class="dropdown-container">
    {{list}}
  </div>
</script>
<div class="app-container">

  <nav class="navbar navbar-default" id="navbar">
  <div class="container-fluid">
    <div class="navbar-collapse collapse in">
      <ul class="nav navbar-nav navbar-mobile">
        <li>
          <button type="button" class="sidebar-toggle">
            <i class="fa fa-bars"></i>
          </button>
        </li>
        <li class="logo">
          <a class="navbar-brand" href="#"><span class="highlight">SPSU</span> Admin</a>
        </li>
        <li>
          <button type="button" class="navbar-toggle">
            <img class="profile-img" src="./assets/images/profile.png">
          </button>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-left myhide">
		<li><img src="assets/images/logo.png" class="img-responsive hidden-xs hidden-sm" alt="SPSU LOGO" width="35%" height="auto"/></li>
        <h2 class="hidden-xs hidden-sm">SPSU HOSTEL ATTENDANCE PORTAL<h2>
      </ul>
	  <ul class="nav navbar-nav navbar-right">       
        <li class="dropdown profile">
          <a href="#" class="dropdown-toggle"  data-toggle="dropdown">
			<img class="profile-img" src="assets/images/spsu2.png" width="20%"/>
            <div class="title">Profile</div>
          </a>
          <div class="dropdown-menu">
            <div class="profile-info">
              <h4 class="username"><?php echo $_SESSION['name']; ?></h4>
            </div>
            <ul class="action">
              <li>
                <a href="#">
                  Profile
                </a>
              </li>
              <li>
              <li>
                <a href="logout.php">
                  Logout
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
	  <ul class="nav navbar-nav navbar-right hidden-md hidden-lg" >
        <li class="dropdown notification">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
          </a>
        </li>
        <li class="dropdown notification warning">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <div class="icon"><i class="fa fa-cogs" aria-hidden="true"></i></div>
          </a>
        </li>
        <li class="dropdown notification danger">
          <a href="logout.php" class="dropdown-toggle" data-toggle="dropdown">
            <div class="icon"><i class="fa fa-sign-out" aria-hidden="true"></i></div>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
	
	
	
  <div class="btn-floating" id="help-actions">
  <div class="btn-bg"></div>
  <button type="button" class="btn btn-default btn-toggle" data-toggle="toggle" data-target="#help-actions">
    <i class="icon fa fa-plus"></i>
    <span class="help-text">Shortcut</span>
  </button>
  <div class="toggle-content">
    <h3 style="padding:20px;"> Developed By : TechKnights
  </div>
</div>

					  <?php 
							$con = mysqli_connect('localhost','root','','masterbase');
							if($con){
								
								$fetch = "SELECT name, dob, branch, gender, frno, hostel, mobileno, address, city, type FROM masterteachettable WHERE email='$email'";
								
								$run = mysqli_query($con, $fetch);
								
								$row = mysqli_fetch_array($run);
								$name = $row['name'];
								$branch = $row['branch'];
								$dob = $row['dob'];
								$gender = $row['gender'];
								$frno = $row['frno'];
								$hostel = $row['hostel'];
								$mob = $row['mobileno'];
								$address = $row['address'];
								$city = $row['city'];
								$post = $row['type'];
					  ?>
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body app-heading">
          <?php 	$pic = @$_SESSION['userpic'];
					echo '<img class="profile-img" src="data:image/jpeg;base64,'.base64_encode(@$pic).'" width="20%"/>'; ?>
          <div class="app-title">
            <div class="title"><span class="highlight"><?php echo @$_SESSION['uname']; ?></span></div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="row">
    <div class="col-lg-12">
      <div class="card card-tab">
        <div class="card-header">
          <ul class="nav nav-tabs">
            <li role="tab1" class="active">
              <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Profile</a>
            </li>
            <li role="tab4">
              <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Setting</a>
            </li>
          </ul>
        </div>
        <div class="card-body no-padding tab-content">
          <div role="tabpanel" class="tab-pane active" id="tab1">
			<div class="row" style="margin:1%;">
				<div class="card-body no-padding table-responsive" id = "showtable">
					<table id = "studentlist" class="table card-table">
					  <thead>
						<tr>
						  <th>Name</th>
						  <th>Branch</th>
						  <th>Date of Birth</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <td class="right"><?php echo $name; ?></td>
						  <td class="right"><?php echo $branch; ?></td>
						  <td class="right"><?php echo $dob; ?></td>
						</tr>
					  </tbody>
					  <thead>	
						<tr>
						  <th>Address</th>
						  <th>City</th>
						  <th>Contact</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <td class="right"><?php echo $address; ?></td>
						  <td class="right"><?php echo $city; ?></td>
						  <td class="right"><?php echo $mob; ?></td>
						</tr>
					  </tbody>
						<?php 
								
							}
						?>
					</table>
				</div>
			</div>	
          </div>
          <div role="tabpanel" class="tab-pane" id="tab4">
						<center><div><h2>Change Your Password...</h2></div></center><br />
				<div class="card card-mini" style="padding:3%;">
						<div class="row">
							<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12  rowcenter">
								<form id = "pwd_form" method="post">
									<div id="pwd_res"></div>
									<input name = "opwd" class="form-control" type="password" placeholder="Old Password" autofocus required>
									<input name = "npwd" class="form-control" type="password" placeholder="New Password" required>
									<input name = "cpwd" class="form-control" type="password" placeholder="Confirm Password" required>
									<center><button class="btn" name="done">Change Password</button></center>
								</form>
							</div>
						</div>
					</div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <footer class="app-footer"> 
  <div class="row">
    <div class="col-xs-12">
      <div class="footer-copyright">
        Copyright © 2017 TechKnights.
      </div>
    </div>
  </div>
</footer>
</div>
</div>
  
<script type="text/javascript" src="assets/js/vendor.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/jquery-3.2.0.min.js"></script>
<script>
	
	$('#pwd_form').submit(function(e){
		e.preventDefault();
	  
		$.ajax({
		url: 'todb.php',
		type: 'POST',
		data: $(this).serialize(),
			dataType: 'html'
		})
		.done(function(data){
			$( "#pwd_form").find( "input").val( "").end( ).find( "input:first").focus();
			$('#pwd_res').html(data).fadeIn(200).delay(2000).fadeOut(200);
		})
		.fail(function(){
			alert('Ajax Submit Failed ...'); 
		});
	});
</script>

</body>
</html>