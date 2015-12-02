<?php

$b_id = $_POST['b_id'];

$result = false;
$error = null;
$data = array();

try {

    $dsn = 'mysql:dbname=bookweb;host=140.127.74.142';
	$user = 'bookweb';
	$password = '1234';

	$db = new PDO($dsn, $user, $password);
	$db->exec("set names utf8");
	$stmt = $db->prepare('SELECT * from `books` WHERE book_id=:b_id');

	$stmt->bindParam(":b_id", $b_id);

    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

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