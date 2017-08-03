<!DOCTYPE html>
<?php
	if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		
		$connection = mysqli_connect('localhost', 'root', '', 'test_db');
		
		$query = "INSERT INTO `tz_members` (`username`, `password`, `email`) VALUES ('$username}', '$password', '$email')";
		
		$result = mysql_query($query);
		echo "success";
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>
	</title>
	<link rel = "stylesheet" href="/PHPPlayground/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

<script type="text/javascript">
	$(document).ready(function(){
		registerBtn.onclick = function(){
			var username = document.getElementById("userNameTxt").value;
			var email = document.getElementById("emailTxt").value;
			var password = document.getElementById("passWordTxt").value;
			var secondPass = document.getElementById("rePassWordTxt").value;
			
			if(password != secondPass){
				alert("Passwords do not match.");
				exit();
			}
			
			$.post("Login.php", {username: username, password: password, email: email})
					.done(function(data){
						if(data == "success"){
							window.location = "Login.php";
						}
						else{
							document.getElementById("errorTxt").style.display = "block";
						}
					});
		}
	});
</script>

<div>
	<div style="text-align: center; margin-top: 250px;">
	<p style="color: red; margin-left: 55px; display: none;" id="errorTxt">User is already registered.</p>
	<p>Enter Username: 
		<input type="text" id="userNameTxt"/>
	</p>
	<p style="margin-left: -30px">Enter Email Address: 
		<input type="password" id="emailTxt"/>
	</p>
	<p style="margin-left: 4px">Enter Password: 
		<input type="password" id="passWordTxt"/>
	</p>
	<p style="margin-left: -20px">Re-Enter Password: 
		<input type="password" id="rePassWordTxt"/>
	</p>
	<button style="margin-left: 60px;" id="registerBtn">Register</button>
</div>
</div>
</body>