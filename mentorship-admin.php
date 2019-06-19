<?php
	session_start();
	include 'conn.php';
	
	if(isset($_SESSION['email']) && $_SESSION['acctype']==1)
	{
		//$sid = $_SESSION['sid'];
		$mentor = $_SESSION['email'];
	
		$select = "select distinct enrollment, name from mastertable";
		$run3 = mysqli_query($con, $select);
		$count = mysqli_num_rows($run3);
		
		$show = "SELECT mentor_grp,description FROM group_detail";
		$res = mysqli_query($con, $show);
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
<body onload="startTime()" oncontextmenu="return false">
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
      <li class="active">
        <a href="#">
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
	<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <a class="card card-banner card-green-light">
  <div class="card-body">
    <i class="icon fa fa-thumbs-up fa-4x"></i>
    <div class="content">
      <div class="title">Total Records</div>
      <div class="value" id = "demo"><?php echo $count; ?></div>
    </div>
  </div>
</a>

  </div>
  
	<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
		<a class="card card-banner card-blue-light" href="admin_tweaks.php">
			<div class="card-body">
				<i class="icon fa fa-cogs fa-4x"></i>
				<div class="content">
					<div class="title">Tweaks</div>
					<div class="value" id = "demo">*</div>
				</div>
			</div>
		</a>
	</div>

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

	<div class="row">
		<div class="col-lg-12">
		  <div class="card card-tab">
			<div class="card-header">
			  <ul class="nav nav-tabs">
				<li role="tab2" class="active">
				  <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Search</a>
				</li>
				<li role="tab1">
				  <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Attendance</a>
				</li>
				<li role="tab3">
				  <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Minutes</a>
				</li>
				<li role="tab5">
				  <a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab">Concluding Remarks</a>
				</li>
				<li role="tab4">
				  <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Manage Passwords</a>
				</li>
			  </ul>
			</div>
			<div class="card-body no-padding tab-content">
			  <div role="tabpanel" class="tab-pane" id="tab1">
				<div class="row" style="margin:1%;">
					<div class="card card-mini" style="padding:3%;">
						<div class="table-responsive">
							<div class="container">		
								<div class="border">
									<h2>View Attendance</h2>
								</div>
								<br>
								<div class="row">
									<div class="form-group col-lg-4 col-xs-12">
									  <label class="control-label" for="Adateid">Select Date:</label>
									  <input type="text" class="form-control" id="Adateid" placeholder="Select attendance Date" name="Adate" required>
									</div>
									<div class="form-group col-lg-4 col-xs-12">
										<label class="control-label" for="mentorAtt">Select Mentor:</label>
										<input class="form-control" id="mentorAtt" placeholder="Select Mentor" list="mentors">
										<datalist id="mentors">
										<?php
											$mntr_query = "select distinct name from masterteachettable";
											$mntr_result = mysqli_query($con, $mntr_query);
											while($mntr_row = mysqli_fetch_array($mntr_result))
											{
										?>
												<option value="<?php echo $mntr_row[0]; ?>">
										<?php
											}
										?>
										</datalist>
									</div>
									<div class="form-group col-lg-4 col-xs-12">
									  <label class="control-label" for="groupAtt">Select Group:</label>
									  <select class="form-control" id="groupAtt" style="height:50%;">
										<option value="ALL">ALL</option>
									  </select>
									</div>
								</div>
								<div>
									<table class="table" id="result">
									</table>
								</div>
							</div>
						</div>
					</div>	
				</div>	
			  </div>
			  <div role="tabpanel" class="tab-pane active" id="tab2">
					<center><div><h2>Enter students Name or Enrollment</h2></div></center><br />
					<div class="card card-mini" style="padding:3%;">
						<br>
						<div class="row">
							<div style="width:30%;margin:0 auto;">
								<form id = "enrol_form" method="post">
									<input name="add" list="student" id = "add" class="form-control" type="text" placeholder="Name or Enrollment" autofocus required >
									<datalist id="student">
									<?php
										while($row3 = mysqli_fetch_array($run3)){
									?>
											<option value="<?php echo $row3[0]; ?>">
											<option value="<?php echo $row3[1]; ?>">
									<?php
										}
									?>	
									</datalist>
									<center><div id="errormsg"></div></center>
									<center><button class="btn btn-primary" name="done">Submit</button></center>
								</form>
							</div>
						</div>
						<hr>
						<div class="row" style="margin:1%;">
							<div class="card-body no-padding" id = "showtable">
								
							</div>
						</div>
					</div>
			  </div>
			  <div role="tabpanel" class="tab-pane" id="tab3">
				<div class="card card-mini" style="padding:3%;">
					<h2>Minutes of Meeting</h2>
					<br>
					<div class="row">
						<div class="form-group col-lg-4 col-xs-12">
						  <label class="control-label" for="date">Select Date:</label>
						  <input type="text" class="form-control" id="Mdateid" placeholder="Select attendance Date" name="Mdate" required>
						</div>
						<div class="form-group col-lg-4 col-xs-12">
							<label class="control-label" for="date">Select Mentor:</label>
							<input class="form-control" id="mntrM" placeholder="Select Mentor" list="mentorsM">
							<datalist id="mentorsM">
							<?php
								$mntr_query = "select distinct name from masterteachettable";
								$mntr_result = mysqli_query($con, $mntr_query);
								while($mntr_row = mysqli_fetch_array($mntr_result))
								{
							?>
									<option value="<?php echo $mntr_row[0]; ?>">
							<?php
								}
							?>
							</datalist>
						</div>
						<div class="form-group col-lg-4 col-xs-12">
						  <label class="control-label" for="date">Select Group:</label>
						  <select class="form-control" id="group" style="height:50%;">
							<option value="ALL">ALL</option>
						  </select>
						</div>
					</div>
					<div id="Sminutes">
					 
					</div>
				</div>
			  </div>	
			  <div role="tabpanel" class="tab-pane" id="tab5">
				<div class="card card-mini" style="padding:3%;">
					<h2>Concluding Remark</h2>
					<br>
					<div class="row">
						<div class="form-group col-lg-4 col-xs-12">
							<label class="control-label" for="mntrCR">Select Mentor:</label>
							<input class="form-control" id="mntrCR" placeholder="Select Mentor" list="mentorsCR">
							<datalist id="mentorsCR">
							<?php
								$mntr_query = "select distinct name from masterteachettable";
								$mntr_result = mysqli_query($con, $mntr_query);
								while($mntr_row = mysqli_fetch_array($mntr_result))
								{
							?>
									<option value="<?php echo $mntr_row[0]; ?>">
							<?php
								}
							?>
							</datalist>
						</div>
						<div class="form-group col-lg-4 col-xs-12">
						  <label class="control-label" for="groupCR">Select Group:</label>
						  <select class="form-control" id="groupCR" style="height:50%;">
							<option value="ALL">ALL</option>
						  </select>
						</div>
						<div class="form-group col-lg-4 col-xs-12">
						  <label class="control-label" for="semCR">Select Semester:</label>
						  <select class="form-control" id="semCR" style="height:50%;">
							<option value="latest">Latest</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
						  </select>
						</div>
					</div>
					<div>
						<table class="table table-bordered" id="CRresult">
						</table>
					</div>
				</div>
			  </div>
			  <div role="tabpanel" class="tab-pane" id="tab4">
					<center><div><h2>Change Password...</h2></div></center><br />
					<center><div id="err_msg"></div></center>
					<div class="card card-mini" style="padding:3%;">
						<br>
						<div class="row">
							<div style="width:30%;margin:0 auto;">
								<form id = "pass_form" method="post">
									<input name = "user" id="user" class="form-control" type="text" placeholder="Email" autofocus required>
									<input name = "pass" id="pass" class="form-control" type="text" placeholder="Password" required>
									<center><button class="btn btn-primary" name="done">Change</button></center>
								</form>
							</div>
						</div>
					</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
  </div>
</div>
<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Student Details</h3>
		  
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">ENTER FEEDBACK OF STUDENT</h3>
		  
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="modal fade" id="notiModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Message</h3>
		  
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

<script type="text/javascript" src="assets/js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" src="assets/js/vendor.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/js/timepicki.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

<script>
	$(document).ready(function(){
		$("#mntrM").prop("disabled", true);
		$("#group").prop("disabled", true);
		$("#mentorAtt").prop("disabled", true);
		$("#groupAtt").prop("disabled", true);
		$("#groupCR").prop("disabled", true);
		$("#semCR").prop("disabled", true);
		
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();
		
		if(dd<10) {
			dd='0'+dd;
		}
		if(mm<10) {
			mm='0'+mm;
		}
		today = yyyy+'-'+mm+'-'+dd;
		
		var lastDate = new Date();
		var dd = lastDate.getDate()-2;
		var mm = lastDate.getMonth()+1; //January is 0!
		var yyyy = lastDate.getFullYear();
		
		if(dd<10) {
			dd='0'+dd;
		}
		if(mm<10) {
			mm='0'+mm;
		}
		lastDate = yyyy+'-'+mm+'-'+dd;
		
		var open = 0, open1 = 0, open2 = 0, open3 = 0, open4 = 0, dateM, mentorM, groupM, semCR, desc;
		
		$('#Mdateid').datepicker({
			format: "yyyy-mm-dd",
			todayHighlight: true,
			autoclose: true,
			endDate: today,
			//startDate: lastDate
		});	
		
		$('#Adateid').datepicker({
			format: "yyyy-mm-dd",
			todayHighlight: true,
			autoclose: true,
			endDate: today,
			//startDate: lastDate
		});	
		
		$('#Mdateid, #group').change(function(){
			if(open == 0){
				$("#mntrM").prop("disabled", false);
				open = 1;
			}
			fetchMinutes();
		});
		
		$('#mntrM').change(function(){
			if(open1 == 0){
				$("#group").prop("disabled", false);
				open1 = 1;
			}
			
			mentorM = $("#mntrM").val();
			
			$.ajax({
				url: 'todb.php',
				data: "mentorPop="+mentorM,
				type: 'POST',
				success: function(data){
					data = $.parseJSON(data);
					$('#group').find('option').remove().end();
					$('#group').append("<option>ALL</option>");
					for (var i = 0; i < data.length; i++){
						if(data[i] != null)
							$('#group').append("<option>"+data[i]+"</option>");
					}
					fetchMinutes();
				}
			});
		});

		function fetchMinutes(){
			dateM = $("#Mdateid").val();
			mentorM = $("#mntrM").val();
			groupM = $("#group").val();
			
			if(dateM != "" && mentorM != "" && groupM != ""){
				$.ajax({
					url: 'todb.php',
					data: "minDate="+dateM+"&minMentor="+mentorM+"&minGroup="+groupM,
					type: 'POST',
					success: function(data){
						$("#Sminutes").html(data);
					}
				});
			}
		}
		
		$('#Adateid, #groupAtt').change(function(){
			if(open2 == 0){
				$("#mentorAtt").prop("disabled", false);
				open2 = 1;
			}
			fetchAttendance();
		});
		
		$('#mentorAtt').change(function(){
			if(open3 == 0){
				$("#groupAtt").prop("disabled", false);
				open3 = 1;
			}
			
			mentorM = $("#mentorAtt").val();
			
			$.ajax({
				url: 'todb.php',
				data: "mentorPop="+mentorM,
				type: 'POST',
				success: function(data){
					data = $.parseJSON(data);
					$('#groupAtt').find('option').remove().end();
					$('#groupAtt').append("<option>ALL</option>");
					for (var i = 0; i < data.length; i++){
						if(data[i] != null)
							$('#groupAtt').append("<option>"+data[i]+"</option>");
					}
					fetchAttendance();
				}
			});
		});

		function fetchAttendance(){
			dateM = $("#Adateid").val();
			mentorM = $("#mentorAtt").val();
			groupM = $("#groupAtt").val();
			
			if(dateM != "" && mentorM != "" && groupM != ""){
				$.ajax({
					url: 'todb.php',
					data: "attDate="+dateM+"&attMentor="+mentorM+"&attGroup="+groupM,
					type: 'POST',
					success: function(data){
						$("#result").html(data);
					}
				});
			}
		}
		
		$('#mntrCR').change(function(){
			if(open4 == 0){
				$("#groupCR").prop("disabled", false);
				$("#semCR").prop("disabled", false);
				open4 = 1;
			}
			
			mentorM = $("#mntrCR").val();
			
			$.ajax({
				url: 'todb.php',
				data: "mentorPop="+mentorM,
				type: 'POST',
				success: function(data){
					data = $.parseJSON(data);
					$('#groupCR').find('option').remove().end();
					$('#groupCR').append("<option>ALL</option>");
					for (var i = 0; i < data.length; i++){
						if(data[i] != null)
							$('#groupCR').append("<option>"+data[i]+"</option>");
					}
					fetchCR();
				}
			});
		});
		
		$('#groupCR, #semCR').change(function(){

			fetchCR();
		});
		
		function fetchCR(){
			mentorM = $("#mntrCR").val();
			groupM = $("#groupCR").val();
			semCR = $("#semCR").val();
			
			if(semCR != "" && mentorM != "" && groupM != ""){
				$.ajax({
					url: 'todb.php',
					data: "crSem="+semCR+"&crMentor="+mentorM+"&crGroup="+groupM,
					type: 'POST',
					success: function(data){
						$("#CRresult").html(data);
					}
				});
			}
		}
		
		$('.addfeed').click(function(){
			
			var id = $(this).attr('id');
			$("#addModal .modal-body").load("feedback.php");
			$("#addModal").modal();
		});
		
		$('.stuinfo').click(function(){
			var id = $(this).attr('id');
			
			$.ajax({
				url: 'todb.php',
				data: "add="+id,
				type: 'POST',
				success: function(data){
					
					if(data == false){
						$('#error').show(200).html("No such Enrollment Found...").delay(1000).hide(200);
						$("#notiModal .modal-body").html("No such Enrollment Found...");
						$("#notiModal").modal();
					}else{
						$("#myModal .modal-body").html(data)
						$("#myModal").modal();
					}
				}
			});	
		});
		
		$("#close").click(function(){
			$("#hidden").hide();
		});
		$("#attendance_form").on('submit',function(e){
			e.preventDefault();
			
			$.ajax({
				url: 'todb.php',
				data: $(this).serialize()+"&date="+today,
				type: 'POST',
				success: function(data){
					$("#Result").html("<center><div class=\"alert alert-success\"><strong>Success!</strong> Attendance Marked Successfully.</div></center>").fadeIn(100).delay(3000).fadeOut(100);
				}
			});
			
		});
		$("#pass_form").on('submit',function(e){
			e.preventDefault();
			
			$.ajax({
				url: 'todb.php',
				data: $(this).serialize(),
				type: 'POST',
				success: function(data){
					if(data==true){
						$("#err_msg").html("<center><div class=\"alert alert-success\"><strong>Success!</strong> Password changed successfully.</div></center>").fadeIn(100).delay(3000).fadeOut(100);
						$("#pass_form")[0].reset();
					}
					else
						$("#err_msg").html("<center><div class=\"alert alert-warning\"><strong>Warning!</strong> Failed.</div></center>").fadeIn(100).delay(3000).fadeOut(100);
				}
			});
		});
	});
</script>
</body>
</html>