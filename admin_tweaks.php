<?php
	session_start();
	include 'conn.php';
	
	if(isset($_SESSION['email']) && $_SESSION['acctype']==1)
	{
		//$sid = $_SESSION['sid'];
		$mentor = $_SESSION['email'];
	
		$sqlbit = "select * from bittable";
		$runbit = mysqli_query($con, $sqlbit);
		$rowbit = mysqli_fetch_array($runbit);
		
		if(isset($_GET['err'])){
				
			$err = $_GET['err'];
			if($err == 1){
				$msg = "Calendar Successfully Uploaded !!!";
			}else if($err == 2){
				$msg = "Sorry, there was an error uploading your file.";
			}else if($err == 3){
				$msg = "Sorry, only PDF, DOC & DOCX files are allowed.";
			}else if($err == 4){
				$msg = "Sorry, your file is too large.";
			}
		}
	}
	else if(isset($_SESSION['email']) && $_SESSION['acctype']==0){
		header('location: home.php');
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
		.card.card-banner .card-body .content {
			z-index: 1;
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
        <a href="home.php">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">Dashboard</div>
        </a>
      </li>
      <li class="@@menu.messaging">
        <a href="manage-group.php">
          <div class="icon">
            <i class="fa fa-group" aria-hidden="true"></i>
          </div>
          <div class="title">Manage Groups</div>
        </a>
      </li>
	  <li class="@@menu.messaging">
        <a href="#">
          <div class="icon">
            <i class="fa fa-book" aria-hidden="true"></i>
          </div>
          <div class="title">Time-Table</div>
        </a>
      </li>
	  <li class="@@menu.messaging">
		<a href="index.php">
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
                <a href="profile.php">
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
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card-body no-padding">
			<div class="card card-mini" style="padding:3%;">
				<center><h3>Tweaks</h3></center>
					<div class="table-responsive">          
					  <table class="table table-bordered">
						<thead>
						  <tr>
							<th>Action</th>
							<th>Toggle</th>
							<th></th>
						  </tr>
						</thead>
						<tbody>
						  <tr>
							<td>2 days attendance lock</td>
							<td>
								<button class="btn btn-success tweakbtn" id="<?php echo $rowbit['id'].'Hen'; ?>" style="<?php if($rowbit['bit'] == 1) echo "visibility: hidden" ?>" >Enable</button>
								<button class="btn btn-danger tweakbtn" id="<?php echo $rowbit['id'].'Hdis'; ?>" style="<?php if($rowbit['bit'] == 0) echo "visibility: hidden" ?>" >Disable</button>
							</td>
							<td></td>
						  </tr>
						  <tr>
							<td>2 days minutes lock</td>
							<td>
								<?php $rowbit = mysqli_fetch_array($runbit);?>
								<button class="btn btn-success tweakbtn" id="<?php echo $rowbit['id'].'Hen'; ?>" style="<?php if($rowbit['bit'] == 1) echo "visibility: hidden" ?>" >Enable</button>
								<button class="btn btn-danger tweakbtn" id="<?php echo $rowbit['id'].'Hdis'; ?>" style="<?php if($rowbit['bit'] == 0) echo "visibility: hidden" ?>" >Disable</button>
							</td>
							<td></td>
						  </tr>
						  <tr>
							<td>Freeze Attendance</td>
							<td>
								<?php $rowbit = mysqli_fetch_array($runbit);?>
								<button class="btn btn-success tweakbtn" id="<?php echo $rowbit['id'].'Hen'; ?>" style="<?php if($rowbit['bit'] == 1) echo "visibility: hidden" ?>" >Enable</button>
								<button class="btn btn-danger tweakbtn" id="<?php echo $rowbit['id'].'Hdis'; ?>" style="<?php if($rowbit['bit'] == 0) echo "visibility: hidden" ?>" >Disable</button>
							</td>
							<td></td>
						  </tr>
						  <tr>
							<td>Freeze Minutes</td>
							<td>
								<?php $rowbit = mysqli_fetch_array($runbit);?>
								<button class="btn btn-success tweakbtn" id="<?php echo $rowbit['id'].'Hen'; ?>" style="<?php if($rowbit['bit'] == 1) echo "visibility: hidden" ?>" >Enable</button>
								<button class="btn btn-danger tweakbtn" id="<?php echo $rowbit['id'].'Hdis'; ?>" style="<?php if($rowbit['bit'] == 0) echo "visibility: hidden" ?>" >Disable</button>
							</td>
							<td></td>
						  </tr>
						  <tr>
						  <tr>
							<td>Freeze Concluding Remarks</td>
							<td>
								<?php $rowbit = mysqli_fetch_array($runbit);?>
								<button class="btn btn-success tweakbtn" id="<?php echo $rowbit['id'].'Hen'; ?>" style="<?php if($rowbit['bit'] == 1) echo "visibility: hidden" ?>" >Enable</button>
								<button class="btn btn-danger tweakbtn" id="<?php echo $rowbit['id'].'Hdis'; ?>" style="<?php if($rowbit['bit'] == 0) echo "visibility: hidden" ?>" >Disable</button>
							</td>
							<td></td>
						  </tr>
						  <tr>
							<form action="todb.php" method="post" enctype="multipart/form-data">
								<td>Upload Time-Table</td>
								<td>
									<input type="file" style="float:left;" name="timetableUpload" id="timetableUploadid" required>
								</td>
								<td>
									<button class="btn btn-primary">Upload</button>
								</td>
							</form>
						  </tr>
						</tbody>
					  </table>
					</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="grpModal" role="dialog" data-toggle="modal"  tabindex="-1" aria-labelledby="Information" data-backdrop="static" aria-hidden="true" data-keyboard="false">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Students in Group</h3>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

<script type="text/javascript" src="assets/js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" src="assets/js/vendor.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/js/timepicki.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

<div class="container">
  <!-- Modal -->
	  <div class="modal fade" id="errModal" role="dialog">
		<div class="modal-dialog modal-sm">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h2 style="color:black;" class="modal-title">Message</h2>
			</div>
			<div class="modal-body">
				<center><h4 style="color:black;"><?php if(isset($_GET['err'])) echo $msg; ?></h4></center>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default dialogclose" id="refresh" data-dismiss="modal">Close</button>
			</div>
		  </div>
		</div>
	  </div>
	</div>
<?php if(isset($_GET['err'])) echo "<script>$('#errModal').modal('show');</script>"; ?>

<script>
	$(document).ready(function(){
		$(".dialogclose").on("click", function () {
			window.location = "admin_tweaks.php";
		});
		$(".tweakbtn").on("click", function () {
			var raw = $(this).attr('id');
			var data = raw.split("H");
			var id = data[0];
			var action = data[1];
			
			$.ajax({
				url: 'todb.php',
				data: "tweakid="+id+"&tweakaction="+action,
				type: 'POST',
				success: function(data){
					if(data == true){
						if(action == "en")
							$('#'+id+'Hdis').css('visibility','');
						else
							$('#'+id+'Hen').css('visibility','');
						$('#'+raw).css('visibility','hidden');
					}else{
						alert("Something went wrong");
					}
				}
			});
		});
	});
</script>
</body>
</html>