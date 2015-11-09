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
			console.log(xhttp.responseText);
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