$(document).ready(function(){
	/*document.onkeydown = function(e){
        if (e.ctrlKey || e.ctrlKey &&
            (e.keyCode === 67 ||
                e.keyCode === 86 ||
                e.keyCode === 85 ||
                e.keyCode === 117)) {		
            return false;
        } else {
            return true;
        }
    };*/
	startTime();
	setTimeout(openit, 2100);
	
	function openit(){
		$("#dialog-box").slideDown(300);
	}
	
	setTimeout(dropit, 1000);
	
	function dropit(){
		$("#frgtImg").show(1000);
	}
	
	$(".closeit").click(function(){
		$(this).closest("div").slideUp(300);
	});
	$('#query_form').on('submit', function(e){
		
		$("#result").html("Sending Your Query. Please Wait !!!");
	});
	$("#query").click(function(){
		$('#query-box').slideDown(200);
	});
	$("#frgtPwd").click(function(){
		$('#frgt-box').slideDown(200);
	});
	function startTime() {
		var today = new Date();
		var h = today.getHours();
		var m = today.getMinutes();
		var s = today.getSeconds();
		m = checkTime(m);
		s = checkTime(s);
		//document.getElementById('txt').innerHTML = "Time : " + h + ":" + m + ":" + s;
		var t = setTimeout(startTime, 500);
	}
	function checkTime(i) {
		if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
		return i;
	}
	
	$(".close").hide();
	$(".form-holder").css("height","200px");
	$("#open").on('input',function(){
		var user = $('#open').val();
		$.ajax({
			url: 'todb.php',
			data: "username="+user,
			type: 'POST',
			success: function(data){
				//alert(data);
				if(data == true){
					$(".close").show();
					$(".form-holder").css("height","43%");
					$("#error").html("Hello, enter password to access portal");
				}
				else{		
					$(".clear").val("");
					$(".close").hide();
					$("#error").html("User does not Exist...");
					$(".form-holder").css("height","200px");
					if($("#open").val()==""){
						$(".close").hide();
						$("#error").html("");
					}
				}
			}
		});	
	});
	
	 $('#login_form').on('submit', function(e){
        e.preventDefault();
        
		$.ajax({
			url: 'todb.php',
			data: $(this).serialize(),
			type: 'POST',
			success: function(data){
				if(data == true){
					window.location = 'redirect.php';
				}
				else if(data == false){
					$("#error").html("Wrong Password...");
				}
			}
		});	
    });
	
	$('#enrol_form').on('submit', function(e){
        e.preventDefault();
		
		$.ajax({
			url: 'todb.php',
			data: $(this).serialize(),
			type: 'POST',
			success: function(data){
				if(data == false){
					$('#errormsg').show(200).html("<center><div class=\"alert alert-warning\"><strong>Warning!</strong> No record Found !!!</div></center>").delay(1000).hide(200);
					
				}else{
					$('#showtable').hide('fast', function(){
						$('#showtable').css({"width":"100%","margin":"0 auto"}).fadeIn('fast').html(data);
					});
				}
			}
		});	
    });
     $('#add_row').click(function(){
		$('#showtable').css({"width":"70%","margin":"0 auto"}).load("feedback.php");
	});
	
	$("#minutes_form").on('submit',function(e){
		e.preventDefault();
		
		var val1 = $("#val1").val();
		var val2 = $("#val2").val();
		var val3 = $("#val3").val();
		if(val1!=""||val2!=""||val3!=""){
			$.ajax({
				url: 'todb.php',
				data: $(this).serialize(),
				type: 'POST',
				success: function(data){
					$("#minutes_form")[0].reset();
					$("#msg").html(data).fadeIn(100).delay(3500).fadeOut(100);
				}
			});
		}
		else{
			$("#msg").html("<center><div class=\"alert alert-danger\"><strong>Error!</strong> You can't Submit Minutes without any data...</div></center>").fadeIn(100).delay(3500).fadeOut(100);	
		}
	});
	$("#frgt_form").on('submit',function(e){
		e.preventDefault();
		$("#resultfrgt").html("Processing please wait !!!");
		var email = $("#frgt_email1").val();
		$("#frgt_form")[0].reset();
		
		$.ajax({
			url: 'todb.php',
			data: "frgt_email="+email,
			type: 'POST',
			success: function(data){
				$("#resultfrgt").html(data);
			}
		});
	});
	$("#frgt_pwd_form").on('submit',function(e){
		e.preventDefault();
		
		var url = window.location.href;
		window.history.go(-window.history.length);

		var pwd1 = $("#pwd1").val();
		var pwd2 = $("#pwd2").val();
		
		if(pwd1 == pwd2){
		
			$.ajax({
				url: 'todb.php',
				data: $(this).serialize(),
				type: 'POST',
				success: function(data){
					
					$('#div1').hide();
					$('#div2').show();
					$("#afterResults").html(data);
				}
			});
		}else{
			$("#result").html("Passwords does not match !!!");
		}
	});
	$('.grp').click(function(){
		var group = $(this).attr("id");
		$.ajax({
			url: 'todb.php',
			data: {setGroup:group},
			type: 'POST',
			success: function(data){
				if(data==true){
					window.location = 'home.php';
				}else{
					window.location = 'mentorship-admin.php';
				}
			}
		});
	});
});