<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	<link rel=stylesheet type="text/css" href="CSS/Login.css">
	<SCRIPT src="JS/Login.js"></SCRIPT>
</head>
<body>
	<div style="height:50px;background-color:lightgray"></div>
	<div class="container">
		<div class="Title">登入</div>
		<form class="form-signin" role="form">
			<label class="sr-only">Account</label>
			<input type="text" id="inputAccount" class="form-control" name="acc" placeholder="Account" autofocus="">
			<label class="sr-only">Password</label>
			<input type="text" id="inputPassword" class="form-control" name="pwd" placeholder="Password">
		</form>

		<div class="LoginBtns">
			<button class="btn btn-lg btn-primary btn-block" onclick='checkField()'>登入</button>
			<button class="btn btn-lg btn-primary btn-block" onclick="location.href='Register.php'">註冊</button>
		</div>

	</div>

</body>

</html>