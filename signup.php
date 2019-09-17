<?php
$message="";
if(count($_POST)>0) {
	$data = json_decode(file_get_contents("data.json"));
	
	$userName = $_POST["userName"];
	$displayName = $_POST["displayName"];
	$password = $_POST["password"];
	$confirmPassword = $_POST["confirmPassword"];
	
	if(in_array($userName ,array_column($data, 'userName'))){
		$message = "please choose an other username";
	}else if (empty($userName) || empty($displayName)  || empty($password)  || empty($confirmPassword)){
		$message = "please fill all the fields";
	}else{
		if($_POST["password"] === $_POST["confirmPassword"]){
			array_push($data, [
				"userName" => $userName,
				"password" => $password,
				"displayName" => $displayName
			]);

			file_put_contents('data.json', json_encode($data));
			session_start();
			$_SESSION['login_user'] = $displayName;
			header("Location: success.php");
		}else{
			$message = "password doesn't match";
		}
	}
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign up </title>
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
					Are you a member? <a href="index.php">Login</a>
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
						<input class="mdc-text-field__input" type="text" id="displayName" name="displayName">
						<div class="mdc-notched-outline">
							<div class="mdc-notched-outline__leading"></div>
							<div class="mdc-notched-outline__notch">
							<label for="displayName" class="mdc-floating-label">displayName</label>
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
                    
                    <div class="mdc-text-field mdc-text-field--outlined">
						<input class="mdc-text-field__input" type="password" id="confirmPassword" name="confirmPassword">
						<div class="mdc-notched-outline">
							<div class="mdc-notched-outline__leading"></div>
							<div class="mdc-notched-outline__notch">
							<label for="confirmPassword" class="mdc-floating-label">Confirm Password</label>
							</div>
							<div class="mdc-notched-outline__trailing"></div>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button name="submit" class="login100-form-btn">
							Sign Up
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
