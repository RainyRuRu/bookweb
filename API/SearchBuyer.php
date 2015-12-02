<?php

$b_id = $_POST['b_id'];

//$keyword = "python";

$result = false;
$error = null;
$data = array();

try {

    $dsn = 'mysql:dbname=bookweb;host=140.127.74.142';
	$user = 'bookweb';
	$password = '1234';

	$db = new PDO($dsn, $user, $password);
	$db->exec("set names utf8");
	$stmt = $db->prepare("SELECT buyer FROM `buying` where b_id = :b_id");

	$stmt->bindParam(":b_id", $b_id);

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