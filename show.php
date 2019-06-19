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
		//pre {
   			 white-space: pre-wrap;       /* Since CSS 2.1 */	
    			 white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
    			 white-space: -pre-wrap;      /* Opera 4-6 */
    			 white-space: -o-pre-wrap;    /* Opera 7 */
    			 word-wrap: break-word;       /* Internet Explorer 5.5+ */
}
		.btn-green{
			background:green;
		}
		.btn{
			color:white;
		}
		.btnsize{
			width : 150px !important;
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
      <li class="">
        <a href="home.php">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">Dashboard</div>
        </a>
      </li>
	  <li class="active">
        <a href="#">
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
				<li role="tab1" class="active">
				  <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Attendance</a>
				</li>
				<li role="tab3">
				  <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Minutes</a>
				</li>
				<li role="tab4">
				  <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Concluding Remark</a>
				</li>
			  </ul>
			</div>
			<div class="card-body no-padding tab-content">
			  <div role="tabpanel" class="tab-pane active" id="tab1">
				<div class="row" style="margin:1%;">
					<div class="card card-mini" style="padding:3%;">
					<div class="card-body no-padding table-responsive">
						<div class="card-header">
						  <ul class="nav nav-tabs">
							<li role="tab1" class="active">
							  <a href="#dateatt" aria-controls="tab1" role="tab" data-toggle="tab">Date Wise</a>
							</li>
							<li role="tab3">
							  <a href="#compatt" aria-controls="tab3" role="tab" data-toggle="tab">Complete</a>
							</li>
						  </ul>
						</div>
						<div class="card-body no-padding tab-content">
							  <div role="tabpanel" class="tab-pane active" id="dateatt">
									<div class="container">		
										<div class="border">
											<h2>View Attendance</h2>
										</div>
										<br>
										<div class="form-group row">
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
												<label class="control-label" for="date">Select Date<span style="color:red;font-size:17px;">*</span>:</label>
												<input type="text" class="form-control" id="Adateid" placeholder="Select attendance Date" required>
											</div>
										</div>
										<div id="result"></div>
									</div>
							  </div>
							  <div role="tabpanel" class="tab-pane" id="compatt">
							    <div class="container">
								  <table class="table" >
									<thead>
									  <tr>
										<th>#</th>
										<th>Name</th>
										<th>Enrollment</th>										
										<th>Attendance</th>
										<th>Percentage(%)</th>
									  </tr>
									</thead>
									<tbody>
									<?php
										$i=0;
										$at_qt = mysqli_query($con, "SELECT distinct date FROM `mentorship_attendance` WHERE mentor_grp='$group'");
										$total = mysqli_num_rows($at_qt);
										$st_at = mysqli_query($con, "select name, enrollment from mastertable where mentor_grp='$group'");
										while($col = mysqli_fetch_array($st_at)){
											$i++;
											$st_qt = mysqli_query($con, "select enrollment from mentorship_attendance where enrollment='$col[1]' and attendance=1");
											$at_ct = mysqli_num_rows($st_qt);
											$per = $at_ct / $total * 100;
									?>
									  <tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $col[0]; ?></td>
										<td><?php echo $col[1]; ?></td>
										<td><center><?php echo $at_ct; ?></center></td>
										<td><center><?php echo round($per,2)." %"; ?></center></td>
									  </tr>
									<?php
										}
									?>
									</tbody>
								  </table>
							    </div>
							  </div>
						</div>
					</div>
				</div>	
				</div>	
			  </div>
			  <div role="tabpanel" class="tab-pane" id="tab3">
				<div class="row" style="margin:1%;">
					<div class="card card-mini" style="padding:3%;">
					<div class="card-body no-padding table-responsive">
						<div class="container">		
							<div class="border">
						<h2>View Minutes</h2>
					</div>
					<br>
					<div class="form-group row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<label class="control-label" for="date">Select Date<span style="color:red;font-size:17px;">*</span>:</label>
							<input type="text" class="form-control" id="Mdateid" placeholder="Select attendance Date" required>
						</div>
					</div>
					<div><div id="mresult"></div></div>
						</div>
					</div>
				</div>	
				</div>
			  </div>	
				<div role="tabpanel" class="tab-pane" id="tab4">
					<div class="card card-mini" style="padding:3%;">
						<div class="table-responsive">
						<table class="table">
						<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Enrollment</th>
							<th>Remark</th>
							<th>Comment</th>
						</tr>
					</thead>
					  <tbody>
	<?php
					
					$j=1;
					while($rem_row1 = mysqli_fetch_array($rem_run1)){
						$rem_name = "select name from mastertable where enrollment = '$rem_row1[0]'";
						$rem_name_run = mysqli_query($con, $rem_name);
						$rem_r = mysqli_fetch_array($rem_name_run);
	?>					 
						<tr>
							<td><?php echo $j++; ?></td>
							<td><?php echo $rem_r[0]; ?></td>
							<td><?php echo $rem_row1[0]; ?></td>
							<td>
								<?php 
									if($rem_row1[1] == 1) {
										echo '<button class="btn btnsize" style="background:#FFD600;">Good</button>';
									}else if($rem_row1[1] == 2) {
										echo '<button class="btn btnsize" style="background:#06A306;">Average</button>';
									}else if($rem_row1[1] == 3) {
										echo '<button class="btn btnsize" style="background:#095077;">Satisfactory</button>';
									}else if($rem_row1[1] == 4) {
										echo '<button class="btn btnsize" style="background:#E53935;">Not so Good</button>';
									}
								?>
							</td>
							<td><?php echo $rem_row1[2]; ?></td>
						</tr>
	<?php
					}
	?>
					</tbody>
					</table>
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
		
		$('#Adateid').datepicker({
			format: "yyyy-mm-dd",
			todayHighlight: true,
			autoclose: true,
			endDate: today,
			//startDate: lastDate
		});	
		$('#Adateid').on('changeDate', function(ev){
			$(this).datepicker('hide');
			date2 = Date.parse($(this).val());
			var d = $(this).val();
			$.ajax({
				url: 'todb.php',
				data: "viewAttDate="+d,
				type: 'POST',
				success: function(data){
					$('#result').html(data);
				}
			});	
		});
		$('#Mdateid').datepicker({
			format: "yyyy-mm-dd",
			todayHighlight: true,
			autoclose: true,
			endDate: today,
			//startDate: lastDate
		});	
		$('#Mdateid').on('changeDate', function(ev){
			$(this).datepicker('hide');
			date1 = Date.parse($(this).val());
			var d = $(this).val();
			$.ajax({
				url: 'todb.php',
				data: "viewMinDate="+d,
				type: 'POST',
				success: function(data){
					$('#mresult').html(data);
				}
			});	
		});
	});
</script>
</body>
</html>