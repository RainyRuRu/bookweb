<?php session_start();

if (!isset($_SESSION['u_id'])){
	header("LOCATION: Login.php");	
}
if (isset($_POST['b_id'])) {
	$b_id = $_POST['b_id'];
} else {
	$b_id = 0;
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
	<SCRIPT src="JS/MemberHistory.js"></SCRIPT>
	<SCRIPT src="JS/BuyList.js"></SCRIPT>
</head>
<body onload='load("<?php echo $b_id ?>")'>
	<?php include 'header.php' ?>
	<div class="container">
		<div class="MemberTitle">下單資訊</div>
		
		<center><h3>書名</h3></center>
			<table id="buyerTable" class="table table-hover" style="width:80%;margin:auto;margin-top:20px;">
				<thead>
					<tr>
						<th class="col-md-1">編號</th>
						<th class="col-md-2">姓名</th>
						<th class="col-md-2">科系</th>
						<th class="col-md-2">電話</th>
						<th class="col-md-2">E-mail</th>
						<th class="col-md-1">與他成交</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>	
	</div>
</body>
</html>