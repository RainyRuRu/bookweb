<?php
session_start();

$u_id =  $_SESSION['u_id'];
$name = $_POST['name'];
$publisher = $_POST['publisher'];
$author = $_POST['author'];
$price = $_POST['price'];
$img = $_POST['img'];
$content = $_POST['content'];

/*	
$u_id = 1;
$name = "作業系統";
$publisher = "東華書局";
$author = "?";
$price = "500";
$img = "";
$content = "作業系統";
*/
$result = false;
$error = null;
$data = array();

try {

	$dsn = 'mysql:dbname=bookweb;host=140.127.74.164';
	$user = 'bookweb';
	$password = '1234';

	$db = new PDO($dsn, $user, $password);
	$db->exec("set names utf8");
	$stmt = $db->prepare("INSERT INTO `books` 
		(`owner`, `name`, `content`, `publisher`, `status`, `price`, `img`, `author`)
		VALUES (:owner, :name, :content, :publisher, '0', :price, :img, :author)");

	$stmt->bindParam(":owner", $u_id);
	$stmt->bindParam(":name", $name);
	$stmt->bindParam(":content", $content);
	$stmt->bindParam(":publisher", $publisher);
	$stmt->bindParam(":price", $price);
	$stmt->bindParam(":img", $img);
	$stmt->bindParam(":author", $author);

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