<?php
	include '../conn.php';
	
	if($con){
		if(isset($_POST['name'])){
			$name = mysqli_real_escape_string($con, validate($_POST['name']));
			$semester = mysqli_real_escape_string($con, validate($_POST['semester']));
			$dob = mysqli_real_escape_string($con, validate($_POST['dob']));
			$gender = mysqli_real_escape_string($con, validate($_POST['gender']));
			$hostel = mysqli_real_escape_string($con, validate($_POST['hostel']));
			$mother = mysqli_real_escape_string($con, validate($_POST['mname']));
			$father = mysqli_real_escape_string($con, validate($_POST['fname']));
			$workplace = mysqli_real_escape_string($con, validate($_POST['fworkplace']));
			$mess = mysqli_real_escape_string($con, validate($_POST['mess']));
			$enroll = mysqli_real_escape_string($con, validate($_POST['enrollno']));
			$course = mysqli_real_escape_string($con, validate($_POST['course']));
			$branch = mysqli_real_escape_string($con, validate($_POST['branch']));
			$email = mysqli_real_escape_string($con, validate($_POST['email']));
			$sibling = mysqli_real_escape_string($con, validate($_POST['sibling']));
			$designation = mysqli_real_escape_string($con, validate($_POST['fdesignation']));
			$room = mysqli_real_escape_string($con, validate($_POST['roomno']));
			$friend = mysqli_real_escape_string($con, validate($_POST['bestfriend']));
			$fmob = mysqli_real_escape_string($con, validate($_POST['fmobno']));
			$city = mysqli_real_escape_string($con, validate($_POST['city']));
			$club = mysqli_real_escape_string($con, validate($_POST['club']));
			$achvmnt = mysqli_real_escape_string($con, validate($_POST['achievements']));
			$hobby = mysqli_real_escape_string($con, validate($_POST['hobbies']));
			$interest = mysqli_real_escape_string($con, validate($_POST['sinterest']));
			$clean = mysqli_real_escape_string($con, validate($_POST['cleanliness']));
			$mob = mysqli_real_escape_string($con, validate($_POST['mobno']));
			$address = mysqli_real_escape_string($con, validate($_POST['address']));
			$med = mysqli_real_escape_string($con, validate($_POST['medium']));
			$activity = mysqli_real_escape_string($con, validate($_POST['activity']));
			$language = mysqli_real_escape_string($con, validate($_POST['languages']));
			$money = mysqli_real_escape_string($con, validate($_POST['pmoney']));
			$hygiene = mysqli_real_escape_string($con, validate($_POST['hygiene']));
			$time = mysqli_real_escape_string($con, validate($_POST['sstime']));
			$food = mysqli_real_escape_string($con, validate($_POST['food']));
			$disease = mysqli_real_escape_string($con, validate($_POST['disease']));
			$bgroup = mysqli_real_escape_string($con, validate($_POST['bloodgroup']));
			$cvisit = mysqli_real_escape_string($con, validate($_POST['cvisit']));
			$training = mysqli_real_escape_string($con, validate($_POST['trainingcompany']));
			$project = mysqli_real_escape_string($con, validate($_POST['projectendeavour']));
			$veg = mysqli_real_escape_string($con, validate($_POST['vnveg']));
			$med = mysqli_real_escape_string($con, validate($_POST['medicine']));
			$svisit = mysqli_real_escape_string($con, validate($_POST['svisit']));
			$dvisit = mysqli_real_escape_string($con, validate($_POST['dvisit']));
			$depart = mysqli_real_escape_string($con, validate($_POST['trainingdepartment']));
			$roommate = mysqli_real_escape_string($con, validate($_POST['roommate']));
			//die($name.'-'.$time.'-'.$club);
			$update = "UPDATE mastertable SET `name`='$name',`semester`='$semester', `course`='$course', `dob`='$dob', `branch`='$branch', `gender`='$gender', `email`='$email', `hostel`='$hostel', `father`='$father', `mother`='$mother', `sibling`='$sibling', `workplace`='$workplace', `designation`='$designation', `mess`='$mess', `room_no`='$room', `roommate`='$roommate', `bestfriend`='$friend', `student_mob`='$mob', `father_mob`='$fmob', `address`='$address', `city`='$city', `medium`='$med', `club`='$club', `activity`='$activity', `achievements`='$achvmnt', `language`='$language', `hobbies`='$hobby', `pmoney`='$money', `subinterest`='$interest', `hygiene`='$hygiene', `cleanliness`='$clean', `sleep_study`='$time', `food`='$food', `veg_nonveg`='$veg', `disease`='$disease', `medicine`='$med', `blood_grp`='$bgroup', `spsu_visit`='$svisit', `country_visit`='$cvisit', `date_visit`='$dvisit', `training_company`='$training', `training_dept`='$depart', `projecte`='$project' where enrollment='$enroll'";
			
			$run = mysqli_query($con,$update);
			if(mysqli_affected_rows($con)){
				echo "<center><div class=\"alert alert-success\"><strong>success!</strong>Data Inserted Successfully...</div></center>";
			}
			else{
				echo "<center><div class=\"alert alert-warning\"><strong>Warning!</strong>Data Insertion Failed! Please Contact Admin ...</div></center>";
			}
		}
		else if(isset($_POST['check_enrol']))
		{
			$enroll = $_POST['check_enrol'];
			$sql = "select enrollment from mastertable where enrollment = '$enroll'";
			$run_query = mysqli_query($con, $sql);
			if(mysqli_num_rows($run_query) > 0){
				echo false;
			}
			else
			{
				echo true;
			}
		}
	}
	else{
		echo "Error 503 : Connection Not Established...";
	}
	
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>