<?php
session_start();

$u_id =  $_SESSION['u_id'];
$b_id = $_POST['b_id'];

$result = false;
$error = null;
$data = array();

try {

	$dsn = 'mysql:dbname=bookweb;host=192.168.1.101';
	$user = 'bookweb';
	$password = '1234';

	$db = new PDO($dsn, $user, $password);
	$db->exec("set names utf8");
	$stmt = $db->prepare("INSERT INTO `buying` (`b_id`, `buyer`, `date`) VALUES (:b_id, :buyer, now())");

	$stmt->bindParam(":b_id", $b_id);
	$stmt->bindParam(":buyer", $u_id);
	
    $stmt->execute();

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