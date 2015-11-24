<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	<link rel=stylesheet type="text/css" href="CSS/MemberCenter.css">
	<SCRIPT src="JS/MemberHistory.js"></SCRIPT>
</head>
<body onload="load()">
	<div class="container">
		<div class="MemberTitle">個人歷史紀錄</div>
		<ul class="nav nav-tabs" id="page">
			<li id="sellTag" class="active"><a href="#" onclick="changePage('sellTag')">出售中</a></li>
			<li id="soldTag"><a href="#" onclick="changePage('soldTag')">已售出</a></li>
			<li id="buyTag"><a href="#" onclick="changePage('buyTag')">已購買</a></li>
		</ul>

		<div id="sellTable" class="hiden">
			<table class="table table-hover" style="width:80%;margin:auto;margin-top:20px;">
				<thead>
					<tr>
						<th class="col-md-1">編號</th>
						<th>書名</th>
						<th class="col-md-2">狀態</th>
						<th class="col-md-2">編輯</th>
						<th class="col-md-2">刪除</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>	
		</div>
		<div id="historyTable" class="hiden">
			<table class="table table-hover" style="width:80%;margin:auto;margin-top:20px;">
				<thead>
					<tr>
						<th class="col-md-1">編號</th>
						<th>書名</th>
						<th class="col-md-2">成交日期</th>
						<th class="col-md-2">成交金額</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>	
		</div>
	</div>
</body>
</html>