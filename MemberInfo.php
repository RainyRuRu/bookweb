<?php session_start(); 
	if (!isset($_SESSION['u_id'])){
		header("LOCATION: Login.php");	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	<link rel=stylesheet type="text/css" href="CSS/MemberCenter.css">
	<link rel=stylesheet type="text/css" href="CSS/Header.css">
	<SCRIPT src="JS/MemberCenter.js"></SCRIPT>
</head>
<body onload="searchUserInfo()">
	<?php include 'header.php'?>
	<div class="container">
		<div class="MemberTitle">會員資料修改</div>
		<div id="alert" class="col-sm-offset-3 col-sm-6 alert alert-success" style="display:none"><center>修改成功</center></div>
		<div class="form-horizontal">
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
						<option id="教育學系">教育學系</option>
						<option id="體育學系">體育學系</option>
						<option id="事業經營學系">事業經營學系</option>
						<option id="國文學系">國文學系</option>
						<option id="英文學系">英文學系</option>
						<option id="地理學系">地理學系</option>
						<option id="數學系">數學系</option>
						<option id="地理學系">地理學系</option>
						<option id="化學系">化學系</option>
						<option id="物裡學系">物裡學系</option>
						<option id="生物科技系">生物科技系</option>
						<option id="工業設計學系">工業設計學系</option>
						<option id="工業設計教育學系">工業設計教育學系</option>
						<option id="電子工程學系">電子工程學系</option>
						<option id="軟體工程與管理學系">軟體工程與管理學系</option>
						<option id="光電與通訊工程學系">光電與通訊工程學系</option>
						<option id="音樂學系">音樂學系</option>
						<option id="美術學系">美術學系</option>
						<option id="視覺設計學系">視覺設計學系</option>
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
			<button class="btn btn-default" onclick='checkField()'>儲存</button>
			</center>
		</div>
	</div>
</body>
</html>