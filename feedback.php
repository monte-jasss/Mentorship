<?php
	include 'conn.php';
	$enrol = $_GET['enrollment'];
	
	$select = "select name from mastertable where enrollment = '$enrol'";
	$run = mysqli_query($con, $select);
	$row = mysqli_fetch_array($run);
?>
<script>
	$('#feedback_form').on('submit', function(e){
        e.preventDefault();
		$.ajax({
			url: 'todb.php',
			data: $(this).serialize(),
			type: 'POST',
			success: function(data){
				$("#error1").html(data);
			}
		});
    });
	$("#close").click(function(){
			$("#hidden").css("display","none");
		});
</script>				
					<div id="hidden">
					<!--<a id="close" style="cursor:pointer;color:white;font-weight:bold;background-color:red;border-radius:0%;padding:0.5% 1%;float:right;"><span><i class="fa fa-times"></i></span> Close</a>-->
					<form id="feedback_form" autocomplete="off">
							<div class="form-group has-warning has-feedback">
							  <label class="col-sm-4 control-label" for="inputWarning">Name: </label>
							  <div class="col-sm-8">
								<input type="text" class="form-control" value="<?php echo $row[0]; ?>" name="fname" disabled>
							  </div>
							</div>
							<div class="form-group has-warning has-feedback">
							  <label class="col-sm-4 control-label" for="inputWarning">Enrollment: </label>
							  <div class="col-sm-8">
								<input type="text" class="form-control" value="<?php echo $enrol; ?>" name="fenrollment" disabled>
							  </div>
							</div>
							<div class="form-group has-warning has-feedback">
							  <label class="col-sm-4 control-label" for="inputWarning">Teacher: </label>
							  <div class="col-sm-8">
								<input list="feedMentorList" type="text" name="fteacher" class="form-control" required>
								<datalist id="feedMentorList">
									<?php
										$fetch = "select distinct name from masterteachettable";
										$frun = mysqli_query($con, $fetch);
										
										while($frow = mysqli_fetch_array($frun)){
									?>
											<option value="<?php echo $frow[0]; ?>">
									<?php
										}
									?>
								</datalist>
							  </div>
							</div>
							<div class="form-group has-warning has-feedback">
							  <label class="col-sm-4 control-label" for="inputWarning">CGPA: </label>
							  <div class="col-sm-8">
								<input type="text" class="form-control" name="fcgpa" required>
							  </div>
							</div>
							<div class="form-group has-warning has-feedback">
							  <label class="col-sm-4 control-label" for="inputWarning">No. of Backlogs: </label>
							  <div class="col-sm-8">
								<input type="text" class="form-control" name="fbacklog" required>
							  </div>
							</div>
							<div class="form-group has-warning has-feedback">
							  <label class="col-sm-4 control-label" for="inputWarning">Attendance: </label>
							  <div class="col-sm-8">
								<input type="text" class="form-control" name="fattendance" required>
							  </div>
							</div>
							<div class="form-group has-warning has-feedback">
							  <label class="col-sm-4 control-label" for="inputWarning">Specialization: </label>
							  <div class="col-sm-8">
								<input type="text" class="form-control" name="fspecialization" required>
							  </div>
							</div>
							<div class="form-group has-warning has-feedback">
							  <label class="col-sm-4 control-label" for="inputWarning" required>Department Input: </label>
							  <div class="col-sm-8">
								<input type="text" class="form-control" name="fdept_input" required>
							  </div>
							</div>
							<div class="form-group has-warning has-feedback">
							  <label class="col-sm-4 control-label" for="inputWarning">Activities: </label>
							  <div class="col-sm-8">
								<input type="text" class="form-control" name="factivity" required>
							  </div>
							</div>
							<div class="form-group has-warning has-feedback">
							  <label class="col-sm-4 control-label" for="inputWarning">Projects and Training: </label>
							  <div class="col-sm-8">
								<input type="text" class="form-control" name="fproject" required>
							  </div>
							</div>
							<div class="form-group has-warning has-feedback">
							  <label class="col-sm-4 control-label" for="inputWarning">Placement, Higher Studies Expectation: </label>
							  <div class="col-sm-8">
								<input type="text" class="form-control" name="fexpactation" required>
							  </div>
							</div>
							<div class="form-group has-warning has-feedback">
							  <label class="col-sm-4 control-label" for="inputWarning">Communication Skills: </label>
							  <div class="col-sm-8">
								<input type="text" class="form-control" name="fcommunication" required>
							  </div>
							</div>
							<div class="form-group has-warning has-feedback">
							  <label class="col-sm-4 control-label" for="inputWarning">Interpersonal Skill: </label>
							  <div class="col-sm-8">
								<input type="text" class="form-control" name="finter_per" required>
							  </div>
							</div>
							<div class="form-group has-warning has-feedback">
							  <label class="col-sm-4 control-label" for="inputWarning">Warden's Report: </label>
							  <div class="col-sm-8">
								<input type="text" class="form-control" name="fwarden" required>
							  </div>
							</div>
							<div class="form-group has-warning has-feedback">
							  <label class="col-sm-4 control-label" for="inputWarning">Friend Circle: </label>
							  <div class="col-sm-8">
								<input type="text" class="form-control" name="ffriend" required>
							  </div>
							</div>
							<div class="form-group has-warning has-feedback">
							  <label class="col-sm-4 control-label" for="inputWarning">Family Background: </label>
							  <div class="col-sm-8">
								<input type="text" class="form-control" name="ffamily" required>
							  </div>
							</div>
							<div class="form-group has-warning has-feedback">
							  <label class="col-sm-4 control-label" for="inputWarning">AnyOther Remark: </label>
							  <div class="col-sm-8">
								<input type="text" class="form-control" name="fremark" required>
							  </div>
							</div>
                            <div><center><h3  id="error1" style="color:red;"></h3></center></div>
						<center><button type="submit" class="btn btn-primary" id="row_done">Add</button></center>
					</form>
					</div>