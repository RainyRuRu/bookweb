/*
	確認輸入參數非空白
	如果是空白則顯示錯誤訊息

	全部都非空白呼叫UpdateUserInfo方法
*/
function checkField(){
	
	var checkResult = true;
	
	var data = document.getElementsByTagName('input');

	for (var i = 0 ; i < data.length ; i++) {
		var name = data[i].name;
		var errorId = name+"ErrorLabel";
		var label = document.getElementById(errorId);

		if (data[i].value == "") {
			label.style.display = 'inline';
			var checkResult = false;
		} else {
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
		label.style.display = 'none';
	}

	if (checkResult == true) {
		InsertBook();
	}
}


/*
	AJAX 戳API - UpdateUser.php
*/
function InsertBook() {
	var u_id = '1'; //id等加上session後修改
	var name = document.getElementsByName('name')[0].value;
	var publisher = document.getElementsByName('publisher')[0].value;
	var author = document.getElementsByName('author')[0].value;
	var price = document.getElementsByName('price')[0].value;
	var img = document.getElementsByName('img')[0].value;
	var content = document.getElementsByName('content')[0].value;

	//JS的AJAX開始

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			if (xhttp.responseText.result = "true"){
				//若回傳的值為成功，開啟成功訊息
				alert("新增書籍成功");
				location.href= 'MemberHistory.php';
			}
		}
	}

	xhttp.open("POST", "API/InsertBook.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "u_id="+u_id+
			"&name="+name+
			"&publisher="+publisher+
			"&author="+author+
			"&price="+price+
			"&img="+img+
			"&content="+content;
	xhttp.send(data);
}