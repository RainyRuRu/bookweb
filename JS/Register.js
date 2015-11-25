/*
	AJAX 戳API - Register.php
*/
function RegisterUser() {
	//var u_id = '1'; //id等加上session後修改
	var acc = document.getElementsByName('acc')[0].value;
	var pwd = document.getElementsByName('pwd')[0].value;
	var name = document.getElementsByName('name')[0].value;
	var dept = document.getElementsByName('dept')[0].value;
	var degree = document.getElementsByName('degree')[0].value;
	var email = document.getElementsByName('email')[0].value;
	var phone = document.getElementsByName('phone')[0].value;
	var address = document.getElementsByName('address')[0].value;

	//JS的AJAX開始

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			var response = JSON.parse(xhttp.responseText);
			if (response.result == true){
				alert("註冊成功");
			} else {
				if (response.responseDetail == "account"){
					alert("帳號已有人使用");
				}
			}
		}
	}

	xhttp.open("POST", "API/InsertUser.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "acc="+acc+
			"&pwd="+pwd+
			"&name="+name+
			"&dept="+dept+
			"&degree="+degree+
			"&email="+email+
			"&phone="+phone+
			"&address="+address;
	xhttp.send(data);
}

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

	if (checkResult == true) {
		RegisterUser();
	}
}