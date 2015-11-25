var b_id = null;

function load(b_id){
	window.b_id = b_id;
	searchBuyId();
}

function searchBuyId(){
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			var response = JSON.parse(xhttp.responseText);
			if (response.result == true){
				showUserInfo(response.data);
			}
		}
	}

	xhttp.open("POST", "API/SearchBuyer.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "b_id="+b_id;
	xhttp.send(data);
}

function showUserInfo(data){
	for (var i = 0 ; i < data.length ; i++) {
		searchUserInfo(i+1, data[i].buyer); 
	}
}

function searchUserInfo(i, u_id){
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			var response = JSON.parse(xhttp.responseText);
			if (response.result == true){
				showBuyerTable(i, response.data);
			}
		}
	}

	xhttp.open("POST", "API/SelectUser.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "u_id="+u_id;
	xhttp.send(data);
}


function showBuyerTable(i, data){

	var table = document.getElementById("buyerTable");
	var tBody = table.children[1];

	var tr = createTableRow(i, data); 
	tBody.appendChild(tr);

}

function createTableRow(num, data){

	var tr = document.createElement("tr");
	var td = '<td>'+num+'</td>';
	tr.insertAdjacentHTML('beforeend',td);	

	var td = '<td>'+data.name+'</td>';
	tr.insertAdjacentHTML('beforeend',td);

	var td = '<td>'+data.department+'</td>';
	tr.insertAdjacentHTML('beforeend',td);

	var td = '<td>'+data.phone+'</td>';
	tr.insertAdjacentHTML('beforeend',td);	

	var td = '<td>'+data.email+'</td>';
	tr.insertAdjacentHTML('beforeend',td);	

	var span = '<td><span class="glyphicon glyphicon-ok" aria-hidden="true"'+
				'style="cursor:pointer" onclick="finish('+data.u_id+')"></span></td>';
	tr.insertAdjacentHTML('beforeend', span);

	return tr;
}

function finish(u_id) {
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			var response = JSON.parse(xhttp.responseText);
			if (response.result == true){
				alert("交易完成");
				location.href = "MemberHistory.php?page=soldTag";
			}
		}
	}

	xhttp.open("POST", "API/InsertHistory.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "u_id="+u_id+"&b_id="+b_id;
	xhttp.send(data);
}
