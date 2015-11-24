<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	<link rel=stylesheet type="text/css" href="CSS/BookInfo.css">
	<link rel=stylesheet type="text/css" href="CSS/Header.css">
</head>
<body>
	<?php include 'header.php'?>
	<div class="container">
		<div class="Title">Book Name</div>
		<div class="InfoBox">
			<div class="Pic">PICTURE!!!</div>
			<div class="Infos">INFORMATIONS!!!!!</div>
			<button class="btn btn-default" onclick='checkUser()'>購買</button>
		</div>

	</div>

</body>

</html>