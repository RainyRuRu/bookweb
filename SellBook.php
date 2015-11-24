<?php session_start(); 
if (!isset($_SESSION['u_id'])){
	header("LOCATION: Login.php");	
}
if (isset($_POST['b_id'])) {
	$b_id = $_POST['b_id'];
} else {
	$b_id = null;
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
	<SCRIPT src="JS/BookSell.js"></SCRIPT>
</head>
<body onload=load(<?php echo $b_id?>)>
	<?php include 'header.php' ?>
	<div class="container">
		<div class="MemberTitle">賣書</div>
		<div class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-4 control-label">書名：</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="name">
				</div>
				<label id="nameErrorLabel" class="col-sm-4 errorLabel">請輸入書名</label>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">出版社：</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="publisher">
				</div>
				<label id="publisherErrorLabel" class="col-sm-4 errorLabel">請輸入出版社</label>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">作者：</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="author">
				</div>
				<label id="authorErrorLabel" class="col-sm-4 errorLabel">請輸入作者</label>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">價格：</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="price">
				</div>
				<label id="priceErrorLabel" class="col-sm-4 errorLabel">請輸入價格</label>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">圖片網址：</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="img">
				</div>
				<label id="imgErrorLabel" class="col-sm-4 errorLabel">請輸入圖片網址</label>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">書本敘述：</label>
				<div class="col-sm-4">
					<textarea class="form-control" rows="3" name="content"></textarea>
				</div>
				<label id="contentErrorLabel" class="col-sm-4 errorLabel">請輸入書本敘述</label>
			</div>
			<center>
			<button class="btn btn-default" onclick='checkField()'>確定</button>
			</center>
		</div>
	</div>
</body>
</html>