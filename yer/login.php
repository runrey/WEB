<!DOCTYPE html>
<html lang="en"> 
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
	<link rel="stylesheet" href="css/reg.css?v=<?php echo time(); ?>">
</head> 
<body>
	<!-- Login form -->
	<div class="container">

		<form method="POST" action="login.php">
			<div class="pre-back"><a href="index.php" class="back">< Back</a></div>
			<h1>Login</h1>
			<div class="reg-status">
				<p id="reg-status"></p>
			</div>
			<div class="input">
				<input type="text" name="username" id="username" placeholder="Enter your username" required>
			</div>
			<div class="input">
				<input type="password" name="password" id="password" placeholder="Enter your password" required>
			</div>
			<button type="submit" name="submit" class="submit">Login</button>
		</form>	
		
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
	<script>
		$(document).ready(function() {
			$(".submit").click(function(){
	            event.preventDefault();
	            var username = $('#username').val();
	            var password = $('#password').val();
	            $.post('log.php', { username : username, password : password }, 
	            	function(data, status){
	            	$('.reg-status').fadeIn(300);

	            	var dat = JSON.parse(data);
	            	if(dat[0]!="good"){
	            		var str = "";
		            	for(var i = 0; i<dat.length; i++){
		            		str += dat[i] + "<br>";
		            	}
		            	$('#reg-status').html(str).css('color', 'red');
	            	}
	            	else{
	            		window.location.href = "index.php";
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
	                                $('#reg-status').text("No such username found!").css('color', 'red');
                                }
                                if(data.message == 'not-available'){
                                	$('.reg-status').fadeIn(500);
	                                $('#reg-status').text("Username is exist").css('color', 'green');
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
