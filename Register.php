<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	<link rel=stylesheet type="text/css" href="CSS/MemberCenter.css">
	<link rel=stylesheet type="text/css" href="CSS/Header.css">
	<SCRIPT src="JS/Register.js"></SCRIPT>
</head>
<body>
	<?php include 'header.php' ?>
	<div class="container">
		<div class="MemberTitle">會員註冊</div>

		<div class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-4 control-label">帳號：</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="acc">
				</div>
				<label id="accErrorLabel" class="col-sm-4 errorLabel">請輸入帳號</label>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">密碼：</label>
				<div class="col-sm-4">
					<input type="password" class="form-control" name="pwd">
				</div>
				<label id="pwdErrorLabel" class="col-sm-4 errorLabel">請輸入密碼</label>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">姓名：</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="name">
				</div>
				<label id="nameErrorLabel" class="col-sm-4 errorLabel">請輸入姓名</label>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">系所：</label>
				<div class="col-sm-4">
					<select class="form-control" name="dept">
						<option>教育學系</option>
						<option>體育學系</option>
						<option>事業經營學系</option>
						<option>國文學系</option>
						<option>英文學系</option>
						<option>地理學系</option>
						<option>數學系</option>
						<option>地理學系</option>
						<option>化學系</option>
						<option>物裡學系</option>
						<option>生物科技系</option>
						<option>工業設計學系</option>
						<option>工業設計教育學系</option>
						<option>電子工程學系</option>
						<option>軟體工程與管理學系</option>
						<option>光電與通訊工程學系</option>
						<option>音樂學系</option>
						<option>美術學系</option>
						<option>視覺設計學系</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">年級：</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="degree">
				</div>
				<label id="degreeErrorLabel" class="col-sm-4 errorLabel">請輸入年級</label>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">E-mail：</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="email">
				</div>
				<label id="emailErrorLabel" class="col-sm-4 errorLabel">請輸入E-mail</label>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">連絡電話：</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="phone">
				</div>
				<label id="phoneErrorLabel" class="col-sm-4 errorLabel">請輸入電話</label>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">連絡地址：</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="address">
				</div>
				<label id="addressErrorLabel" class="col-sm-4 errorLabel">請輸入地址</label>
			</div>
			<center>
			<button class="btn btn-default" onclick='checkField()'>註冊</button>
			</center>
		</div>
	</div>
</body>
</html>