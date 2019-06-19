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
      <li class="active">
        <a href="#">
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
				<li role="tab1" class="active">
				  <a id="view" href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">View Groups</a>
				</li>
				<li role="tab2">
				  <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Add Group</a>
				</li>
				<li role="tab3">
				  <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Delete Group</a>
				</li>
				<li role="tab4">
				  <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Update Group</a>
				</li>
			  </ul>
			</div>
			<div class="card-body no-padding tab-content">
			  <div role="tabpanel" class="tab-pane active" id="tab1">
			    <center><div><h2>Groups Details</h2></div></center><br />
				<div class="row" style="margin:1%;">
					<div class="card card-mini" style="padding:3%;">
						<div class="table-responsive">
							<div class="container">		
								<div class="row detail-grp">
								  <ul>
									<?php
										$runq = mysqli_query($con, "select * from group_detail order by `mentor_grp` ASC");
										while($resq = mysqli_fetch_array($runq)){
									?>
											<li>
									<?php
											    echo '<br /><h3 style="color:#29C75F;"><a class="grpinfo" id="'.$resq[0].'@'.$resq[1].'" href="javascript:void(0);">'.$resq[0].'.  '.$resq[1].'</a></h3>';
									?>
											  <ol type="a">
									<?php
												$runq1 = mysqli_query($con, "SELECT user_info.email, masterteachettable.name FROM `user_info` INNER JOIN `masterteachettable` ON user_info.email = masterteachettable.email WHERE mentor_grp='$resq[0]'");
												while($resq1 = mysqli_fetch_array($runq1)){
													echo '<li><h4 style="font-size:15px;padding-left:10%;"> - '.strtoupper($resq1[1]).'</h4></li>';
												}
									?>
											  </ol>
											</li>
									<?php
										}
									?>
								  </ul>
								</div>
							</div>
						</div>
					</div>	
				</div>	
			  </div>
			  <div role="tabpanel" class="tab-pane" id="tab2">
					<center><div><h2>Add New Group</h2></div></center><br />
					<div class="card card-mini" style="padding:3%;">
						<br>
						<div class="row">
							<div style="width:30%;margin:0 auto;">
								<form id="add_grp_form" method="post" style="width:120%;">
								<?php
									$runq2 = mysqli_query($con, "select max(mentor_grp) from group_detail");
									$resq2 = mysqli_fetch_array($runq2);
									$resq2[0]++;
								?>
									
									<label for="mentor_grp">Mentor Group ID</label>
									<div class="input-group">
										<input type="text" class="form-control" name = "mentor_grp" id="mentor_grp" placeholder="Mentor group ID" value="<?php echo $resq2[0]; ?>" readonly required>
										<span class="input-group-addon grpEdit">
											<a href="javascript:void(0)"><i class="fa fa-pencil"></i></a>
										</span>
									</div>
									<div class="form-group">
									  <label for="mentor_grp">Group Description * </label>
									  <input name = "description" id="pass" class="form-control" type="text" placeholder="Group description" autofocus required>
									</div>
									<div class="row">
										<div class="col-md-6 col-sm-6">
											<div class="form-group mentor">
											  <label for="add_mentor">Select Mentor * </label>
											  <input name="mentor[]" list="mentor" id = "add_mentor" class="form-control" type="text" placeholder="Mentor's Name" required >
											  <datalist id="mentor">
											  <?php
												$runq3 = mysqli_query($con, "select name, email from masterteachettable");
												while($resq3 = mysqli_fetch_array($runq3)){
											  ?>
													<option value="<?php echo $resq3[0]; ?>">
											  <?php
												}
											  ?>	
											  </datalist>  
											</div>
											<center><i id="addmentor" class="fa fa-plus" style="font-size:25px;cursor:pointer;" aria-hidden="true"></i></center>
										</div>	
										<div class="col-md-6 col-sm-6">
											<div class="form-group mentee">
											  <label for="add_mentee">Select Mentee * </label>
											  <input name="mentee[]" list="mentee" id = "add_mentee" class="form-control" type="text" placeholder="Enrollment" required >
											  <datalist id="mentee">
											  <?php
												$runq3 = mysqli_query($con, "select enrollment from mastertable");
												while($resq3 = mysqli_fetch_array($runq3)){
											  ?>
													<option value="<?php echo $resq3[0]; ?>">
											  <?php
												}
											  ?>	
											  </datalist>  
											</div>
											<center><i id="addmentee" class="fa fa-plus" style="font-size:25px;cursor:pointer;" aria-hidden="true"></i></center>
										</div>	
									</div><br/><br/>
									<div id="add_result"></div><br/>
									<center><button class="btn btn-primary" type="submit">Create Group</button></center>
								</form>
							</div>
						</div>
					</div>
			  </div>
			  <div role="tabpanel" class="tab-pane" id="tab3">
			    <center><div><h2>Delete Existing Group</h2></div></center><br />
				<div class="card card-mini" style="padding:3%;">
					<br>
					<div class="row delete-grp">
						<table style="margin:0 auto;width:50%;" class="table-striped">
						  <thead>
							<tr>
							  <th><h4>Mentor Group</h4></th>
							  <th><h4>Delete</h4></th>
							</tr>
						  </thead>
						  <tbody>
						<?php
							$runq2 = mysqli_query($con, "select * from group_detail order by `mentor_grp` ASC");
							while($resq2 = mysqli_fetch_array($runq2)){
						?>
						  <tr>
							<td><?php   echo '<h5 style="color:#29C75F;padding-left:10px;">'.$resq2[0].'.  '.$resq2[1].'</h5>';	?></td>
							<td> 
								<a href="javascript:void(0)" class="delete" value="<?php echo $resq2[0]; ?>">
								  <div class="icon">
									<i style="font-size:20px;" class="fa fa-trash" aria-hidden="true"></i>
								  </div>
								</a>
							</td>
						  </tr>
						<?php
							}
						?>
						  </tbody>
						</table>
					</div>
				</div>
			  </div>	
			  <div role="tabpanel" class="tab-pane" id="tab4">
				<div class="card card-mini" style="padding:3%;">
					<h2>Update Groups</h2>
					<br>
					<div class="row">
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label for="selectgrp">Select Group:</label>
								<input type="text" list="mentor_grp1" placeholder="Select Group" class="form-control" id="selectgrp">
								<datalist id="mentor_grp1">
									<?php 
										while($row_res = mysqli_fetch_array($res)){
									?>
											<option value="<?php echo $row_res[0]; ?>"><?php echo $row_res[1]; ?></option>
									<?php
										}
									?>
								</datalist>
							</div>
						</div>
					</div>
					<div id="result_update_grp">
					</div>
				</div>
			  </div>
			</div>
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

<script>
	$(document).ready(function(){
		
/* 		var today = new Date();
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
		}); */
		$("#addmentor").click(function(){
			$(".mentor").children('input:first').clone().val('').appendTo(".mentor");
		});
		$("#addmentee").click(function(){
			$(".mentee").children('input:first').clone().val('').appendTo(".mentee");
		});
		$('.grpEdit').click(function(){
			$('#mentor_grp').removeAttr('readonly');
		});
		/*$("#view").click(function(){
			var check = 'access';
			$.ajax({
				url: 'todb.php',
				type: 'POST',
				data: 'check='+check,
				success: function (data) {
					$('.detail-grp').html(data);
				}
			});
		});*/
		$(".delete").click(function(){
			var del = $(this).attr('value');
			$(this).parent().parent().hide();
			$.ajax({
				url: 'todb.php',
				type: 'POST',
				data: 'delete='+del,
				success: function (data) {
					if(data!=true){
						alert('Something Went Wrong, Please try again later !!');
					}
				}
			});
		});
		$("#add_grp_form").submit(function(e){
			e.preventDefault();
			$.ajax({
				url: 'todb.php',
				type: 'POST',
				data: $(this).serialize(),
				success: function (data) {
					if(data==true){
						$("#add_result").html("<center><div class=\"alert alert-success\"><strong>Success!</strong> New Mentorship Group created Successfully !!!</div></center>").fadeIn(100).delay(3000).fadeOut(100);
						$("#add_grp_form")[0].reset();
					}
					else{
						$("#add_result").html("<center><div class=\"alert alert-error\"><strong>Error!</strong> New Mentorship Group creation Failed !!!</div></center>").fadeIn(100).delay(3000).fadeOut(100);
					}
				}
			});
		});
		$('.grpinfo').click(function(){
			var id = $(this).attr('id');
			$.ajax({
				url: 'todb.php',
				data: "grpID="+id,
				type: 'POST',
				success: function(data){
					
					if(data == false){
						$("#grpModal .modal-body").html("Something went wrong, please try again later...");
						$("#grpModal").modal();
					}else{
						$("#grpModal .modal-body").html(data)
						$("#grpModal").modal();
					}
				}
			});	
		});
		
		$('#selectgrp').change(function() {
			var id = $(this).val();
			if(Math.floor(id) == id && $.isNumeric(id)){
				$.ajax({
					url: 'todb.php',
					data: "selectedgrpID="+id,
					type: 'POST',
					success: function(data){
						$('#result_update_grp').html(data);
					}
				});
			}else{
				alert("Invalid ID");
			}
		});
	});
</script>
</body>
</html>