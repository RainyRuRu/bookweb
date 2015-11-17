/*
	AJAX 戳API - SelectUser.php
*/
function CheckAccount() {
	var u_id = '1'; //id等加上session後修改
	var acc = document.getElementsByName('acc')[0].value;
	var pwd = document.getElementsByName('pwd')[0].value;

	//JS的AJAX開始

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			if (xhttp.responseText.result = "true"){
				//若回傳的值為成功，開啟成功訊息
				var alert = document.getElementById('alert');	
				alert.style.display = 'inline';
			}
		}
	}

	xhttp.open("POST", "API/SelectUser.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "u_id="+u_id+
			"&acc="+acc+
			"&pwd="+pwd;
	xhttp.send(data);
}

/*
	確認輸入參數非空白
	如果是空白則顯示錯誤訊息

	全部都非空白呼叫CheckAccount方法
*/
function checkField(){
	
	var alert = document.getElementById('alert');
	alert.style.display = 'none';

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

	if (checkResult == true) {
		CheckAccount();
	}
}