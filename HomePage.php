<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	<link rel=stylesheet type="text/css" href="CSS/HomePage.css">
	<link rel=stylesheet type="text/css" href="CSS/Header.css">
</head>
<body>
	<?php include 'header.php' ?>
	<div class="container">
		<div class="Title">高師大校內二手書交易網</div>
		<div class="SearchBox">
			<form action="SearchResult.php" method="get">
				<input type="text" class="form-control SearchInput" name="keyword">
				<button type="submit" class="btn SearchBtn">搜尋</button>
			</form>
		</div>
	</div>
</body>
</html>