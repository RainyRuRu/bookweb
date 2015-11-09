<?php

$u_id = $_POST['u_id'];
$name = $_POST['name'];
$dept = $_POST['dept'];
$degree = $_POST['degree'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

/*
test data
$u_id = '1';
$name = 'Rainy';
$dept = '軟體工程與管理學系';
$degree = '3年級';
$email = 'believeu123@yahoo.com.tw';
$phone = '09001111111';
$address = 'yaya';
*/

$error = null;
$saved = false;

try {

	$dsn = 'mysql:dbname=bookweb;host=140.127.74.164';
	$user = 'bookweb';
	$password = '1234';
	
	$db = new PDO($dsn, $user, $password);
	$db->exec("set names utf8");
    
    $stmt = $db->prepare('UPDATE `userinfo` SET name = :name , department = :dept , 
    	degree = :degree , phone = :phone , address = :address , email = :email
    	WHERE u_id = :u_id');
    $stmt->bindParam(":u_id", $u_id);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":dept", $dept);
    $stmt->bindParam(":degree", $degree);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":address", $address);

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