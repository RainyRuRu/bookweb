<?php session_start(); 
	if (isset($_SESSION['u_id'])){
		header("LOCATION: HomePage.php");	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	<link rel=stylesheet type="text/css" href="CSS/Login.css">
	<link rel=stylesheet type="text/css" href="CSS/Header.css">
	<SCRIPT src="JS/Login.js"></SCRIPT>
</head>
<body>
	<?php include 'header.php' ?>
	
	<div class="container">
		<div class="Title">登入</div>
		<form class="form-signin" role="form">
			<div class="form-group">
			<label class="sr-only">Account</label>
			<input type="text" id="inputAccount" class="form-control" name="acc" placeholder="Account" autofocus="">
			</div>
			<div class="form-group">
			<label class="sr-only">Password</label>
			<input type="password" id="inputPassword" class="form-control" name="pwd" placeholder="Password">
			</div>
		</form>

		<div class="LoginBtns">
			<div class="form-group">
			<button class="btn btn-lg btn-primary btn-block" onclick='checkField()'>登入</button>
			</div>
			<div class="form-group">
			<button class="btn btn-lg btn-primary btn-block" onclick="location.href='Register.php'">註冊</button>
			</div>
		</div>

	</div>

</body>

</html>