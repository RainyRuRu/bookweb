<?php
session_start();

$u_id =  $_SESSION['u_id'];
$buyer = $_POST['u_id'];
$b_id = $_POST['b_id'];


$error = null;
$saved = false;

try {

    $dsn = 'mysql:dbname=bookweb;host=192.168.1.101';
	$user = 'bookweb';
	$password = '1234';
	
	$db = new PDO($dsn, $user, $password);
	$db->exec("set names utf8");

	$stmt = $db->prepare('INSERT INTO `history` (`b_id`, `owner`, `buyer`, `date`) VALUES (:b_id, :owner, :buyer, now())');
    
    $stmt->bindParam(":b_id", $b_id);
    $stmt->bindParam(":owner", $u_id);
    $stmt->bindParam(":buyer", $buyer);

    $stmt->execute();

    $stmt = $db->prepare('UPDATE `books` SET  `status` = 2
            Where book_id = :b_id');
    
    $stmt->bindParam(":b_id", $b_id);

    $stmt->execute();

    $stmt = $db->prepare('DELETE FROM `buying`
		WHERE b_id=:b_id');
    
    $stmt->bindParam(":b_id", $b_id);

    $stmt->execute();

    $saved = true;

    
} catch (PDOException $e) {
	 $error = $e;
}

$result = array(
	"result" => $saved,
	"responseDetail" => $error,
);

$json_result = json_encode($result);

echo $json_result;
