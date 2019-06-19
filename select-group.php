<?php
	session_start();
	include 'conn.php';
	
	if(isset($_SESSION['email']) && $_SESSION['acctype']==0 || $_SESSION['acctype']==2)
	{
		//$sid = $_SESSION['sid'];
		$email = $_SESSION['email'];
		$sql = "select user_info.mentor_grp, group_detail.description from user_info, group_detail where user_info.email='$email' and user_info.mentor_grp=group_detail.mentor_grp";
		$run = mysqli_query($con, $sql);
	}
	else if(isset($_SESSION['email']) && $_SESSION['acctype']==1){
		header('location: mentorship-admin.php');
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
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="shortcut icon" href="assets/images/logo.png">

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datepicker.css">
	<link href="assets/css/timepicki.css" rel="stylesheet">

	<style>	
		.modal-lg {
			width: 1250px;
			max-width: 1250px;
		}
	</style>
</head>
<body oncontextmenu="return false">
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
            <img class="profile-img" src="assets/images/profile.png">
          </button>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-left myhide">
		<li><img src="assets/images/logo.png" class="img-responsive hidden-xs hidden-sm" alt="SPSU LOGO" width="35%" height="auto"/></li>
        <h2 class="hidden-xs hidden-sm">SPSU MENTORSHIP PROGRAMME<h2>
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


<div class="row">
	<?php
		while($row = mysqli_fetch_array($run)){
			$sql1 = "select distinct enrollment from mastertable where mentor_grp='$row[0]'";
			$run1 = mysqli_query($con, $sql1);
			$num1 = mysqli_num_rows($run1);
	?>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			  <a class="card card-banner card-green-light">
				  <div class="card-body grp" id="<?php echo $row[0]; ?>">
					<i class="icon fa fa-users fa-4x"></i>
					<div class="content">
					  <div class="title"><b><?php echo $row[1]; ?></b></div>
					  <div class="value" id = "demo"><?php echo $num1; ?></div>
					</div>
				  </div>
				</a>
			</div>
	<?php
		}
		if($_SESSION['acctype']==2){
	?>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			  <a class="card card-banner card-green-light">
				  <div class="card-body grp" id="adminID">
					<i class="icon fa fa-users fa-4x"></i>
					<div class="content">
					  <div class="title"><b>Admin</b></div>
					  <div class="value" id="demo" >00</div>
					</div>
				  </div>
				</a>
			</div>
	<?php		
		}
	?>
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
  
<script type="text/javascript" src="assets/js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" src="assets/js/vendor.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>

<!--<script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/js/timepicki.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

</body>
</html>