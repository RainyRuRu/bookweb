<?php
session_start();

//透過u_id搜尋Books中的資料
//用於顯示於個人歷史紀錄中的出售中


$u_id =  $_SESSION['u_id'];

/*
$u_id = '2';
*/

$result = false;
$error = null;
$data = array();

try {

	$dsn = 'mysql:dbname=bookweb;host=192.168.1.101';
	$user = 'bookweb';
	$password = '1234';

	$db = new PDO($dsn, $user, $password);
	$db->exec("set names utf8");
	
	$stmt = $db->prepare('SELECT `book_id` ,`name`, `status` from `books` 
		WHERE owner=:u_id And status <> 2 
		ORDER BY `books`.`status` DESC');
	
	$stmt->bindParam(":u_id", $u_id);

    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

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