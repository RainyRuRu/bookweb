<?php

$account = $_POST['acc'];
$pwd = $_POST['pwd'];
$name = $_POST['name'];
$dept = $_POST['dept'];
$degree = $_POST['degree'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$error = null;
$saved = false;

try {

    $dsn = 'mysql:dbname=bookweb;host=140.127.74.142';
	$user = 'bookweb';
	$password = '1234';
	
	$db = new PDO($dsn, $user, $password);
	$db->exec("set names utf8");

	$accountCheck = searchAccount($db, $account);

	if ($accountCheck) {
		insertAccount($db, $account, $pwd);
		$u_id = searchID($db, $account);
		insertUserInfo($db, $name, $dept, $degree, $email, $phone, $address, $u_id);
		$saved = true;
	} else {
		$error = "account";
		$saved = false;
	}
    
    
} catch (PDOException $e) {
	 $error = $e;
}

$result = array(
	"result" => $saved,
	"responseDetail" => $error,
);

$json_result = json_encode($result);

echo $json_result;

//----exit----

function searchAccount($db, $account) {

	$stmt = $db->prepare('SELECT * from `user` WHERE account = :account');
    $stmt->bindParam(":account", $account);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row != false) {
    	return false;
    } 
        
    return true;
}


function insertAccount($db, $account, $password){

	$stmt = $db->prepare('INSERT INTO `user` (`account`, `password`) VALUES (:account, :password)');
    
    $stmt->bindParam(":account", $account);
    $stmt->bindParam(":password", $password);

    $stmt->execute();
}


function searchID($db, $account){

	$stmt = $db->prepare('SELECT user_id from `user` WHERE account = :account');
    $stmt->bindParam(":account", $account);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row['user_id'];
}


function insertUserInfo($db, $name, $dept, $degree, $email, $phone, $address, $u_id){

	$stmt = $db->prepare('INSERT INTO `userinfo` (`name`, `department`, `degree`, `phone`, `address`, `email`, `u_id`) 
		VALUES (:name, :department, :degree, :phone, :address, :email, :u_id)');
    
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":department", $dept);
    $stmt->bindParam(":degree", $degree);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":address", $address);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":u_id", $u_id);

    $stmt->execute();
}


