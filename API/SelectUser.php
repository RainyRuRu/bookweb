<?php
session_start();

$u_id =  $_SESSION['u_id'];

//透過u_id搜尋userInfo中的資料


/*
test data
$u_id = '1';
*/

$result = false;
$error = null;
$data = null;

try {

    $dsn = 'mysql:dbname=bookweb;host=192.168.1.101';
	$user = 'bookweb';
	$password = '1234';
	
	$db = new PDO($dsn, $user, $password);
	$db->exec("set names utf8");
    
    $stmt = $db->prepare('SELECT * from `userinfo` WHERE u_id=:u_id');
    $stmt->bindParam(":u_id", $u_id);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row != false) {
        $data = $row;
        $result = true;
    } else {
        $error = "data can't find";
    }

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