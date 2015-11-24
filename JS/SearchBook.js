var bookdata = null;
var b_id = null;

function load(b_id){
	window.b_id = b_id;
	searchBookInfo(b_id);
}

function searchBook(keyword){
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			var response = JSON.parse(xhttp.responseText);
			if (response.result == true){
				bookdata = response.data;
				showTableData(response.data);
			}
		}
	}

	xhttp.open("POST", "API/SearchBook.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "keyword="+keyword;
	xhttp.send(data);
}

function showTableData(data){

	var table = document.getElementById("resultTable");
	var tBody = table.children[1];

	for (var i = 0 ; i < data.length ; i++) {
		var tr = createTableRow(i+1, data[i]); 
		tBody.appendChild(tr);
	}
}

function createTableRow(num, data){

	var tr = document.createElement("tr");
	var td = '<td>'+num+'</td>';
	tr.insertAdjacentHTML('beforeend',td);	

	var td = '<td>'+data.name+'</td>';
	tr.insertAdjacentHTML('beforeend',td);

	var td = '<td>'+data.price+'</td>';
	tr.insertAdjacentHTML('beforeend',td);	

	var span = '<td><span class="glyphicon glyphicon-search" aria-hidden="true"'+
				'style="cursor:pointer" onclick="location.href=\'bookInfo.php?b_id='+data.book_id+'\'"></span></td>';
	tr.insertAdjacentHTML('beforeend', span);	
	return tr;
}

function searchBookInfo(b_id){
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			var response = JSON.parse(xhttp.responseText);
			if (response.result == true){
				showBookInfo(response.data);
			}
		}
	}

	xhttp.open("POST", "API/SearchBookInfo.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "b_id="+b_id;
	xhttp.send(data);
}

function showBookInfo(data){

	var name = document.getElementById("name");
	name.innerHTML = data.name;
	var img = document.getElementsByTagName("img")[0];
	img.src = data.img;
	var author = document.getElementById("author");
	author.innerHTML = data.author;
	var publisher = document.getElementById("publisher");
	publisher.innerHTML = data.publisher;
	var price = document.getElementById("price");
	price.innerHTML = data.price;
	var content = document.getElementById("content");
	content.innerHTML = data.content;

}

function buy(u_id){

	if (u_id == null) {
		alert("請先登入");
		return;
	}

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			var response = JSON.parse(xhttp.responseText);
			if (response.result == true){
				alert("下單成功");
			}
		}
	}

	xhttp.open("POST", "API/InsertBuying.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "b_id="+b_id;
	xhttp.send(data);
}