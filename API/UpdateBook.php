<?php

$b_id = $_POST['b_id'];
$name = $_POST['name'];
$publisher = $_POST['publisher'];
$author = $_POST['author'];
$price = $_POST['price'];
$img = $_POST['img'];
$content = $_POST['content'];

$result = false;
$error = null;
$data = array();

try {

    $dsn = 'mysql:dbname=bookweb;host=140.127.74.164';
    $user = 'bookweb';
    $password = '1234';

    $db = new PDO($dsn, $user, $password);
    $db->exec("set names utf8");
    $stmt = $db->prepare("UPDATE `books` SET  `name` = :name, `content` = :content, 
            `publisher` = :publisher, `price` = :price, `img` = :img, `author` = :author
            Where book_id = :b_id");

    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":content", $content);
    $stmt->bindParam(":publisher", $publisher);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":img", $img);
    $stmt->bindParam(":author", $author);
    $stmt->bindParam(":b_id", $b_id);

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