<!DOCTYPE html>

<?php
	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$connection = mysqli_connect('localhost', 'root', '', 'test_db');
		
		$data = mysqli_query($connection, "SELECT * FROM 'tz_members' WHERE 'username' = '$username' AND
			'password' = '$password'");
			
		$row_cnt = mysqli_num_rows($data);
		$id = $row['id'];
		session_start();
		$_Session['user_id'] = $id;
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
	$(document).ready(function() {
		loginBtn.onclick = function() {
			var username = document.getElementById("userNameTxt").value;
			var password = document.getElementById("passWordTxt").value;
			
			if(username == "" || password == ""){
				alert("Username or password is empty.");
			}
			else{
				$.post("Login.php", {username: username, password: password})
					.done(function(data){
						if(data == "success"){
							window.location = "SearchClone.php";
						}
						else{
							document.getElementById("errorTxt").style.display = "block";
						}
					});
			}
		}
	});
</script>

<div style="text-align: right;">
	<a href="/PHPPlayground/Register.php">Register</a>
</div>
<div style="text-align: center; margin-top: 250px;">
	<p style="color: red; margin-left: 55px; display: none;" id="errorTxt">Invalid username or password.</p>
	<p>Username: 
		<input type="text" id="userNameTxt"/>
	</p>
	<p style="margin-left: 4px">Password: 
		<input type="password" id="passWordTxt"/>
	</p>
	<button style="margin-left: 60px;" id="loginBtn">Log In</button>
</div>
</body>
</html>