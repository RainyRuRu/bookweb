var nowPage = "";


function load(page){
	if (page == 0){
		changePage('sellTag');
	}

	changePage(page);
}

/*
 * 轉換頁面
 *
 */
function changePage(pageName) {

	if (pageName == nowPage){
		return;
	}

	nowPage = pageName;
	
	var pageTag = document.getElementById("page").children;
	var lengthTag = pageTag.length;

	for (var i = 0 ; i < lengthTag ; i++) {
		pageTag[i].className = "";
	}

	pageTag[pageName].className = "active";
	if (pageName == 'sellTag') {
		searchSellInfo();
	} else if (pageName == 'buyingTag') {
		searchBuyingInfo();
	} else if (pageName == "soldTag") {
		searchHistoryInfo('sold');
	} else {
		searchHistoryInfo('buy');
	}

}
function searchBuyingInfo(){

	//JS的AJAX開始

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			var response = JSON.parse(xhttp.responseText);
			if (response.result == true){
				showTableData('buying', response);
			}
		}
	}

	xhttp.open("POST", "API/SelectBuying.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "";
	xhttp.send(data);
}

function searchSellInfo(){


	//JS的AJAX開始

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			var response = JSON.parse(xhttp.responseText);
			if (response.result == true){
				showTableData('sell', response);
			}
		}
	}

	xhttp.open("POST", "API/SelectBookByUser.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "";
	xhttp.send(data);
}

function searchHistoryInfo(type){


	//JS的AJAX開始

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			var response = JSON.parse(xhttp.responseText);
			if (response.result == true){
				showTableData('history', response);
			}
		}
	}

	xhttp.open("POST", "API/SelectHistory.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "type="+type;
	xhttp.send(data);
}

function showTableData(type, json) {

	showTable(type);
	var tableName = type+"Table";
	var tableDiv = document.getElementById(tableName);

	var table = tableDiv.children[0];
	var tBody = table.children[1];
	table.removeChild(tBody);
	
	var tBody = document.createElement("tBody");
	var data = json.data;

	if (type == 'sell'){
		for (var i = 0 ; i < data.length ; i++) {
			var tr = createSellTableRow(i+1, data[i]); 
			tBody.appendChild(tr);
		}
	} else if (type =="buying") {
		for (var i = 0 ; i < data.length ; i++) {
			var tr = createHistoryTableRow(i+1, data[i]); 
			var span = '<td><span class="glyphicon glyphicon-trash" aria-hidden="true"'+
			'style="cursor:pointer" onclick="deleteBuying('+data[i].b_id+')"></span></td>';
			tr.insertAdjacentHTML('beforeend', span);	
			tBody.appendChild(tr);
		}
	} else {
		for (var i = 0 ; i < data.length ; i++) {
			var tr = createHistoryTableRow(i+1, data[i]); 
			tBody.appendChild(tr);
		}
	}
	table.appendChild(tBody);
}

function createHistoryTableRow(num, data){
	var tr = document.createElement("tr");
	var td = '<td>'+num+'</td>';
	tr.insertAdjacentHTML('beforeend',td);	

	var td = '<td>'+data.name+'</td>';
	tr.insertAdjacentHTML('beforeend',td);

	var td = '<td>'+data.date+'</td>';
	tr.insertAdjacentHTML('beforeend',td);	
	
	var td = '<td>'+data.price+'</td>';
	tr.insertAdjacentHTML('beforeend',td);		
	return tr;
}

function createSellTableRow(num, data){
	var tr = document.createElement("tr");
	var td = '<td>'+num+'</td>';
	tr.insertAdjacentHTML('beforeend',td);	

	var td = '<td>'+data.name+'</td>';
	tr.insertAdjacentHTML('beforeend',td);	

	if (data.status == 0) {
		var span = '<td><span class="label label-default">等待中</span></td>';
	} else {
		var span = '<td><span class="label label-success" style="cursor:pointer" onclick="openBuyerList('+data.book_id+')">有人下單</span></td>';
	}
	tr.insertAdjacentHTML('beforeend', span);	

	var span = '<td><span class="glyphicon glyphicon-pencil" aria-hidden="true"'+
				'style="cursor:pointer" onclick="editBook('+data.book_id+')"></span></td>';
	tr.insertAdjacentHTML('beforeend', span);	

	var span = '<td><span class="glyphicon glyphicon-trash" aria-hidden="true"'+
				'style="cursor:pointer" onclick="deleteBook('+data.book_id+')"></span></td>';
	tr.insertAdjacentHTML('beforeend', span);	
	
	return tr;
}

function showTable(type){
	var sellTable = document.getElementById('sellTable');
	var buyingTable = document.getElementById('buyingTable');
	var historyTable = document.getElementById('historyTable');
	if (type == 'sell'){
		sellTable.className = "";
		buyingTable.className = "hiden";
		historyTable.className = "hiden";	
	} else if (type == 'buying'){
		sellTable.className = "hiden";
		buyingTable.className = "";
		historyTable.className = "hiden";	
	} else {
		sellTable.className = "hiden";
		buyingTable.className = "hiden";
		historyTable.className = "";		
	}
}

function deleteBook(b_id) {

    if (confirm("是否確定要刪除這本書?") == false) {
        return;
    }

	//JS的AJAX開始

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			var response = JSON.parse(xhttp.responseText);
			if (response.result == true){
				alert("刪除成功");
				location.href="memberHistory.php?page=sellTag";
			}
		}
	}

	xhttp.open("POST", "API/DeleteBook.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "b_id="+b_id;
	xhttp.send(data); 
}


function deleteBuying(b_id) {

    if (confirm("是否確定要取消訂單?") == false) {
        return;
    }

	//JS的AJAX開始

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			var response = JSON.parse(xhttp.responseText);
			if (response.result == true){
				alert("刪除成功");
				location.href="memberHistory.php?page=buyingTag";
			}
		}
	}

	xhttp.open("POST", "API/DeleteBuying.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "b_id="+b_id;
	xhttp.send(data); 
}

function editBook(b_id) {

	var form = document.createElement('form');
	form.action = 'SellBook.php';
	form.method = 'POST';

	var input = document.createElement('input');
	input.type = 'hidden';
	input.name = 'b_id';
	input.value = b_id;

	form.appendChild(input);

	form.submit();

}

function openBuyerList(b_id) {
	var form = document.createElement('form');
	form.action = 'buyerList.php';
	form.method = 'POST';

	var input = document.createElement('input');
	input.type = 'hidden';
	input.name = 'b_id';
	input.value = b_id;

	form.appendChild(input);

	form.submit();
}
