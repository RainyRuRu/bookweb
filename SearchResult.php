<?php session_start();
	if (isset($_GET['keyword'])){
		$keyword = $_GET['keyword'];
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
	<link rel=stylesheet type="text/css" href="CSS/HomePage.css">
	<link rel=stylesheet type="text/css" href="CSS/Header.css">
	<SCRIPT src="JS/SearchBook.js"></SCRIPT>
</head>
<body onload='searchBook("<?php echo $keyword ?>")'>
	<?php include 'header.php' ?>
	<div class="container">
		<div class="Title">高師大校內二手書交易網</div>
		<div class="SearchBox">
			<form action="SearchResult.php" method="get">
				<input type="text" class="form-control SearchInput" name="keyword">
				<button type="submit" class="btn SearchBtn">搜尋</button>
			</form>
		</div>

		<table id = "resultTable" class="table table-hover" style="width:80%;margin:auto;margin-top:20px;">
			<thead>
				<tr>
					<th class="col-md-1">編號</th>
					<th>書名</th>
					<th class="col-md-2">價格</th>
					<th class="col-md-2">查看</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>

	</div>
</body>
</html>