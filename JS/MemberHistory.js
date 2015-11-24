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

	var u_id = '1'; //id等加上session後修改

	//JS的AJAX開始

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			if (xhttp.responseText.result = "true"){
				showTableData('buying', JSON.parse(xhttp.responseText));
			}
		}
	}

	xhttp.open("POST", "API/SelectBuying.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "u_id="+u_id;
	xhttp.send(data);
}

function searchSellInfo(){

	var u_id = '1'; //id等加上session後修改

	//JS的AJAX開始

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			if (xhttp.responseText.result = "true"){
				showTableData('sell', JSON.parse(xhttp.responseText));
			}
		}
	}

	xhttp.open("POST", "API/SelectBookByUser.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "u_id="+u_id;
	xhttp.send(data);
}

function searchHistoryInfo(type){

	var u_id = '1'; //id等加上session後修改

	//JS的AJAX開始

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			if (xhttp.responseText.result = "true"){
				showTableData('history', JSON.parse(xhttp.responseText));
			}
		}
	}

	xhttp.open("POST", "API/SelectHistory.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "u_id="+u_id+"&type="+type;
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
		var span = '<td><span class="label label-success">有人下單</span></td>';
	}
	tr.insertAdjacentHTML('beforeend', span);	

	var span = '<td><span class="glyphicon glyphicon-pencil" aria-hidden="true"'+
				'style="cursor:pointer"></span></td>';
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
			if (xhttp.responseText.result = "true"){
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

	var u_id = 1;

    if (confirm("是否確定要取消訂單?") == false) {
        return;
    }

	//JS的AJAX開始

	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			//接收API的回傳值 -- 是JSON
			if (xhttp.responseText.result = "true"){
				alert("刪除成功");
				location.href="memberHistory.php?page=buyingTag";
			}
		}
	}

	xhttp.open("POST", "API/DeleteBuying.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var data = "b_id="+b_id+"&u_id="+u_id;
	xhttp.send(data); 
}