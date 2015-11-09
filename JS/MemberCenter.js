function UpdateUserInfo() {
	var u_id = '1';
	var name = document.getElementsByName('name')[0].value;
	var dept = document.getElementsByName('dept')[0].value;
	var degree = document.getElementsByName('degree')[0].value;
	var email = document.getElementsByName('email')[0].value;
	var phone = document.getElementsByName('phone')[0].value;
	var address = document.getElementsByName('address')[0].value;

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			if (xhttp.responseText.result = "true"){
				var alert = document.getElementById('alert');	
				alert.style.display = 'inline';
			}
		}
	}

	xhttp.open("POST", "API/UpdateUser.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "u_id="+u_id+
			"&name="+name+
			"&dept="+dept+
			"&degree="+degree+
			"&email="+email+
			"&phone="+phone+
			"&address="+address;
	xhttp.send(data);
}

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