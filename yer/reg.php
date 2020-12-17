<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Registration</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
	<link rel="stylesheet" href="css/reg.css?v=<?php echo time(); ?>">
</head>
<body>
	<!-- Signup form -->
	<div class="container">
		
		<form>
			<div class="pre-back"><a href="index.php" class="back">< Back</a></div>
			<h1>Sign up</h1>
			<div class="reg-status">
				<p id="reg-status"></p>
			</div>
			<div class="input">
				<input type="text" name="username" placeholder="Username" id="username" autocomplete="off">
			</div>
			<div class="input">
				<input type="text" name="first_name" placeholder="First name" id="first_name" autocomplete="off">
			</div>
			<div class="input">
				<input type="text" name="last_name" placeholder="Last name" id="last_name" autocomplete="off">
			</div>
			<div class="input">
				<input type="text" name="url" placeholder="Image URL" id="url" autocomplete="off">
			</div>
			<div class="input">
				<input type="email" name="email" placeholder="Email" id="email" autocomplete="off">
			</div>
			<div class="input">
				<input type="text" name="pass" placeholder="Password" id="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title= "The password must contain at least one digit and one uppercase and lowercase letter, as well as at least 8 or more characters" autocomplete="off">
			</div>
			<div class="input">
				<input type="text" name="pass1" placeholder="Repeat password" id="r_pass" autocomplete="off">
			</div>
			<button type="submit" name="submit" class="submit">Submit</button>
		</form>

	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
	<script>
		$(document).ready(function() {
			$(".submit").click(function(){
	            event.preventDefault();
	            var username = $('#username').val();
	            var first_name = $('#first_name').val();
	            var last_name = $('#last_name').val();
	            var url = $('#url').val();
	            var email = $('#email').val();
	            var pass = $('#pass').val();
	            var r_pass = $('#r_pass').val();
	            $.post('registration.php', { username : username, first_name : first_name, last_name : last_name, url : url, email : email, pass : pass, r_pass : r_pass }, 
	            	function(data, status){
	            	$('.reg-status').fadeIn(300);

	            	var dat = JSON.parse(data);
	            	if(dat[0]!="success"){
	            		var str = "";
		            	for(var i = 0; i<dat.length; i++){
		            		str += dat[i] + "<br>";
		            	}
		            	$('#reg-status').html(str).css('color', 'red');
	            	}
	            	else{
	            		window.location.href = "login.php";
	            	}
	            });
	        });
	    });

	    $("#username").bind('input', function () {
                var username = $('#username').val();
                if(username != '') {
                    $.ajax({
                        type: "POST",
                        url: "checker.php",
                        data: { username : username },
                        accepts: 'application/json; charset=utf-8',
                        success: function (data) {
                        	data = JSON.parse(data);
                            for (var key in data)
                            {
                                if(data.message == 'available'){
                                	$('.reg-status').fadeIn(300);
	                                $('#reg-status').text("Username is available").css('color', 'green');
                                }
                                if(data.message == 'not-available'){
                                	$('.reg-status').fadeIn(500);
	                                $('#reg-status').text("Username is not available").css('color', 'red');
                                }
                            }
                        },
                        error: function (httpRequest, status, error) {
                            $('#reg-status').text('Error: ' + error + ', ' + httpRequest.status).css('color', 'red');
                        }
                    });
                }
                if(username.length == 0){
                    $('.reg-status').fadeOut(300);
                }
            });
	</script>
</body>
</html>