<?php
	session_start();
	include 'conn.php';
	
	if(isset($_SESSION['email']) && $_SESSION['acctype']==0)
	{
		//$sid = $_SESSION['sid'];
		$group = $_SESSION['group'];
		$mentor = $_SESSION['email'];
	
		$select = "select distinct enrollment from mastertable where mentor_grp='$group'";
		$run3 = mysqli_query($con, $select);
		$count = mysqli_num_rows($run3);
		
		$sql = "select masterteachettable.name from user_info,masterteachettable where user_info.mentor_grp = '$group' and user_info.email=masterteachettable.email";
		$run = mysqli_query($con, $sql);
		
		$fetch = "select name,enrollment,email,student_mob,father_mob from mastertable where mentor_grp='$group'";
		$do = mysqli_query($con, $fetch);
		
		$rem_query = "select max(semester) from concluding_remark where mentor_grp=$group";
		$rem_run = mysqli_query($con, $rem_query);
		$rem_row = mysqli_fetch_array($rem_run);
		
		$rem_query1 = "select enrollment, remark, comment from concluding_remark where mentor_grp=$group and semester='$rem_row[0]'";
		$rem_run1 = mysqli_query($con, $rem_query1);
		
		$sqlbit = "select * from bittable";
		$runbit = mysqli_query($con, $sqlbit);
		$twodayattbit = mysqli_fetch_array($runbit);
		$twodayminbit = mysqli_fetch_array($runbit);
		$frattbit = mysqli_fetch_array($runbit);
		$frminbit = mysqli_fetch_array($runbit);
		$frconbit = mysqli_fetch_array($runbit);
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
		.border-td{
			border: 2px solid lightblue;
			border-radius: 5px;
			padding:3px 0 3px 8px;
		}
		.btn-green{
			background:#5CB85C;
			color:white;
		}
		.sheight{
			color:white;
		}
		.sheight:hover {
			color:white;
		}
		select{
			height:40px !important;
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
	  <li class="">
        <a href="show.php">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">View</div>
        </a>
      </li>
	  <?php
		if($_SESSION['grp'] > 1){
	  ?>
		  <li class="">
			<a href="select-group.php">
			  <div class="icon">
				<i class="fa fa-tasks" aria-hidden="true"></i>
			  </div>
			  <div class="title">Change Group</div>
			</a>
		  </li>
	  <?php	  
		}
	  ?>
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
  
  

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

	<div class="row">
		<div class="col-lg-12">
		  <div class="card card-tab">
			<div class="card-header">
			  <ul class="nav nav-tabs">
				<li role="tab1" class="<?php if($frattbit[2] == 0) echo "hidden";?>">
				  <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Group and Attendance</a>
				</li>
				<li role="tab2">
				  <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Student Details</a>
				</li>
				<li role="tab3" class="<?php if($frminbit[2] == 0) echo "hidden";?>">
				  <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Minutes</a>
				</li>
				<li role="tab4" class="<?php if($frconbit[2] == 0) echo "hidden";?>">
				  <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Concluding Remarks</a>
				</li>
			  </ul>
			</div>
			<div class="card-body no-padding tab-content">
			<div><center><h3  id="error" style="color:red;display:none;"></h3></center></div>
			  <div role="tabpanel" class="tab-pane active" id="tab1">
				<div class="row" style="margin:1%;">
					<div class="card card-mini" style="padding:3%;">
					<div class="card-body no-padding table-responsive">
						<div class="border">
							<h2>Mentors</h2>
						</div>
						<div class="container">		
							<div class="" style="margin:10px auto;">
								<?php 
									$i = 1;
									while($row = mysqli_fetch_array($run)){
							
										echo "<p style=\"font-size:18px;\">".$i++.") ".$row[0]."</p>";
								} ?>
							</div>
							<!--<div id="txt" style="font-size:18px;"></div>
							<div id="dateDiv" style="font-size:18px;"></div>-->
						</div>
						<div class="border">
							<h2>Students Attendance</h2>
						</div>
						<div class="container">		
							
							   
								<form id="attendance_form">
									<div class="form-group row">
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<label class="control-label" for="date">Select Date<span style="color:red;font-size:17px;">*</span>:</label>
											<input type="text" class="form-control" id="Adateid" placeholder="Select attendance Date" name="Adate" required>
											<input type="hidden" value="Hello"  name="mattdummy">
										</div>
									</div>
									 <br>
									 <div class="tableDisplay">
								  <table class="table" >
									<thead>
									  <tr>
										<th>#</th>
										<th>Name</th>
										<th>Enrollment</th>
										<th>Mobile</th>
										
										<th>Attendance</th>
									  </tr>
									</thead>
									<tbody>
									<?php
										$i=0;
										while($col = mysqli_fetch_array($do)){
											$i++;
									?>
									  <tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $col[0]; ?></td>
										<td><?php echo $col[1]; ?></td>
										<td><?php echo $col[3]; ?></td>
										
										<td>
											<div class="material-switch">
												<input class="check" id="someSwitchOptionSuccess<?php echo $i; ?>" name="present[]" type="checkbox" value="<?php echo $col[1]; ?>"/>
												<label for="someSwitchOptionSuccess<?php echo $i; ?>" class="label-success"></label>
											</div>
										</td>
									  </tr>
									<?php
										}
									?>
									</tbody>
								  </table>
								  </div>
								  <div id="Result"></div>
								  <center><button class="btn btn-primary" name="submit">Submit</button></center>
								</form>  
							 
							
						</div>
					</div>
				</div>	
				</div>	
			  </div>
			  <div role="tabpanel" class="tab-pane" id="tab2">
					<center><div><h2>Students Details</h2></div></center><br />
					<div class="card card-mini" style="padding:3%;">
						<table class="table" >
							<thead>
							  <tr>
								<th>#</th>
								<th>Name</th>
								<th>View Bio data</th>
								<th>View Feedback</th>
								<th>Add Feedback</th>
							  </tr>
							</thead>
							<tbody>
							<?php
								mysqli_data_seek($do, 0);
								$i=1;
								while($col = mysqli_fetch_array($do)){
									
							?>
							  <tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $col[0]; ?></td>
								<td><a href="javascript:void(0)" class="stuinfo" id="<?php echo $col[1]; ?>" style="text-decoration:none;">View</a></td>
								<td><a href="javascript:void(0)" class="stufeedback" id="<?php echo $col[1]; ?>" style="text-decoration:none;">View</a></td>
								<td><a href="javascript:void(0)" class="addfeed" id="<?php echo $col[1]; ?>" style="text-decoration:none;">ADD</a></td>
							  </tr>
							<?php
								}
							?>
							</tbody>
						  </table>
					</div>
			  </div>
			  <div role="tabpanel" class="tab-pane" id="tab3">
				<div class="card card-mini" style="padding:3%;">
				<div class="minutesDiv">
					<center><h2>Minutes of Meeting</h2></center>
					<form id="minutes_form">
						<div class="form-group">
						  <label class="control-label" for="date">Select Date<span style="color:red;font-size:17px;">*</span>:</label>
						  <input type="text" class="form-control" id="date" placeholder="Select Meeting Date" name="Mdate" required>
						</div>
						<div class="form-group">
						  <label>New Agenda:</label>
						  <textarea class="form-control" id="val1" name = "newareas" placeholder="New Agenda" ></textarea>
						</div>
						<div class="form-group">
						  <label>Follow-up of previous agenda:</label>
						  <textarea class="form-control" id="val2" name="followup" placeholder="Follow-up of previous agenda" ></textarea>
						</div>
						<div class="form-group">
						  <label>Special agenda:</label>
						  <textarea class="form-control" id="val3" name="special" placeholder="Special Agenda" ></textarea>
						</div>
						<div id="msg"></div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
				</div>
				<span style="color:red;font-size:12px;"><b style="font-size:16px;">*</b>Minutes need to be submitted within 24 hours of the meeting<br><b style="font-size:16px;">*</b>Minutes of the meeting held before 22nd August have to be submitted within 9 days</span>
			  </div>	
				<div role="tabpanel" class="tab-pane" id="tab4">
					<div class="card card-mini" style="padding:3%;">
						<div class="container">	
							<form id="remark_form">
								<div class="form-group row">
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<label class="control-label" for="remarksem">Select Semester<span style="color:red;font-size:17px;">*</span>:</label>
										<select class="form-control" id="remarksem" name="remarksem">
											<option <?php if($rem_row[0] == 0) echo "selected"; ?> value="0">Select Semester</option>
											<option <?php if($rem_row[0] == 1) echo "selected"; ?> value="1">1</option>
											<option <?php if($rem_row[0] == 2) echo "selected"; ?> value="2">2</option>
											<option <?php if($rem_row[0] == 3) echo "selected"; ?> value="3">3</option>
											<option <?php if($rem_row[0] == 4) echo "selected"; ?> value="4">4</option>
											<option <?php if($rem_row[0] == 5) echo "selected"; ?> value="5">5</option>
											<option <?php if($rem_row[0] == 6) echo "selected"; ?> value="6">6</option>
											<option <?php if($rem_row[0] == 7) echo "selected"; ?> value="7">7</option>
											<option <?php if($rem_row[0] == 8) echo "selected"; ?> value="8">8</option>
										</select>
									</div>
								</div>
								<br>
								<div class="tableDisplay">
								  <table class="table" >
									<thead>
									  <tr>
										<th>#</th>
										<th>Name</th>
										<th>Enrollment</th>
										<th>Remarks</th>
										<th>Comment</th>
									  </tr>
									</thead>
									<tbody>
									<?php
										mysqli_data_seek($do, 0);
										$i=0;
										while($col = mysqli_fetch_array($do)){
											$i++;
											$rem_row1 = mysqli_fetch_array($rem_run1);
									?>
									  <tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $col[0]; ?></td>
										<td><?php echo $col[1]; ?></td>
										<td>
											<div class="form-group">
												<select 
													<?php 
														if($rem_row1[1] == 1) echo 'style="background-color: #FFD600 !important;" ';
														else if($rem_row1[1] == 2) echo 'style="background-color: #06A306 !important;" ';
														else if($rem_row1[1] == 3) echo 'style="background-color: #095077 !important;" ';
														else if($rem_row1[1] == 4) echo 'style="background-color: #E53935 !important;" ';
														else echo 'style="background-color: #BDBDBD !important;" ';
													?> class="form-control sheight" name="remark[]">
													<option style="background:#BDBDBD;" value="<?php echo $col[1]."&0";?>" <?php if($rem_row1[1] == 0) echo "selected"; ?>>Select</option>
													<option style="background-color: #FFD600" value="<?php echo $col[1]."&1";?>" <?php if($rem_row1[1] == 1) echo 'selected'; ?>>Good</option>
													<option style="background-color: #06a306" value="<?php echo $col[1]."&2";?>" <?php if($rem_row1[1] == 2) echo 'selected'; ?>>Average</option>
													<option style="background-color: #095077" value="<?php echo $col[1]."&3";?>" <?php if($rem_row1[1] == 3) echo 'selected'; ?>>Satisfactory</option>
													<option style="background-color: #E53935" value="<?php echo $col[1]."&4";?>" <?php if($rem_row1[1] == 4) echo 'selected'; ?>>Not So Good</option>
												</select>
											</div>
										</td>
										<td>
											<input type="text" name="remarkcmnt[]" class="form-control" placeholder="Comment" value = "<?php echo $rem_row1[2]; ?>" required />
										</td>
									  </tr>
									<?php
										}
									?>
									</tbody>
								  </table>
							  </div>
							  <div id="remResult"></div>
							  <center><button class="btn btn-primary" name="submit">Submit</button></center>
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
<div class="container">
  <div class="modal fade" id="myModal" role="dialog" tabindex="-1" aria-labelledby="Information" aria-hidden="true" data-keyboard="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Student Details</h3>
		  
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
			<button type="button" class="btn btn-default" id="edit">Edit</button>
			<button type="button" class="btn btn-default hidden" id="save">Save</button>
			<button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="modal fade" id="myModalFeedback" role="dialog" tabindex="-1" aria-labelledby="Information" aria-hidden="true" data-keyboard="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Student Feedback</h3>
		  
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
			<button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>


  <div class="modal fade" id="addModal" role="dialog" data-toggle="modal" >
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

  <div class="modal fade" id="notiModal" role="dialog" data-toggle="modal"  tabindex="-1" aria-labelledby="Information" data-backdrop="static" aria-hidden="true" data-keyboard="false">
    <div class="modal-dialog modal-md">
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
<script type="text/javascript" src="assets/js/bootstrap.min.js" ></script>

<script>
	$(document).ready(function(){
		var tabid = $('.nav-tabs').find('li:visible:first').children().first().attr('href');
		$('.nav-tabs a[href="'+tabid+'"]').tab('show');
		  
		$('.sheight').change(function() {
			var selectedItem = $(this).find("option:selected");
			$(this).css('backgroundColor', selectedItem.css('backgroundColor'));
		});
		
		function color(){
			var selectedItem = $(this).find("option:selected");
			$(this).css('backgroundColor', selectedItem.css('backgroundColor'));
		}
		
		$("#edit").click(function(){
			$("td p").addClass("border-td").attr("contenteditable","true");
			$(this).hide();
			$("#save").removeClass('hidden');
		});
		$("#save").click(function(){
			var val = new Array();
			var i;
			for(i=0;i<42;i++){
				val[i] = $("p#val"+(i+1)).text();
			}
			$.ajax({
				url : "todb.php",
				data : {editvals:val},
				type : 'POST',
				success : function(data){
					$('#editresult').html(data);
				}
			});
			$("td p").removeClass("border-td").attr("contenteditable","false");
			$(this).addClass('hidden');
			$("#edit").show();
		});		
		$('#myModal').on('hidden.bs.modal', function () {
			$("td p").removeClass("border-td").attr("contenteditable","false");
			$("#edit").show();
			$("#save").addClass('hidden');
		});
		
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
		
		var date1, date2;
		
		
		var twodaymin = '<?php echo $twodayminbit[2]; ?>';
		if(twodaymin == 1){
			$('#date').datepicker({
				format: "yyyy-mm-dd",
				todayHighlight: true,
				autoclose: true,
				endDate: today,
				startDate: lastDate
			});	
		}else{
			$('#date').datepicker({
				format: "yyyy-mm-dd",
				todayHighlight: true,
				autoclose: true,
				endDate: today,
				//startDate: lastDate
			});	
		}
		
		$('#date').on('changeDate', function(ev){
			$(this).datepicker('hide');
			date1 = Date.parse($(this).val());
		});
		
		var twodayatt = '<?php echo $twodayattbit[2]; ?>';
		if(twodayatt == 1){
			$('#Adateid').datepicker({
				format: "yyyy-mm-dd",
				todayHighlight: true,
				autoclose: true,
				endDate: today,
				startDate: lastDate
			});	
		}else{
			$('#Adateid').datepicker({
				format: "yyyy-mm-dd",
				todayHighlight: true,
				autoclose: true,
				endDate: today,
				//startDate: lastDate
			});	
		}
		
		$('#Adateid').on('changeDate', function(ev){
			$(this).datepicker('hide');
			date2 = Date.parse($(this).val());
			
			var d = $(this).val();
			$.ajax({
				url: 'todb.php',
				data: "upAttDate="+d,
				type: 'POST',
				success: function(data){
					$('.tableDisplay').html(data);
				}
			});	
		});
		
		$('.addfeed').click(function(){
			
			var id = $(this).attr('id');
			$("#addModal .modal-body").load("feedback.php?enrollment="+id);
			$("#addModal").modal({keyboard: true});
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
		
		$('.stufeedback').click(function(){
			var id = $(this).attr('id');
			
			$.ajax({
				url: 'todb.php',
				data: "feedbackid="+id,
				type: 'POST',
				success: function(data){
					
					if(data == false){
						$('#error').show(200).html("No such Enrollment Found...").delay(1000).hide(200);
						$("#notiModal .modal-body").html("No such Enrollment Found...");
						$("#notiModal").modal();
					}else{
						$("#myModalFeedback .modal-body").html(data)
						$("#myModalFeedback").modal();
					}
				}
			});	
		});
		
		$('#dateDiv').html("Date : "+today);
		
		$("#close").click(function(){
			$("#hidden").hide();
		});
		$("#attendance_form").on('submit',function(e){
			e.preventDefault();
			//var checked = $("input[type=checkbox]:checked").length;

			$.ajax({
				url: 'todb.php',
				data: $(this).serialize(),
				type: 'POST',
				success: function(data){
					$("#Result").html(data).fadeIn(100).delay(3000).fadeOut(100);
				}
			});
		});
		$("#remark_form").on('submit',function(e){
			e.preventDefault();
			var sem = $('#remarksem').val();
			if(sem != 0){
				$.ajax({
					url: 'todb.php',
					data: $(this).serialize(),
					type: 'POST',
					success: function(data){
						$("#remResult").html(data).fadeIn(100).delay(3000).fadeOut(100);
					}
				});
			}else{
				$("#remResult").html("<center><div class=\"alert alert-danger\"><strong>Warning!</strong> Select Semester.</div></center>").fadeIn(100).delay(3000).fadeOut(100);
			}
		});
	});
</script>
</body>
</html>