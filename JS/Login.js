/*
	AJAX 戳API - SelectUser.php
*/
function CheckAccount() {
	//var u_id = '1'; //id等加上session後修改
	var acc = document.getElementsByName('acc')[0].value;
	var pwd = document.getElementsByName('pwd')[0].value;

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			var response = JSON.parse(xhttp.responseText);
			if (response.result == true){
				if (response.data == true){
					location.href="HomePage.php";
				}	
			}
		}
	}

	xhttp.open("POST", "API/SearchUser.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "acc="+acc+
			"&pwd="+pwd;
	xhttp.send(data);
}

/*
	確認輸入參數非空白
	如果是空白則顯示錯誤訊息

	全部都非空白呼叫CheckAccount方法
*/
function checkField(){
	
	var checkResult = true;
	
	var data = document.getElementsByTagName('input');
	for (var i = 0 ; i < data.length ; i++) {
		var name = data[i].name;
		if (data[i].value == "") {
			var checkResult = false;
		}
	}

	if (checkResult == true) {
		CheckAccount();
	}
}

