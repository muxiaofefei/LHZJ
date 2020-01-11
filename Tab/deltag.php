<?php 
header("Content-Type: text/html;charset=utf-8");
include('conn.php');

$q = $_GET["q"];

$stmt = $pdo->prepare("delete from tags where tagname = :tagname");
//执行一条预处理语句 .成功时返回 TRUE, 失败时返回 FALSE 
$stmt->execute(array(
    ":tagname" => $q
));  

?>