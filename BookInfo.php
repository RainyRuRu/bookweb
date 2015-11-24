<?php session_start();
if (isset($_SESSION['u_id'])) {
	$u_id = $_SESSION['u_id'];
} else {
	$u_id = null;
}
if (isset($_GET['b_id'])){
	$b_id = $_GET['b_id'];
} else {
	header("LOCATION: Homepage.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	<link rel=stylesheet type="text/css" href="CSS/BookInfo.css">
	<link rel=stylesheet type="text/css" href="CSS/Header.css">
	<SCRIPT src="JS/SearchBook.js"></SCRIPT>
</head>
<body onload='load("<?php echo $b_id ?>")'>
	<?php include 'header.php' ?>
	<div class="container">
		<div id="name" class="Title"></div>
		<div class="InfoBox">
			<div class="Pic"><img src="" height="400" width="350"></div>
			<div class="Infos">
				<div>作者：<p id="author"></p></div>
				<div>出版社：<p id="publisher"></p></div>
				<div>價格：<p id="price"></p></div>
				<div>相關描述：<p id="content"></p></div>
				<div><button class="btn btn-default" onclick='buy(<?php echo $u_id?>)'>購買</button></div>
			</div>
		</div>
	</div>

</body>

</html>