<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css"/>

<title>Mentorship Student details form</title>
<style>
span
{
	float:left;
}
body {background: black;}
canvas {
	position: fixed;margin-top:-3%;
}
.logo-nav{
	background-color: #27AE60;
	padding: 1% 2% 1% 2%;
	box-sizing: border-box;
	box-shadow:inset 1px 1px 20px 4px #000;
	border-radius: 8px;
}
</style>
</head>

<body>
<canvas id="c"></canvas>
<!-- multistep form -->
<form id="msform" method="post" style="width:80%";>
<div class="logo-nav row hidden-xs" id="top" style="margin:0px;">
		<div class="col-md-1 col-sm-1 col-md-push-3 col-sm-push-3">
			<img class="img-logo" style="line-height:100px;margin-top:20%;" src="images/logoLatest.png" width="156%" alt="">
		</div>
		<div class="col-md-4 col-sm-4 col-md-push-3 col-sm-push-3" style="margin-left:0px;">
			<center><h3 class="titleSize" style="color:white;">Sir Padampat Singhania University<br>Udaipur, Rajasthan</h3></center>
		</div>
		<div class="pull-right" style="padding-right:40px;">
			<div class="col-md-10 col-sm-10"><br>
				<h4 style="color:white;display:inline;">Founded by<br>J K Cement <br> Ltd.</h4>
			</div>
			<div class="col-md-1 col-sm-1">
				<img src="images/jk.png"  alt="">
			</div>
		</div>
	</div>
<h1 style="margin-top:2%; color:#fff;" align="center">Mentorship Form</h1>
<br>
<!-- progressbar -->
<ul id="progressbar">
<li class="active">Step I</li>
<li>Step II</li>
<li>Final Step</li>
</ul>


<fieldset style="margin-bottom:50px;">
<h5 style="color:red;text-align:left;">Note: All Fields are Mandatory </h5>
<br>
<div class="row">
	<div class="col-md-6">
		<span>Name</span>
		<input type="text" name="name" placeholder="Name " required>
		
		<span>Semester</span>
		<div>
			<select name="semester" required>
				<option>Select Semester</option>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
			</select>
		</div>
		
		<span>Date of Birth</span>
		<input class="date" id="date" name="dob" type="date" data-date="" data-date-format="YYYY-MM-DD" value="yyyy-mm-dd"onfocus="this.value = '';" required>
		
		<span>Gender</span>
		<div>
			<select id="gender" name="gender" required>
				<option>Select Gender</option>
				<option>Male</option>
				<option>Female</option>
				<option>Other</option>
			</select>
		</div>
		
		<span>Hostel</span>
		<select name="hostel" required>
			<option>Select Hostel</option>
			<option>BH1</option>
			<option>BH2</option>
			<option>BH3</option>
			<option>BH4</option>
			<option>BH5</option>
			<option>GH1</option>
			<option>GH2</option>
			<option>GH3</option>
			<option>NA</option>
		</select>
			
		<span>Father's Name</span>
		<input type="text" name="fname" placeholder="Father's Name " required>
		
		<span>Sibling(s) (If Any)</span>
		<input type="text" name="sibling" placeholder="Sibling " required>
				
		<span>Parent's Designation</span>
		<input type="text" name="fdesignation" placeholder="Father's Designamtion " required>
	</div>
	
	<div class="col-md-6">
		<span>Enrollment No.</span>
		<input type="text" name="enrollno" placeholder="Enrollment No. " required />
		
		<span>Programme</span>
		<input type="text" name="course" placeholder="Course (eg. B.tech, BBA, etc)" required>
		
		<span>Branch</span>
		<select name="branch" required>
			<option>Select Branch</option>
			<option>Computer Science and Engineering</option>
			<option>Mechanical Engineering</option>
			<option>Civil Engineering</option>
			<option>Electronics & Communication Engineering</option>
			<option>Electrical Engineering</option>
			<option>CSE IOT</option>
			<option>CSE Cloud Technology</option>
			<option>Biotechnology</option>
			<option>Rail Transportation Engineering</option>
			<option>Mining Engineering</option>
			<option>BBA</option>
			<option>BHM</option>
			<option>BCOM(H)</option>
			<option>MBA</option>
			<option>Integrated BBA-MBA</option>
			<option>NA</option>
		</select>
		
		<span>Email (Personal)</span>
		<input type="email" name="email" placeholder="E-mail" required>
		
		<span>Mess</span>
		<select name="mess" required>
			<option>Select Mess</option>
			<option>Mess-I</option>
			<option>Mess-II</option>
			<option>NA</option>
		</select>
		
		<span>Mother's Name</span>
		<input type="text" name="mname" placeholder="Mother's Name " required>
		
		<span>Parent's Workplace</span>
		<input type="text" name="fworkplace" placeholder="Parent's Workplace " required>
		
		<span>Parent's Mobile No.</span>
		<input type="tel" name="fmobno" placeholder="Parent's Mobile No. " required>
	</div>
</div>
	<input type="button" name="next" class="next action-button" value="Next" >
	<div class="footer">
	
		<h4>&copy; SPSU | Developed by<br><a style="color: #27AE60; font-weight:bold;">Suraj Pal, Vaibhav Pal & Monu Lakshkar</a></h4>
	</div>
</fieldset>


<fieldset style="margin-bottom:50px;">
<h5 style="color:red;text-align:left;">Note: All Fields are Mandatory </h5>
<br>
<div class="row">
	<div class="col-md-6">
		<span>Room No.</span>
		<input type="text" name="roomno" placeholder="Room No. " required>
		
		<span>Roommate</span>
		<input type="text" name="roommate" placeholder="Roommate and his/her mobile no." required>
	
		<span>Best Friend</span>
		<input type="text" name="bestfriend" placeholder="Best Friend with Mobile no." required>
		
		<span>City</span>
		<input type="text" name="city" placeholder="City " required>
		
		<span>Member of Club(s)</span>
		<input type="text" name="club" placeholder="Member of Club (If any, write name)" required>
		
		<span>Achievement(s)</span>
		<input type="text" name="achievements" placeholder="Achievement in any activity at National/State level" required>
		
		<span>Hobbies</span>
		<input type="text" name="hobbies" placeholder="Hobbies" required>
		
		<span>Subject of Interest</span>
		<input type="text" name="sinterest" placeholder="Subject of Interest " required>
		
	</div>
	
	<div class="col-md-6">
		
		<span>Mobile No.</span>
		<input type="tel" name="mobno" placeholder="Mobile No. " required>
	
		<span>Cleanliness</span>
		<input type="text" name="cleanliness" placeholder="Cleanliness of Hostel room" required>
		
		<span>Address</span>
		<input type="text" name="address" placeholder="Address " required>
		
		<span>Medium of School</span>
		<input type="text" name="medium" placeholder="Medium of School " required>
		
		<span>Activity</span>
		<input type="text" name="activity" placeholder="Participation in extra-curricular Activity" required>
		
		<span>Language(s)</span>
		<input type="text" name="languages" placeholder="Languages Known" required>
		
		<span>Pocket Money</span>
		<input type="text" name="pmoney" placeholder="Pocket Money (Per Month)" required>
		
		<span>Hygiene</span>
		<input type="text" name="hygiene" placeholder="Hygiene " required>
		
	</div>
</div>
	<input type="button" name="previous" class="previous action-button" value="Previous" />
	<input type="button" name="next" class="next action-button" value="Next" />
	<div class="footer">
		<h4>&copy; SPSU | Developed by<br><a style="color: #27AE60; font-weight:bold;">Suraj Pal, Vaibhav Pal & Monu Lakshkar</a></h4>
	</div>
</fieldset>


<fieldset style="margin-bottom:50px;">
<h5 style="color:red;text-align:left;">Note: All Fields are Mandatory </h5>
<br>
<div class="row">
	<div class="col-md-6">
		<span>Food Habits</span>
		<input type="text" name="food" placeholder="Food Habits" required>
		
		<span>Disease</span>
		<input type="text" name="disease" placeholder="Disease (If Any)">
		
		<span>Blood Group</span>
		<input type="text" name="bloodgroup" placeholder="Blood Group " required>
		
		<span>Name and place of the country visited</span>
		<input type="text" name="cvisit" placeholder="Name and place of the country visited" required>
		
		<span>Date of Visit</span>
		<input class="date" id="date" name="dvisit" type="date" data-date="" data-date-format="YYYY-MM-DD" value="yyyy-mm-dd"onfocus="this.value = '';" >
		
		<span>Training Company:</span>
		<input type="text" name="trainingcompany" placeholder="Name of Training Company " required>
	</div>
	
	<div class="col-md-6">
		<span>Vegetarian/Non Vegetarian</span>
		<input type="text" name="vnveg" placeholder="Vegetarian/Non Vegetarian" required>
		
		<span>Medicine</span>
		<input type="text" name="medicine" placeholder="Medicine(s) to be taken regularly (if any)" required>
		
		<span>Sleep & Study Time</span>
		<input type="text" name="sstime" placeholder="Sleep and Study Hours in a day" required>
		
		<span>Country visit organised by</span>
		<input type="text" name="svisit" placeholder="SPSU or personal" required>
		
		<span>Project Endeavour</span>
		<input type="text" name="projectendeavour" placeholder="Project Endeavour " required>
		
		<span>Training Department</span>
		<input type="text" name="trainingdepartment" placeholder="Training Department " required>
	</div>
</div>
	<div id="error"></div>
	<input type="button" name="previous" class="previous action-button" value="Previous" />
	<input type="submit" name="submit" class="submit action-button" value="submit" />
	<div class="footer">
		<h4>&copy; SPSU | Developed by<br><a style="color: #27AE60; font-weight:bold;">Suraj Pal, Vaibhav Pal & Monu Lakshkar</a></h4>
	</div>
</fieldset>
</form>

<!-- jQuery --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- jQuery easing plugin --> 
<script src="js/jquery.easing.min.js" type="text/javascript"></script> 

<script>

$('input[name=enrollno]').change(function(){
	
	var enrol = $('input[name=enrollno]').val();
	$.ajax({
		url: "todb.php",
		type: "POST",
		data: "check_enrol="+enrol,
		success: function(data){
			
			if(data == true){
				$('input[name=enrollno]').css('border','2px solid red');
				$(":input:not(input[name=enrollno])").attr('disabled',true);
				alert("Enrollment does not exist. Please contact admin");
			}
			else{
				$('input[name=enrollno]').css('border','1px solid #CCCCCC');
				$(":input:not(input[name=enrollno])").attr('disabled',false);
			}
		}
	});
});

var c = document.getElementById("c");
var ctx = c.getContext("2d");

//making the canvas full screen
c.height = window.innerHeight;
c.width = window.innerWidth;

//chinese characters - taken from the unicode charset
var chinese = "田由甲申甴电甶男甸甹町画甼甽甾甿畀畁畂畃畄畅畆畇畈畉畊畋界畍畎畏畐畑";
//var chinese = "#include<stdio.h>int main(){printf(\"Hello SPSU\")}";
//converting the string into an array of single characters
chinese = chinese.split("");

var font_size = 13;
var columns = c.width/font_size; //number of columns for the rain
//an array of drops - one per column
var drops = [];
//x below is the x coordinate
//1 = y co-ordinate of the drop(same for every drop initially)
for(var x = 0; x < columns; x++)
	drops[x] = 1; 

//drawing the characters
function draw()
{
	//Black BG for the canvas
	//translucent BG to show trail
	ctx.fillStyle = "rgba(0, 0, 0, 0.05)";
	ctx.fillRect(0, 0, c.width, c.height);
	
	ctx.fillStyle = "#0F0"; //green text
	ctx.font = font_size + "px arial";
	//looping over drops
	for(var i = 0; i < drops.length; i++)
	{
		//a random chinese character to print
		var text = chinese[Math.floor(Math.random()*chinese.length)];
		//x = i*font_size, y = value of drops[i]*font_size
		ctx.fillText(text, i*font_size, drops[i]*font_size);
		
		//sending the drop back to the top randomly after it has crossed the screen
		//adding a randomness to the reset to make the drops scattered on the Y axis
		if(drops[i]*font_size > c.height && Math.random() > 0.975)
			drops[i] = 0;
		
		//incrementing Y coordinate
		drops[i]++;
	}
}

setInterval(draw, 33);

$(function() {
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$("#msform").submit(function(e){
	e.preventDefault();
	$.ajax({
		url: "todb.php",
		type: "POST",
		data: $(this).serialize(),
		success: function(data){
			$("#msform")[0].reset();
			$("#error").html(data).fadeIn(100).delay(3000).fadeOut(100);
		}
	});
})

});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>