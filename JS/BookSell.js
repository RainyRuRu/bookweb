var b_id = null;

function load(b_id){
	if (typeof b_id != 'undefined'){
		window.b_id = b_id;
		searchBookInfo(b_id);
	}
}

function searchBookInfo(b_id){
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			var response = JSON.parse(xhttp.responseText);
			if (response.result == true){
				showBookInfo(response);
			}
		}
	}

	xhttp.open("POST", "API/SearchBookInfo.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "b_id="+b_id;
	xhttp.send(data);
}


function showBookInfo(json) {
	var data = json.data;
	var field = document.getElementsByTagName('input');
	field['name'].value = data.name;	
	field['publisher'].value = data.publisher;	
	field['author'].value = data.author;	
	field['price'].value = data.price;	
	field['img'].value = data.img;

	document.getElementsByName('content')[0].value = data.content;
}

/*
	確認輸入參數非空白
	如果是空白則顯示錯誤訊息

	全部都非空白呼叫UpdateUserInfo方法
*/
function checkField() {
	
	var checkResult = true;

	var data = {};
	var field = document.getElementsByTagName('input');

	for (var i = 0 ; i < field.length ; i++) {
		var name = field[i].name;
		var errorId = name+"ErrorLabel";
		var label = document.getElementById(errorId);

		if (field[i].value == "") {
			label.style.display = 'inline';
			var checkResult = false;
		} else {
			data[name] = field[i].value;
			label.style.display = 'none';
		}
	}

	var textearaData = document.getElementsByTagName('textarea')[0];
	var errorId = "contentErrorLabel";
	var label = document.getElementById(errorId);

	if (textearaData.value == "") {
		label.style.display = 'inline';
		var checkResult = false;
	} else {
		data["content"] = textearaData.value;
		label.style.display = 'none';
	}

	if (checkResult == true) {
		if (b_id != null){
			UpdateBook(data);
		} else {
			InsertBook(data);
		}
	}
}


function InsertBook(data) {
	var u_id = '1'; //id等加上session後修改
	//JS的AJAX開始

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			var response = JSON.parse(xhttp.responseText);
			if (response.result == true){
				//若回傳的值為成功，開啟成功訊息
				alert("新增書籍成功");
				location.href= 'MemberHistory.php?page=sellTag';
			}
		}
	}

	xhttp.open("POST", "API/InsertBook.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "name="+data.name+
			"&publisher="+data.publisher+
			"&author="+data.author+
			"&price="+data.price+
			"&img="+data.img+
			"&content="+data.content;
	xhttp.send(data);
}

function UpdateBook(data) {

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			var response = JSON.parse(xhttp.responseText);
			if (response.result == true){
				//若回傳的值為成功，開啟成功訊息
				alert("更新書籍成功");
				location.href= 'MemberHistory.php?page=sellTag';
			}
		}
	}

	xhttp.open("POST", "API/UpdateBook.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "b_id="+b_id+
			"&name="+data.name+
			"&publisher="+data.publisher+
			"&author="+data.author+
			"&price="+data.price+
			"&img="+data.img+
			"&content="+data.content;
	xhttp.send(data);
}