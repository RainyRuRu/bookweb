<?php

$keyword = $_POST['keyword'];

//$keyword = "python";

$result = false;
$error = null;
$data = array();

try {

	$dsn = 'mysql:dbname=bookweb;host=192.168.1.101';
	$user = 'bookweb';
	$password = '1234';

	$db = new PDO($dsn, $user, $password);
	$db->exec("set names utf8");
	$stmt = $db->prepare("SELECT * FROM `books` where status in (0,1) and name like '%" . $keyword . "%'");

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

//----exit----