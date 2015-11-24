/*
	AJAX 戳API - UpdateUser.php
*/
function UpdateUserInfo() {

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
				//若回傳的值為成功，開啟成功訊息
				var alert = document.getElementById('alert');	
				alert.style.display = 'inline';
			}
		}
	}

	xhttp.open("POST", "API/UpdateUser.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "name="+name+
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
		UpdateUserInfo();
	}
}

/*
	透過AJAX搜尋使用者資料

*/
function searchUserInfo(){

	//JS的AJAX開始

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			var response = JSON.parse(xhttp.responseText);
			if (response.result == true){
				showUserInfo(response);
			}
		}
	}

	xhttp.open("POST", "API/SelectUser.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "";
	xhttp.send(data);
}

function showUserInfo(json){

	var userField = document.getElementsByTagName("input");
	userField['name'].value = json.data.name;
	userField['degree'].value = json.data.degree;
	userField['phone'].value = json.data.phone;
	userField['email'].value = json.data.email;
	userField['address'].value = json.data.address;

	var dept = json.data.department;

	document.getElementById(dept).selected = true;

}