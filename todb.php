<?php 
	include 'conn.php';
	
	if($con){
		if(isset($_POST['username'])){
			
			$email = mysqli_real_escape_string($con, validate($_POST['username']));
			
			if(isset($_POST['pass1'])){
				$password = md5(mysqli_real_escape_string($con, validate($_POST['pass1'])));
				//$password = mysqli_real_escape_string($con, validate($_POST['pass1']));
				$sql = "select masterteachettable.name,user_info.type from user_info,masterteachettable where user_info.email like '$email' and user_info.password like '$password' and user_info.email=masterteachettable.email";
				$run = mysqli_query($con, $sql);
				
				if(mysqli_num_rows($run)>0){
					
					$dot = strpos($email,".");
					$att = strpos($email,"@");
					if($dot > $att){
						$var = explode("@", $email);
					}else{
						$var = explode(".", $email);
					}
					$rn1 = mt_rand(10000,99999);
					$sid = $var[0].$rn1."ms";
					
					$row = mysqli_fetch_array($run);
					
					//session_id($sid);
					session_start();
					//$_SESSION['sid'] = $sid;
					$_SESSION['name'] = $row[0];
					$_SESSION['email'] = $email;
					$_SESSION['acctype'] = $row[1];
					
					echo true;
				}
				else{
					echo false;
				}
			}else{
				$sql = "select email from user_info where email like '$email'";
				$run = mysqli_query($con, $sql);
				if(mysqli_num_rows($run)>0){
					echo true;
				}
				else{
					echo false;
				}
			}
		}
		else if(isset($_POST['add'])){
			if($con){
				$input = $_POST['add'];
				
				$fetch1 = "select * from mastertable where enrollment like '%$input%' or name like '%$input%'";
				$run1 = mysqli_query($con, $fetch1);
				
				if(mysqli_num_rows($run1)==0){
					echo false;
				}else{	
					$row1 = mysqli_fetch_array($run1);
?>
					
					<div class="table-responsive">
						<table class="table card-table">
							<tbody>
							  <tr>
								<td><b>Name</b></td> <td><p id="val1"><?php echo $row1['name']; ?></p></td>
								<td><b>Enrollment</b></td> <td><p id="val2"><?php echo $row1['enrollment']; ?></p></td>
								<td><b>Semester</b></td> <td><p id="val3"><?php echo $row1['semester']; ?></p></td>
							  </tr>
							  <tr>
								<td><b>Date Of Birth (yyyy-mm-dd)</b></td> <td><p id="val4"><?php echo $row1['dob']; ?></p></td>
								<td><b>Branch</b></td> <td><p id="val5"><?php echo $row1['branch']; ?></p></td>
								<td><b>Gender</b></td> <td><p id="val6"><?php echo $row1['gender']; ?></p></td>
							  </tr>
							  <tr>
								<td><b>Email</b></td> <td><p id="val7"><?php echo $row1['email']; ?></p></td>
								<td><b>Hostel</b></td> <td><p id="val8"><?php echo $row1['hostel']; ?></p></td>
								<td><b>Father's Name</b></td> <td><p id="val9"><?php echo $row1['father']; ?></p></td>
							  </tr>
							  <tr>
								<td><b>Mother's Name</b></td> <td><p id="val10"><?php echo $row1['mother']; ?></p></td>
								<td><b>Sibling</b></td> <td><p id="val11"><?php echo $row1['sibling']; ?></p></td>
								<td><b>Workplace</b></td> <td><p id="val12"><?php echo $row1['workplace']; ?></p></td>
							  </tr>
							  <tr>
								<td><b>Designation</b></td> <td><p id="val13"><?php echo $row1['designation']; ?></p></td>
								<td><b>Mess</b></td> <td><p id="val14"><?php echo $row1['mess']; ?></p></td>
								<td><b>Room no.</b></td> <td><p id="val15"><?php echo $row1['room_no']; ?></p></td>
							  </tr>
							  <tr>
								<td><b>Roommate</b></td> <td><p id="val16"><?php echo $row1['roommate']; ?></p></td>
								<td><b>Best Friend</b></td> <td><p id="val17"><?php echo $row1['bestfriend']; ?></p></td>
								<td><b>Student Contact</b></td> <td><p id="val18"><?php echo $row1['student_mob']; ?></p></td>
							  </tr>
							  <tr>
								<td><b>Father Contact</b></td> <td><p id="val19"><?php echo $row1['father_mob']; ?></p></td>
								<td><b>Address</b></td> <td><p id="val20"><?php echo $row1['address']; ?></p></td>
								<td><b>City</b></td> <td><p id="val21"><?php echo $row1['city']; ?></p></td>
							  </tr>
							  <tr>
								<td><b>Medium(School)</b></td> <td><p id="val22"><?php echo $row1['medium']; ?></p></td>
								<td><b>Club</b></td> <td><p id="val23"><?php echo $row1['club']; ?></p></td>
								<td><b>Achievements</b></td> <td><p id="val24"><?php echo $row1['achievements']; ?></p></td>
							  </tr>
							  <tr>
								<td><b>Language</b></td> <td><p id="val25"><?php echo $row1['language']; ?></p></td>
								<td><b>Hobbies</b></td> <td><p id="val26"><?php echo $row1['hobbies']; ?></p></td>
								<td><b>Pocket Money</b></td> <td><p id="val27">₹ <?php echo $row1['pmoney']; ?></p></td>
							  </tr>
							  <tr>
								<td><b>Interesting Subject</b></td> <td><p id="val28"><?php echo $row1['subinterest']; ?></p></td>
								<td><b>Hygiene</b></td> <td><p id="val29"><?php echo $row1['hygiene']; ?></p></td>
								<td><b>Cleanliness</b></td> <td><p id="val30"><?php echo $row1['cleanliness']; ?></p></td>
							  </tr>
							  <tr>
								<td><b>Sleep & Study hours</b></td> <td><p id="val31"><?php echo $row1['sleep_study']; ?></p></td>
								<td><b>Food</b></td> <td><p id="val32"><?php echo $row1['food']; ?></p></td>
								<td><b>Non veg or Veg</b></td> <td><p id="val33"><?php echo $row1['veg_nonveg']; ?></p></td>
							  </tr>
							  <tr>
								<td><b>Disease</b></td> <td><p id="val34"><?php echo $row1['disease']; ?></p></td>
								<td><b>Medicine</b></td> <td><p id="val35"><?php echo $row1['medicine']; ?></p></td>
								<td><b>Blood Group</b></td> <td><p id="val36"><?php echo $row1['blood_grp']; ?></p></td>
							  </tr>
							  <tr>
								<td><b>Visit By SPSU</b></td> <td><p id="val37"><?php echo $row1['spsu_visit']; ?></p></td>
								<td><b>Country Visit</b></td> <td><p id="val38"><?php echo $row1['country_visit']; ?></p></td>
								<td><b>Date Of Visit</b></td> <td><p id="val39"><?php echo $row1['date_visit']; ?></p></td>
							  </tr>
							  <tr>
								<td><b>Training Company</b></td> <td><p id="val40"><?php echo $row1['training_company']; ?></p></td>
								<td><b>Training Dept.</b></td> <td><p id="val41"><?php echo $row1['training_dept']; ?></p></td>
								<td><b>Project Endeavour</b></td> <td><p id="val42"><?php echo $row1['projecte']; ?></p></td>
							  </tr>
							  <tr style="text-decoration:underline;">
								<td><b>Financial Remarks</b></td> <td colspan="5"><?php echo $row1['finance']; ?></td>
							  </tr>
							</tbody>
						  </table>
						  <div id = "editresult"></div>
					  </div>
<?php
				
					
				}
			}					
		}
		else if(isset($_POST['feedbackid'])){
			
			$enrol = $_POST['feedbackid'];
			$fetch = "select * from student_record where enrollment like '$enrol'";
			$run = mysqli_query($con, $fetch);
			
			echo '<div class="table-responsive">
					<table id = "studentlist" class="table card-table">
					  <thead>
						<tr>
						  <th>Sr no.</th>
						  <th>Teacher Name</th>
						  <th>CGPA</th>
						  <th>No. Of Backlogs</th>
						  <th>Attendance</th>
						  <th>Specialization<br>(as applicable)</th>
						  <th>Department Inputs</th>
						  <th>Activities</th>
						  <th>Placements, Higher Studies Expectation</th>
						  <th>Communication Skills</th>
						  <th>Family Background</th>
						  <th>Any Other Remark</th>
						  <th>Inter Personal Skills</th>
						  <th>Wardens Report</th>
						  <th>Friends Cirle</th>
						  <th>Financial</th>
						</tr>
					  </thead>
					  <tbody>';
					$i=0;
					while($row = mysqli_fetch_array($run)){
						$teacher = $row['teacher'];
						$cgpa = $row['cgpa'];
						$backlog = $row['backlog'];
						$attendance = $row['attendance'];
						$specialization = $row['specialization'];
						$department = $row['department_input'];
						$activity = $row['activity'];
						$expectation = $row['expectation'];
						$communication = $row['communication'];
						$family = $row['family'];
						$remark = $row['other_remark'];
						$personal = $row['inter_personal'];
						$report = $row['warden_report'];
						$friend = $row['friend_circle'];
						$financial = $row['financial'];
						$i++;
						?>
						<tr>
						  <td class="right"><?php echo $i; ?></td>
						  <td class="right" style="color:blue;"><?php echo $teacher; ?></td>
						  <td class="right"><?php echo $cgpa; ?></td>
						  <td class="right"><?php echo $backlog; ?></td>
						  <td class="right"><?php echo $attendance; ?></td>
						  <td class="right"><?php echo $specialization; ?></td>
						  <td class="right"><?php echo $department; ?></td>
						  <td class="right"><?php echo $activity; ?></td>
						  <td class="right"><?php echo $expectation; ?></td>
						  <td class="right"><?php echo $communication; ?></td>
						  <td class="right"><?php echo $family; ?></td>
						  <td class="right"><?php echo $remark; ?></td>
						  <td class="right"><?php echo $personal; ?></td>
						  <td class="right"><?php echo $report; ?></td>
						  <td class="right"><?php echo $friend; ?></td>
						  <td class="right"><?php echo $financial; ?></td>
						</tr>
<?php 				}
					echo '</tbody>
					</table></div>';
			
		}
		else if(isset($_POST['fenrollment'])){
			$enrollment = mysqli_real_escape_string($con, validate($_POST['fenrollment']));
			$name = mysqli_real_escape_string($con, validate($_POST['fname']));
			$teacher = mysqli_real_escape_string($con, validate($_POST['fteacher']));
			$cgpa = mysqli_real_escape_string($con, validate($_POST['fcgpa']));
			$backlog = mysqli_real_escape_string($con, validate($_POST['fbacklog']));
			$attendance = mysqli_real_escape_string($con, validate($_POST['fattendance']));
			$specialization = mysqli_real_escape_string($con, validate($_POST['fspecialization']));
			$department = mysqli_real_escape_string($con, validate($_POST['fdept_input']));
			$activity = mysqli_real_escape_string($con, validate($_POST['factivity']));
			$project = mysqli_real_escape_string($con, validate($_POST['fproject']));
			$expactation = mysqli_real_escape_string($con, validate($_POST['fexpactation']));
			$communication = mysqli_real_escape_string($con, validate($_POST['fcommunication']));
			$inter_per = mysqli_real_escape_string($con, validate($_POST['finter_per']));
			$warden = mysqli_real_escape_string($con, validate($_POST['fwarden']));
			$friend = mysqli_real_escape_string($con, validate($_POST['ffriend']));
			$family = mysqli_real_escape_string($con, validate($_POST['ffamily']));
			$remark = mysqli_real_escape_string($con, validate($_POST['fremark']));
			
			
			$sql = "insert into `student_record`(`teacher`, `name`, `enrollment`, `cgpa`, `backlog`, `attendance`, `specialization`, `department_input`, `activity`, `project`, `expectation`, `communication`, `family`, `other_remark`, `inter_personal`, `warden_report`, `friend_circle`)  values('$teacher','$name','$enrollment','$cgpa','$backlog','$attendance','$specialization','$department','$activity','$project','$expactation','$communication','$family','$$remark','$inter_per','$warden','$friend')";
			$run = mysqli_query($con, $sql);
			if($run){
				echo "Data Inserted Successfully.";
			}
			else{
				echo $teacher."'s feedback is already given for ".$enrollment.".";
			}
		}
		else if(isset($_POST['mattdummy'])){
			$date = $_POST['Adate'];
			session_start();
			$email = $_SESSION['email'];
			$group = $_SESSION['group'];
			$sql = "select enrollment from mentorship_attendance where date='$date' and mentor_grp='$group'";
			$run = mysqli_query($con, $sql);
			if(mysqli_num_rows($run)==0){					
				$fetch = "select enrollment from mastertable where mentor_grp='$group'";
				$do = mysqli_query($con, $fetch);
				while($row = mysqli_fetch_array($do)){
					$sql1 = "insert into mentorship_attendance (enrollment, mentor, mentor_grp, date) values('$row[0]', '$email', '$group', '$date')";
					mysqli_query($con, $sql1);
				}
			}else{
				$update1 = "update mentorship_attendance set attendance=0 where mentor_grp = '$group' and date = '$date'"; 
				mysqli_query($con, $update1);
			}
			if(isset($_POST['present'])){
				foreach($_POST['present'] as $present) {
					$update = "update mentorship_attendance set attendance=1 where enrollment = '$present' and date = '$date'";
					mysqli_query($con, $update);
				}
			}/*else{
				$delete = "delete from mentorship_attendance where mentor_grp = '$group' and date = '$date'";
				mysqli_query($con, $delete);
			}*/
			
			echo "<center><div class=\"alert alert-success\"><strong>Success!</strong> Attendance Updated Successfully.</div></center>";
		}
		else if(isset($_POST['Mdate'])){
			$date = $_POST['Mdate'];
			
			$new_areas = mysqli_real_escape_string($con, validate($_POST['newareas']));
			$follow_up = mysqli_real_escape_string($con, validate($_POST['followup']));
			$special = mysqli_real_escape_string($con, validate($_POST['special']));
			session_start();
			$email = $_SESSION['email'];
			$group = $_SESSION['group'];
			
			$sql1 = "insert into minutes (date, email, mentor_grp, new_areas, follow_up_agenda, special_agenda) values('$date', '$email', '$group', '$new_areas', '$follow_up', '$special')";
			$run = mysqli_query($con, $sql1);
			if($run == true)
				echo "<div class=\"alert alert-success\">
					<strong>Success!</strong> Submission Successful.
				</div>";
			else
				echo "<div class=\"alert alert-warning\">
				<strong>Warning!</strong> Minutes already submitted.
			</div>";
		}
		else if(isset($_POST['setGroup'])){
			$group = $_POST['setGroup'];
			session_start();
			if($group == "adminID"){
				$_SESSION['acctype'] = 1;
				echo false;
			}else{
				$_SESSION['acctype'] = 0;
				$_SESSION['group'] = $group;
				echo true;
			}
		}
		else if(isset($_POST['opwd']))
		{
			session_start();
			$opwd = md5($_POST['opwd']);
			$npwd = md5($_POST['npwd']);
			$cpwd = md5($_POST['cpwd']);
			$email = $_SESSION['email'];
			if($npwd == $cpwd)
			{
				$sql = "UPDATE user_info SET password = IF(password = '$opwd', '$cpwd', password) WHERE email='$email'";
				mysqli_query($con, $sql);
				if(mysqli_affected_rows($con) > 0)
					echo "<center><div class=\"alert alert-success\"><strong>Success!</strong> Password changed successfully...</div></center>";
				else
					echo "<center><div class=\"alert alert-warning\"><strong>Warning!</strong> Incorrect old password...</div></center>";
			}
			else
				echo "<center><div class=\"alert alert-warning\"><strong>Warning!</strong> Passwords do not match...</div></center>";
		}
		else if(isset($_POST['new_password']))
		{
			$npwd = md5($_POST['new_password']);
			$code = $_POST['frgt_code'];

			$sql = "UPDATE user_info SET password = IF(forgot_bit = 1, '$npwd', password), forgot_bit = 0 WHERE forgot_code = $code";
			mysqli_query($con, $sql);
			if(mysqli_affected_rows($con) > 0)
				echo "Password Changed";
			else
				echo "Failed";
		}
		else if(isset($_POST['viewAttDate']))
		{
			session_start();
			$date = $_POST['viewAttDate'];
			$group = $_SESSION['group'];
			
			$sql = "select mentorship_attendance.enrollment, mentorship_attendance.attendance, mastertable.name from mentorship_attendance,mastertable where mentorship_attendance.date = '$date' and mentorship_attendance.mentor_grp = '$group' and mastertable.enrollment=mentorship_attendance.enrollment";
			$run = mysqli_query($con, $sql);
			$i = 1;
			if(mysqli_num_rows($run) > 0){
?>
				<div class="table-responsive">  		
					<table class="table">
						<thead>
						  <tr>
							<th>#</th>
							<th>Name</th>
							<th>Enrollment</th>
							<th>Attendance</th>
						  </tr>
						</thead>
						<tbody>
<?php
				while($row = mysqli_fetch_array($run))
				{
					
?>				
						  <tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $row[2]; ?></td>
							<td><?php echo $row[0]; ?></td>
							<td><?php if($row[1] == 1) echo "<p style=\"color:darkgreen;\">Present</p>"; else echo "<p style=\"color:red;\">Absent</p>"; ?></td>
						  </tr>
<?php
				}
?>
						</tbody>
					 </table>
				</div>
<?php
			}
			else
				echo "<center><div class=\"alert alert-warning\"><strong>Warning!</strong> No record Found !!!</div></center>";
		}
		else if(isset($_POST['viewMinDate']))
		{
			session_start();
			$date = $_POST['viewMinDate'];
			$group = $_SESSION['group'];
			
			$sql = "select * from minutes where date = '$date' and mentor_grp = $group";
			$run = mysqli_query($con, $sql);
			if(mysqli_num_rows($run) > 0){
				$row = mysqli_fetch_array($run);
?>
				<div class="table-responsive">  		
					<table class="table">
						<thead>
						  <tr>
							<th>New Agenda</th>
						  </tr>
						  <tr>
							<td><?php echo $row[3]; ?></td>
						  </tr>
						  <tr>
							<th>Follow-up of previous agenda</th>
						  </tr>
						  <tr>
							<td><?php echo $row[4]; ?></td>
						  </tr>
						  <tr>
							<th>Special agenda</th>
						  </tr>
						  <tr>
							<td><?php echo $row[5]; ?></td>
						  </tr>
						</thead>
					 </table>
				</div>
<?php
			}
			else
				echo "<center><div class=\"alert alert-warning\"><strong>Warning!</strong> No record Found !!!</div></center>";
		}
		else if(isset($_POST['upAttDate']))
		{
			session_start();
			$date = $_POST['upAttDate'];
			$group = $_SESSION['group'];
			
			$fetch = "select name,enrollment,email,student_mob,father_mob from mastertable where mentor_grp='$group'";
			$do = mysqli_query($con, $fetch);
			
			
?>
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
						$sql = "select attendance from mentorship_attendance where enrollment = '$col[1]' and date = '$date'";
						$run = mysqli_query($con, $sql);
						$row = mysqli_fetch_array($run);
						$i++;
				?>
				  <tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $col[0]; ?></td>
					<td><?php echo $col[1]; ?></td>
					<td><?php echo $col[4]; ?></td>
					
					<td>
						<div class="material-switch">
							<input class="check" id="someSwitchOptionSuccess<?php echo $i; ?>" name="present[]" type="checkbox" value="<?php echo $col[1]; ?>" <?php if($row[0] == 1) echo "checked"; ?>/>
							<label for="someSwitchOptionSuccess<?php echo $i; ?>" class="label-success"></label>
						</div>
					</td>
				  </tr>
				<?php
					}
				?>
				</tbody>
			</table>
<?php

		}
		else if(isset($_POST['minDate'])){
			
			$Mdate = mysqli_real_escape_string($con, validate($_POST['minDate']));
			$mentor = mysqli_real_escape_string($con, validate($_POST['minMentor']));
			$desc = mysqli_real_escape_string($con, validate($_POST['minGroup']));
			$grpCount = 1;
			$check = 0;
			
			if($desc == "ALL"){
				$sql = "select user_info.email, user_info.mentor_grp from masterteachettable, user_info where masterteachettable.email = user_info.email and masterteachettable.name='$mentor'";
				$run = mysqli_query($con, $sql);
				$grpCount = mysqli_num_rows($run);
				
				for($i=0;$i<$grpCount;$i++){
					$row = mysqli_fetch_array($run);
					$group[$i] = $row[1];
				}
			}else{
				$sql3 = "SELECT mentor_grp FROM `group_detail` WHERE description ='$desc'";
				$run3 = mysqli_query($con, $sql3);
				$row3 = mysqli_fetch_array($run3);
				$group[0] = $row3[0];
			}
			
			for($i=0;$i<$grpCount;$i++){
				$sql2 = "SELECT `new_areas`, `follow_up_agenda`, `special_agenda` FROM `minutes` WHERE date='$Mdate' and mentor_grp='$group[$i]'";
				$run2 = mysqli_query($con, $sql2);
				
				if(mysqli_num_rows($run2) > 0){
					$check = 1;
					$row2 = mysqli_fetch_array($run2);
					
					$sql4 = "SELECT `description` FROM `group_detail` WHERE mentor_grp='$group[$i]'";
					$run4 = mysqli_query($con, $sql4);
					$row4 = mysqli_fetch_array($run4);
					
		?>
					 <h4><b>Group: </b><span style="color:red"><?php echo $row4[0]; ?></span></h4>
					  <div class="table-responsive">  		
						<table class="table table-bordered">
							<thead>
							  <tr>
								<th>New Agenda</th>
							  </tr>
							  <tr>
								<td><?php echo $row2[0]; ?></td>
							  </tr>
							  <tr>
								<th>Follow-up of previous agenda</th>
							  </tr>
							  <tr>
								<td><?php echo $row2[1]; ?></td>
							  </tr>
							  <tr>
								<th>Special agenda</th>
							  </tr>
							  <tr>
								<td><?php echo $row2[2]; ?></td>
							  </tr>
							</thead>
						 </table>
					</div>
		<?php	
				}
			}
			
			if($check == 0){
				echo "<center><h3 style=\"color:red;\">No Record Found</h3></center>";
			}
		}
		else if(isset($_POST['attDate'])){
			
			$Mdate = mysqli_real_escape_string($con, validate($_POST['attDate']));
			$mentor = mysqli_real_escape_string($con, validate($_POST['attMentor']));
			$desc = mysqli_real_escape_string($con, validate($_POST['attGroup']));
			$grpCount = 1;
			$check = 0;
			
			if($desc == "ALL"){
				$sql = "select user_info.email, user_info.mentor_grp from masterteachettable, user_info where masterteachettable.email = user_info.email and masterteachettable.name='$mentor'";
				$run = mysqli_query($con, $sql);
				$grpCount = mysqli_num_rows($run);
				
				for($i=0;$i<$grpCount;$i++){
					$row = mysqli_fetch_array($run);
					$group[$i] = $row[1];
				}
			}else{
				$sql3 = "SELECT mentor_grp FROM `group_detail` WHERE description ='$desc'";
				$run3 = mysqli_query($con, $sql3);
				$row3 = mysqli_fetch_array($run3);
				$group[0] = $row3[0];
			}
			
			for($i=0;$i<$grpCount;$i++){
				
				$sql5 = "select description from group_detail where mentor_grp = '$group[$i]'";
				$run5 = mysqli_query($con, $sql5);
				$row5 = mysqli_fetch_array($run5);
				
				$sql2 = "select mentorship_attendance.enrollment, mentorship_attendance.attendance, mastertable.name from mentorship_attendance,mastertable where mentorship_attendance.date = '$Mdate' and mentorship_attendance.mentor_grp = '$group[$i]' and mastertable.enrollment=mentorship_attendance.enrollment";
				$run2 = mysqli_query($con, $sql2);
				
				if(mysqli_num_rows($run2) > 0){
					$check = 1;
?>
					<thead>
						<tr><th colspan="2"><h4><b>Group: </b><span style="color:red"><?php echo $row5[0]; ?></span></h4></th></tr>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Enrollment</th>
							<th>Attendance</th>
						</tr>
					</thead>
					  <tbody>
	<?php
					
					$j=1;
					while($row2 = mysqli_fetch_array($run2)){
	?>					 
						<tr>
							<td><?php echo $j++; ?></td>
							<td><?php echo $row2[2]; ?></td>
							<td><?php echo $row2[0]; ?></td>
							<td><?php if($row2[1] == 1) echo "<p style=\"color:darkgreen;\">Present</p>"; else echo "<p style=\"color:red;\">Absent</p>"; ?></td>
						</tr>
	<?php
					}
	?>
					</tbody>
<?php
				}
			}
			
			if($check == 0){
				echo "<center><h3 style=\"color:red;\">No Record Found</h3></center>";
			}
		}
		else if(isset($_POST['description'])){
			extract($_POST);
			if($runq1 = mysqli_query($con, "INSERT INTO `group_detail`(`mentor_grp`, `description`) VALUES('$mentor_grp','$description')")){
				for($i=0; $i<sizeof($mentor); $i++){
					$temp1 = mysqli_real_escape_string($con, validate($mentor[$i]));
					
					$run1 = mysqli_query($con, "select distinct email from masterteachettable where name like '$temp1'");
					$res1 = mysqli_fetch_array($run1);
					
					$run2 = mysqli_query($con, "select distinct email from user_info where email like '$res1[0]'");
					$res2 = mysqli_fetch_array($run2);
					if(mysqli_num_rows($run2)>0){
						$runq2 = mysqli_query($con, "select distinct masterteachettable.email, user_info.password, user_info.type from masterteachettable inner join user_info on masterteachettable.email=user_info.email where name like '$temp1'");
						$resq2 = mysqli_fetch_array($runq2);
						$runq3 = mysqli_query($con, "insert into user_info(email, password, type, mentor_grp) values('$resq2[0]','$resq2[1]','$resq2[2]','$mentor_grp')");
					}
					else{
						$runq3 = mysqli_query($con, "insert into user_info(email, mentor_grp) values('$res1[0]','$mentor_grp')");
					}
				}
				for($j=0; $j<sizeof($mentee); $j++){
					$temp2 = mysqli_real_escape_string($con, validate($mentee[$j]));
					$runq4 = mysqli_query($con, "update mastertable set mentor_grp='$mentor_grp' where enrollment like '$temp2'");
				}
				echo true;
			}
			else{
				echo false;
			}
		}
		else if(isset($_POST['mentorPop'])){
			$mentor = mysqli_real_escape_string($con, validate($_POST['mentorPop']));
			
			$sql = "select user_info.mentor_grp from masterteachettable, user_info where masterteachettable.email = user_info.email and masterteachettable.name='$mentor'";
			$run = mysqli_query($con, $sql);
			$i=0;
			while($row = mysqli_fetch_array($run)){
				
				$sql2 = "SELECT `description` FROM `group_detail` WHERE mentor_grp='$row[0]'";
				$run2 = mysqli_query($con, $sql2);
				$row2 = mysqli_fetch_array($run2);
				$desc[$i] = $row2[0];
				$i++;
			}
			
			echo json_encode($desc);
		}
		else if(isset($_POST['check'])){
			$check = mysqli_real_escape_string($con, validate($_POST['check']));
			  echo '<ul>';
					$runq = mysqli_query($con, "select * from group_detail order by `mentor_grp` ASC");
					while($resq = mysqli_fetch_array($runq)){
						echo '<li><br /><h3 style="color:#29C75F;"><a class="grpinfo" id="'.$resq[0].'@'.$resq[1].'" href="javascript:void(0);">'.$resq[0].'.  '.$resq[1].'</a></h3><ol type="a">';
							$runq1 = mysqli_query($con, "SELECT user_info.email, masterteachettable.name FROM `user_info` INNER JOIN `masterteachettable` ON user_info.email = masterteachettable.email WHERE mentor_grp='$resq[0]'");
							while($resq1 = mysqli_fetch_array($runq1)){
								echo '<li><h4 style="font-size:15px;padding-left:10%;"> - '.strtoupper($resq1[1]).'</h4></li>';
							}
						  echo '</ol></li>';
					}
			  echo '</ul>';
		}
		else if(isset($_POST['delete'])){
			$delete = mysqli_real_escape_string($con, validate($_POST['delete']));
			mysqli_query($con, "delete from user_info where mentor_grp='$delete'");
			if(mysqli_affected_rows($con)>0){
				mysqli_query($con, "delete from group_detail where mentor_grp='$delete'");
				if(mysqli_affected_rows($con)>0){
					$z=0;
					mysqli_query($con, "update mastertable set mentor_grp='$z' where mentor_grp='$delete'");
					if(mysqli_affected_rows($con)>0){
						echo true;
					}	
				}
			}
		}
		else if(isset($_POST['grpID'])){
			$grpID = mysqli_real_escape_string($con, validate($_POST['grpID']));
			$grpID = explode('@',$grpID);
			$result = mysqli_query($con, "select name,enrollment from mastertable where mentor_grp='$grpID[0]'");
			if(mysqli_num_rows($result)>0){
				$i=1;
				echo '<table class="table table-striped">
				<thead>
					<tr><th colspan="3"><h4><b>Group: </b><span style="color:#337ABE;"> '.$grpID[1].'</span></h4></th></tr>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Enrollment</th>
					</tr>
				</thead>
				<tbody>';	  
				while($row = mysqli_fetch_array($result)){
					echo '<tr>
						<th>'.$i++.'</th>
						<th>'.$row[0].'</th>
						<th>'.$row[1].'</th>
					</tr>';
				}
				echo '</tbody>
			</table>';	
			}
			else
				echo false;
		}
		else if(isset($_POST['user'])){
			$user = mysqli_real_escape_string($con, validate($_POST['user']));
			$pass = md5(mysqli_real_escape_string($con, validate($_POST['pass'])));
			$sql = "update user_info set password='$pass' where email='$user'";
			$run = mysqli_query($con, $sql);
			if(mysqli_affected_rows($con)>0){
				echo true;
			}
			else{
				echo false;
			}
		}
		else if(isset($_POST['query_email'])){
			$email = mysqli_real_escape_string($con, validate($_POST['query_email']));
			$subject = mysqli_real_escape_string($con, validate($_POST['query_subject']));
			$query = mysqli_real_escape_string($con, validate($_POST['query']));
			$pass = md5(mysqli_real_escape_string($con, validate($_POST['query_password'])));
			
			$sql = "select mentor_grp from user_info where email like '$email' and password = '$pass'";
			$run = mysqli_query($con, $sql);
			if(mysqli_num_rows($run) > 0){
			
				require_once 'PHPMailer/class.phpmailer.php';
				
				$mail = new PHPMailer(true);  
				
				try {  
					$mail->AddAddress("palvaibhav89@gmail.com","Vaibhav Pal");
					$mail->AddAddress("monu.lakshkar@spsu.ac.in","Monu Lakshkar");
					$mail->From = $email;
					$mail->SetFrom($email);
					$mail->AddCC("subhrendu.neogi@spsu.ac.in");
					$mail->isHTML(true);
$message = "From : $email<br>".$query;
					
					//$mail->AddReplyTo('example@example.com', 'Example');
					$mail->Subject = $subject;
					//$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
					if (isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] == UPLOAD_ERR_OK) {
						$mail->AddAttachment($_FILES['uploaded_file']['tmp_name'],
											 $_FILES['uploaded_file']['name']);
					}
					$mail->MsgHTML($message);
					$mail->Send();
					
					header('location: index.php?err=1');
				} catch (phpmailerException $e) {
					echo $e->errorMessage(); //Pretty error messages from PHPMailer
				} catch (Exception $e) {
					echo $e->getMessage(); //Boring error messages from anything else!
				}
			}else{
				header('location: index.php?err=2');
			}
		}
		else if(isset($_POST['frgt_email'])){
			$email = mysqli_real_escape_string($con, validate($_POST['frgt_email']));
			
			$sql = "select mentor_grp from user_info where email like '$email'";
			$run = mysqli_query($con, $sql);
			if(mysqli_num_rows($run) > 0){
				
				$code = mt_rand(100000, 999999);
				
				$sql = "update user_info set forgot_code = $code, forgot_bit=1 where email = '$email'";
				mysqli_query($con, $sql);
				if(mysqli_affected_rows($con)){
				
					$to = $email;
					$subject = "Mentorship Password Reset Request";

								$message="
<div>
	<div style=\"padding: 5px 0 10px 20px;background-color:#253B80;\">
		<div style=\"float:left;\">
			<img src=\"https://www.spsu.ac.in/images/logos/logoLatest.png\" width=\"80px\" alt=\"logo\" />
		</div>
		<div style=\"float:left;\">
			<p style=\"color:white;font-size:18px;font-family: 'Ariel Narrow';\">Sir Padampat Singhania University<br>Udaipur, Rajasthan<br>Mentorship Programme</p>
		</div>
		<br style=\"clear:both;\" />
	</div>
	<div style=\"padding:5px 0 5px 20px;background-color:#FFCA28;\">
		<p style=\"font-size:20px;font-family: 'Ariel Narrow';\">Hello,</p>	
		<p style=\"font-size:18px;font-family: 'Ariel Narrow';\">We got the request to reset password for Mentorship Portal, Sir Padampat Singhania University.<br>
		If you ignore this mail your password won't be changed<br><br>Thank You</p>
		<a style=\"text-decoration:none;color:black;\" href=\"http://172.16.0.181/mentorship/frgtpwd.php?fcode=$code\">
			<div style=\"width:100px;height:30px;background-color:white;\">
				<center><p style=\"line-height:30px;\">RESET PASSWORD</p></center>
			</div>
		</a>
	</div>
</div>";

					// Always set content-type when sending HTML email
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

					// More headers
					$headers .= 'From: <projecte@spsu.ac.in.com>' . "\r\n";
					//$headers .= 'Cc: myboss@example.com' . "\r\n";

					if(mail($to,$subject,$message,$headers))
					{
						echo "A Password Reset Mail Has Been Sent<br>to Your Mail ID !!!";
					}else{
						echo "Something went wrong please try again later !!!";
					}
				}else{
					echo "Something went wrong please try again later !!!";
				}
			}else{
				echo "Invalid Email ID !!!";
			}
		}
		else if(isset($_POST['editvals'])){
			
			$editvals = $_POST['editvals'];
			
			$update = "UPDATE mastertable SET `name`='$editvals[0]',`semester`='$editvals[2]', `dob`='$editvals[3]', `branch`='$editvals[4]', `gender`='$editvals[5]', `email`='$editvals[6]', `hostel`='$editvals[7]', `father`='$editvals[8]', `mother`='$editvals[9]', `sibling`='$editvals[10]', `workplace`='$editvals[11]', `designation`='$editvals[12]', `mess`='$editvals[13]', `room_no`='$editvals[14]', `roommate`='$editvals[15]', `bestfriend`='$editvals[16]', `student_mob`='$editvals[17]', `father_mob`='$editvals[18]', `address`='$editvals[19]', `city`='$editvals[20]', `medium`='$editvals[21]', `club`='$editvals[22]', `achievements`='$editvals[23]', `language`='$editvals[24]', `hobbies`='$editvals[25]', `pmoney`='$editvals[26]', `subinterest`='$editvals[27]', `hygiene`='$editvals[28]', `cleanliness`='$editvals[29]', `sleep_study`='$editvals[30]', `food`='$editvals[31]', `veg_nonveg`='$editvals[32]', `disease`='$editvals[33]', `medicine`='$editvals[34]', `blood_grp`='$editvals[35]', `spsu_visit`='$editvals[36]', `country_visit`='$editvals[37]', `date_visit`='$editvals[38]', `training_company`='$editvals[39]', `training_dept`='$editvals[40]', `projecte`='$editvals[41]' where enrollment='$editvals[1]'";
			
			$run = mysqli_query($con,$update);
			if(mysqli_affected_rows($con)){
				echo "<center><div class=\"alert alert-success\"><strong>success!</strong>Data Inserted Successfully...</div></center>";
			}
			else{
				echo "<center><div class=\"alert alert-warning\"><strong>Warning!</strong>Data Insertion Failed! Please Contact Admin ...</div></center>";
			}
		}
		else if(isset($_POST['remark'])){
			$sem = mysqli_real_escape_string($con, validate($_POST['remarksem']));
			$cmnt = $_POST['remarkcmnt'];
			session_start();
			$group = $_SESSION['group'];
			
			$fetch = "select enrollment from mastertable where mentor_grp='$group'";
			$do = mysqli_query($con, $fetch);
			while($row = mysqli_fetch_array($do)){
				$sql1 = "insert into concluding_remark (mentor_grp, enrollment, semester) values($group, '$row[0]', $sem)";
				mysqli_query($con, $sql1);
			}
			
			$i = 0;
			foreach($_POST['remark'] as $remark) {
				$cm = $cmnt[$i];
				$exp = explode("&",$remark);
				$update = "update concluding_remark set remark = $exp[1], comment = '$cm' where enrollment = '$exp[0]' and semester = $sem and mentor_grp=$group";
				mysqli_query($con, $update);
				$i++;
			}
			
			echo "<center><div class=\"alert alert-success\"><strong>Success!</strong> Remarks Updated Successfully.</div></center>";
		}
		else if(isset($_POST['crMentor'])){
			
			$sem = mysqli_real_escape_string($con, validate($_POST['crSem']));
			$mentor = mysqli_real_escape_string($con, validate($_POST['crMentor']));
			$desc = mysqli_real_escape_string($con, validate($_POST['crGroup']));
			$grpCount = 1;
			$check = 0;
			$semester = 0;
			
			if($desc == "ALL"){
				$sql = "select user_info.email, user_info.mentor_grp from masterteachettable, user_info where masterteachettable.email = user_info.email and masterteachettable.name='$mentor'";
				$run = mysqli_query($con, $sql);
				$grpCount = mysqli_num_rows($run);
				
				for($i=0;$i<$grpCount;$i++){
					$row = mysqli_fetch_array($run);
					$group[$i] = $row[1];
				}
			}else{
				$sql3 = "SELECT mentor_grp FROM `group_detail` WHERE description ='$desc'";
				$run3 = mysqli_query($con, $sql3);
				$row3 = mysqli_fetch_array($run3);
				$group[0] = $row3[0];
			}
			
			for($i=0;$i<$grpCount;$i++){
					
				if($sem == "latest"){
					$rem_query = "select max(semester) from concluding_remark where mentor_grp = $group[$i]";
					$rem_run = mysqli_query($con, $rem_query);
					$rem_row = mysqli_fetch_array($rem_run);
					
					$semester = $rem_row[0];
				}else{
					$semester = $sem;
				}
				
				$sql5 = "select description from group_detail where mentor_grp = '$group[$i]'";
				$run5 = mysqli_query($con, $sql5);
				$row5 = mysqli_fetch_array($run5);
				
				$sql2 = "select concluding_remark.enrollment, concluding_remark.remark, concluding_remark.comment, mastertable.name from concluding_remark,mastertable where concluding_remark.semester = '$semester' and concluding_remark.mentor_grp = '$group[$i]' and mastertable.enrollment=concluding_remark.enrollment";
				$run2 = mysqli_query($con, $sql2);
				
				if(mysqli_num_rows($run2) > 0){
					$check = 1;
?>
					<thead>
						<tr><th colspan="2"><h4><b>Group: </b><span style="color:red"><?php echo $row5[0]; ?></span></h4></th></tr>
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
					while($row2 = mysqli_fetch_array($run2)){
	?>					 
						<tr>
							<td><?php echo $j++; ?></td>
							<td><?php echo $row2[3]; ?></td>
							<td><?php echo $row2[0]; ?></td>
							<td>
								<?php 
									if($row2[1] == 1) {
										echo '<button class="btn" style="width : 150px !important;color:white;background:#FFD600;">Good</button>';
									}else if($row2[1] == 2) {
										echo '<button class="btn" style="width : 150px !important;color:white;background:#06A306;">Average</button>';
									}else if($row2[1] == 3) {
										echo '<button class="btn" style="width : 150px !important;color:white;background:#095077;">Satisfactory</button>';
									}else if($row2[1] == 4) {
										echo '<button class="btn" style="width : 150px !important;color:white;background:#E53935;">Not so Good</button>';
									}
								?>
							</td>
							<td><?php echo $row2[2]; ?></td>
						</tr>
	<?php
					}
	?>
					</tbody>
<?php
				}
			}
			
			if($check == 0){
				echo "<center><h3 style=\"color:red;\">No Record Found</h3></center>";
			}
		}
		else if(isset($_POST['selectedgrpID'])){
			
			$grpid = mysqli_real_escape_string($con, validate($_POST['selectedgrpID']));
			
			$sql = "select description from group_detail where mentor_grp = $grpid";
			$run = mysqli_query($con, $sql);
			if(mysqli_num_rows($run) > 0){
				$row = mysqli_fetch_array($run);
				
				$sql1 = "select masterteachettable.name, masterteachettable.email from user_info,masterteachettable where user_info.mentor_grp = '$grpid' and user_info.email=masterteachettable.email";
				$run1 = mysqli_query($con, $sql1);
				
				$fetch = "select name,enrollment from mastertable where mentor_grp='$grpid'";
				$do = mysqli_query($con, $fetch);
				
	?>
				<form id="ch_desc_form">
					<div class="row">
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label for="ch_desc">Change Description :</label>
								<input type="text" class="form-control" name="chngedDesc" id="ch_desc" value="<?php echo $row[0]; ?>">
								<input type="hidden" name="chngedDescId" value="<?php echo $grpid; ?>">
							</div>
						</div>
						<div class="col-md-2 col-sm-6" style="margin:auto 0;">
							<button class="btn btn-primary" id="ch_desc_btn">Change</button>
						</div>
					</div>
				</form>
				
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<h2>Mentors</h2>        
						<table class="table table-bordered mentorTable">
							<thead>
								<tr>
									<th>Name</th>
									<th>Remove</th>
								</tr>
							</thead>
							<tbody>
								<?php
									while($row1 = mysqli_fetch_array($run1)){
								?>
										<tr id="<?php echo $row1[1]."tr"; ?>">
											<td><?php echo $row1[0]; ?></td>
											<td><a href="javascript:void(0)"><i class="fa fa-trash rm_mentor" id="<?php echo $row1[1]."*".$grpid; ?>" aria-hidden="true"></i></a></td>
										</tr>
								<?php
									}
								?>
							</tbody>
						</table>
						<form id="mentoraddform">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="form-group mentoradd">
										<label for="add_mentor">Select Mentor * </label>
										<input name="mentor1[]" list="mentor1" id = "add_mentor1" class="form-control add_mentor1" type="text" placeholder="Mentor's Name" >
										<datalist id="mentor1">
											<?php
												$runq3 = mysqli_query($con, "select name, email from masterteachettable");
												while($resq3 = mysqli_fetch_array($runq3)){
											?>
													<option value="<?php echo $resq3[1]; ?>"><?php echo $resq3[0]; ?></option>
											<?php
												}
											?>	
										</datalist>
										<input type="hidden" value="<?php echo $grpid; ?>" name="mentorAddGrpId">
									</div>
									<center><i id="idAddMentor" class="fa fa-plus" style="font-size:25px;cursor:pointer;" aria-hidden="true"></i></center>
								</div>	
							</div>	
							<button class="btn btn-primary" id="add_mntr_btn">Add</button>
						</form>
					</div>
					<div class="col-md-6 col-sm-12">
						<h2>Mentees</h2>        
						<table class="table table-bordered menteeTable">
							<thead>
								<tr>
									<th>Name</th>
									<th>Remove</th>
								</tr>
							</thead>
							<tbody>
								<?php
									while($do_row = mysqli_fetch_array($do)){
								?>
										<tr id="<?php echo $do_row[1]."tr"; ?>">
											<td><?php echo $do_row[0]; ?></td>
											<td><a href="javascript:void(0)"><i class="fa fa-trash rm_mentee" id="<?php echo $do_row[1]."*".$grpid; ?>" aria-hidden="true"></i></a></td>
										</tr>
								<?php
									}
								?>
							</tbody>
						</table>
						<form id="menteeaddform">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="form-group menteeadd">
										<label for="add_mentee1">Select student * </label>
										<input name="mentee1[]" list="mentee1" id = "add_mentee1" class="form-control add_mentee1" type="text" placeholder="Mentee's Name" >
										<datalist id="mentee1">
											<?php
												$runq3 = mysqli_query($con, "select name,enrollment from mastertable");
												while($resq3 = mysqli_fetch_array($runq3)){
											?>
													<option value="<?php echo $resq3[1]; ?>"><?php echo $resq3[0]; ?></option>
											<?php
												}
											?>	
										</datalist>  
										<input type="hidden" value="<?php echo $grpid; ?>" name="menteeAddGrpId">
									</div>
									<center><i id="idAddMentee" class="fa fa-plus" style="font-size:25px;cursor:pointer;" aria-hidden="true"></i></center>
								</div>	
							</div>	
							<button class="btn btn-primary" id="add_mntee_btn">Add</button>
						</form>
					</div>
				</div>
				<script>
					
					$("#ch_desc_form").on('submit',function(e){
						e.preventDefault();
						
						$.ajax({
							url: 'todb.php',
							data: $(this).serialize(),
							type: 'POST',
							success: function(data){
								alert(data);
							}
						});
					});
					var checkVal = 0, checkVal1 = 0;
					$("#mentoraddform").on('submit',function(e){
						e.preventDefault();
						var i = 0;
						$(".add_mentor1").each(function() {
							if($(this).val() === "" && i == 0){
								checkVal = 1;
							}
							i++;
						});
						
						if(checkVal == 0){
							$.ajax({
								url: 'todb.php',
								data: $(this).serialize(),
								type: 'POST',
								success: function(data){
									var myObj = JSON.parse(data);
									var i = 0;
									for(i=0;i<data.length;i++){
										$('.mentorTable > tbody:last-child').append('<tr><td>'+myObj[i].name+'</td><td><a href="javascript:void(0)"><i class="fa fa-trash rm_mentor" id="'+myObj[i].email+'*'+myObj[i].id+'" aria-hidden="true"></i></a></td></tr>');
									}
								}
							});
						}else{
							checkVal = 0;
							alert("No data to add");
						}
					});
					$("#menteeaddform").on('submit',function(e){
						e.preventDefault();
						
						var i = 0;
						$(".add_mentee1").each(function() {
							if($(this).val() === "" && i == 0){
								checkVal1 = 1;
							}
							i++;
						});
						
						if(checkVal1 == 0){
							$.ajax({
								url: 'todb.php',
								data: $(this).serialize(),
								type: 'POST',
								success: function(data){
									var myObj = JSON.parse(data);
									
									var i = 0;
									for(i=0;i<data.length;i++){
										$('.menteeTable > tbody:last-child').append('<tr><td>'+myObj[i].name+'</td><td><a href="javascript:void(0)"><i class="fa fa-trash rm_mentee" id="'+myObj[i].enrol+'*'+myObj[i].id+'" aria-hidden="true"></i></a></td></tr>');
									}
								}
							});
						}else{
							checkVal1 = 0;
							alert("No data to add");
						}
					});
					$("#idAddMentee").click(function(){
						$(".menteeadd").children('input:first').clone().val('').appendTo(".menteeadd");
					});
					$("#idAddMentor").click(function(){
						$(".mentoradd").children('input:first').clone().val('').appendTo(".mentoradd");
					});
					$('.menteeTable').on('click', '.rm_mentee', function() {
						var id = $(this).attr('id');
						var that = this;
						var enrol = id.split("*");
						
						$.ajax({
							url: 'todb.php',
							data: "removeMenteeEnrol="+enrol[0]+"&removeMenteeId="+enrol[1],
							type: 'POST',
							success: function(data){
								if(data){
									alert("Mentee Removed");
									$(that).parent().parent().parent().remove();
								}else{
									alert("Failed");
								}
							}
						});
					});
					$('.mentorTable').on('click', '.rm_mentor', function() {
						var id = $(this).attr('id');
						var that = this;
						var email = id.split("*");
						
						$.ajax({
							url: 'todb.php',
							data: "removeMentorEmail="+email[0]+"&removeMentorId="+email[1],
							type: 'POST',
							success: function(data){
								if(data){
									alert("Mentor Removed");
									$(that).parent().parent().parent().remove();
								}else{
									alert("Failed");
								}
							}
						});
					});
				</script>
	<?php
			}
			else{
				echo "<center><div class=\"alert alert-warning\"><strong>Warning!</strong>Invalid ID</div></center>";
			}
		}
		else if(isset($_POST['chngedDesc'])){
			$desc = mysqli_real_escape_string($con, validate($_POST['chngedDesc']));
			$id = mysqli_real_escape_string($con, validate($_POST['chngedDescId']));
			
			$update = "update group_detail set description = '$desc' where mentor_grp = $id";
			mysqli_query($con, $update);
			
			if(mysqli_affected_rows($con) > 0){
				echo "Description Changed";
			}else{
				echo "Failed";
			}
		}
		else if(isset($_POST['removeMentorEmail'])){
			$email = mysqli_real_escape_string($con, validate($_POST['removeMentorEmail']));
			$id = mysqli_real_escape_string($con, validate($_POST['removeMentorId']));
			
			$delete = "delete from user_info where mentor_grp = $id and email = '$email'";
			mysqli_query($con, $delete);
			
			if(mysqli_affected_rows($con) > 0){
				echo true;
			}else{
				echo false;
			}
		}
		
		else if(isset($_POST['removeMenteeEnrol'])){
			$enrol = mysqli_real_escape_string($con, validate($_POST['removeMenteeEnrol']));
			$id = mysqli_real_escape_string($con, validate($_POST['removeMenteeId']));
			
			$update = "update mastertable set mentor_grp = 0 where enrollment = '$enrol'";
			mysqli_query($con, $update);
			
			if(mysqli_affected_rows($con) > 0){
				echo true;
			}else{
				echo false;
			}
		}
		else if(isset($_POST['mentor1'])){
			$id = mysqli_real_escape_string($con, validate($_POST['mentorAddGrpId']));
			$i = 0;
			
			foreach($_POST['mentor1'] as $mentor) {
				if($mentor != ""){
					$select = "select password from user_info where email = '$mentor'";
					$run = mysqli_query($con, $select);
					if(mysqli_num_rows($run) > 0){
						$row = mysqli_fetch_array($run);
						$pass = $row[0];
					}else{
						$pass = md5('spsu@123');
					}
					
					$insert = "insert into user_info (email, password, mentor_grp) values('$mentor', '$pass', $id)";
					mysqli_query($con, $insert);
					
					if(mysqli_affected_rows($con) > 0){
						$name = "select name from masterteachettable where email = '$mentor'";
						$namer = mysqli_query($con, $name);
						$name_res = mysqli_fetch_array($namer);

						$arr[$i++] = array("name" => $name_res[0],"email" => $mentor,"id" => $id);
					}
				}
			}
			echo json_encode($arr);
		}
		else if(isset($_POST['mentee1'])){
			$id = mysqli_real_escape_string($con, validate($_POST['menteeAddGrpId']));
			$i = 0;
			
			foreach($_POST['mentee1'] as $mentee) {
				if($mentee != ""){
					
					$update = "update mastertable set mentor_grp = $id where enrollment = '$mentee'";
					mysqli_query($con, $update);
					
					if(mysqli_affected_rows($con) > 0){
						$name = "select name from mastertable where enrollment = '$mentee'";
						$namer = mysqli_query($con, $name);
						$name_res = mysqli_fetch_array($namer);

						$arr[$i++] = array("name" => $name_res[0],"enrol" => $mentee,"id" => $id);
					}
				}
			}
			echo json_encode($arr);
		}
		else if(isset($_POST['tweakid'])){
			$tweakid = mysqli_real_escape_string($con, validate($_POST['tweakid']));
			$tweakaction = mysqli_real_escape_string($con, validate($_POST['tweakaction']));
			$bit = 0;
			if($tweakaction == "en")
				$bit = 1;
			
			$update = "update bittable set bit=$bit where id = '$tweakid'";
			mysqli_query($con, $update);
			
			if(mysqli_affected_rows($con) > 0){
				echo true;
			}else{
				echo false;
			}
		}
		else if(file_exists(@$_FILES['timetableUpload']['tmp_name']) || is_uploaded_file(@$_FILES['timetableUpload']['tmp_name'])){

			$path = "assets/documents/time-table.pdf";
			unlink($path);
		
			$target_dir = "assets/documents/";
			$target_file = $target_dir . basename($_FILES["timetableUpload"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

			if ($_FILES["timetableUpload"]["size"] < 5000000) {
				
				if($imageFileType == "pdf" || $imageFileType == "doc" || $imageFileType == "docx" ) {
					$file_name = "time-table.pdf";
					if (move_uploaded_file($_FILES["timetableUpload"]["tmp_name"], $target_dir.$file_name)) {
						
						header('location: admin_tweaks.php?err=1');
					} else {
						header('location: admin_tweaks.php?err=2');
					}
				}else{
					header('location: admin_tweaks.php?err=3');
				}
			}else{
				header('location: admin_tweaks.php?err=4');
			}
		}
	}
	else{
		echo "Connection Not Established !!!";
	}
	
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	//$myArray = array_map(function($e) use($con) { return mysqli_escape_string($con, validate($e)); }, $secure);
?>