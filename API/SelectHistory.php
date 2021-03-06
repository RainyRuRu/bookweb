<?php
session_start();

//透過u_id搜尋History中的資料
//type : 已出售或已購買

$u_id =  $_SESSION['u_id'];
$type = $_POST['type'];
/*
$u_id = '3';
$type = 'sell'; //sell or buy
*/

$result = false;
$error = null;
$data = array();

try {

    $dsn = 'mysql:dbname=bookweb;host=140.127.74.142';
	$user = 'bookweb';
	$password = '1234';

	$db = new PDO($dsn, $user, $password);
	$db->exec("set names utf8");
	
	$books = bookID($db, $u_id, $type);

	if ($books != false) {
		foreach ($books as $book){
			$tmp = array();
			$bookInfo = bookData($db, $book['b_id']);
			$tmp['name'] = $bookInfo['name'];
			$tmp['date'] = $book['date'];
			$tmp['price'] = $bookInfo['price'];
			array_push($data, $tmp);
		}
	}

	$result = true;
} catch (PDOException $e) {
	 $error = $e;
}

$result = array(
	"result" => $result,
    "data" => $data,
	"responseDetail" => $error,
);

$json_result = json_encode($result);

echo $json_result;


//----exit----

function bookID($db, $u_id, $type)
{
	if ($type == 'sold'){
		$stmt = $db->prepare('SELECT `b_id`, `date` from `history` WHERE owner=:u_id');
	} else {
		$stmt = $db->prepare('SELECT `b_id`, `date` from `history` WHERE buyer=:u_id');
	}
    $stmt->bindParam(":u_id", $u_id);

    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $row;
}

function bookData($db, $b_id)
{
	$stmt = $db->prepare('SELECT `name` , `price` from `books` WHERE book_id=:book_id');
    $stmt->bindParam(":book_id", $b_id);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}