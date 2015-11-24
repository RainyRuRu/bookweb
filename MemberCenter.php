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
</head>
<body>
	<?php include 'header.php' ?>
	<div class="container">
		<div class="MemberTitle">會員中心</div>
		<div class="MemberBtns">
			<button type="button" class="btn btn-info InfoBtn" onclick="location.href='MemberInfo.php'">個人資料修改</button>
			<button type="button" class="btn btn-success HistoryBtn" onclick="location.href='MemberHistory.php?page=sellTag'">個人交易紀錄</button>
		</div>
	</div>

</body>

</html>