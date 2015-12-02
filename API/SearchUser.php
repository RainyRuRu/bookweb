<?php 
session_start();

$account = $_POST['acc'];
$pwd = $_POST['pwd'];

$result = false;
$error = null;
$data = false;

try {

    $dsn = 'mysql:dbname=bookweb;host=140.127.74.142';
	$user = 'bookweb';
	$password = '1234';
	
	$db = new PDO($dsn, $user, $password);
	$db->exec("set names utf8");

    $stmt = $db->prepare('SELECT * from `user` WHERE account = :account');
    $stmt->bindParam(":account", $account);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row != false) {
    	if ($row['password'] != $pwd) {
    		$error = "password";
    	} else {
    		$data = true;
    		$_SESSION['u_id'] = $row['user_id'];
    	}
    } else {
        $error = "account";
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