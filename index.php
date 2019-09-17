<?php
$message="";
if(count($_POST)>0) {
	$data = json_decode(file_get_contents("data.json"));
	$success = false;
	foreach($data as $user){
		if($user->userName == $_POST["userName"] && $user->password == $_POST["password"] ){
			session_start();
			$_SESSION['login_user'] = $user->displayName;
			header("Location: success.php");
		}
	}
	$message = "Invalid username or password!";
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="css/material-components-web.min.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #F9F9F9;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form name="frmUser" method="post" action="" class="login100-form validate-form">
					<span class="login100-form-title p-b-43" id="legend">
						TEAM SYNTAX
					</span>
					<span class="login100-form-title p-b-43">
					You don't have account? <a href="signup.php">Sign Up</a>
					</span>

					<div class="message"><?php if($message!="") { echo $message; } ?></div>
					<div class="mdc-text-field mdc-text-field--outlined">
						<input class="mdc-text-field__input" type="text" id="userName" name="userName">
						<div class="mdc-notched-outline">
							<div class="mdc-notched-outline__leading"></div>
							<div class="mdc-notched-outline__notch">
							<label for="userName" class="mdc-floating-label">Username</label>
							</div>
							<div class="mdc-notched-outline__trailing"></div>
						</div>
					</div>

					<div class="mdc-text-field mdc-text-field--outlined">
						<input class="mdc-text-field__input" type="password" id="password" name="password">
						<div class="mdc-notched-outline">
							<div class="mdc-notched-outline__leading"></div>
							<div class="mdc-notched-outline__notch">
							<label for="password" class="mdc-floating-label">Password</label>
							</div>
							<div class="mdc-notched-outline__trailing"></div>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button name="submit" class="login100-form-btn">
							Login
						</button>
					</div>
					
				</form>

				<div class="login100-more" style="background-image: url('https://res.cloudinary.com/yutee/image/upload/v1568615313/bg-02_m3ljzz.jpg');">
				</div>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="js/material-components-web.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
