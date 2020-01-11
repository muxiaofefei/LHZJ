<?php 
header("Content-Type: text/html;charset=utf-8");
include('conn.php');

$q = $_GET["q"];

$stmt = $pdo->prepare("select tagname from tags where tagname = :tagname");

//执行一条预处理语句 .成功时返回 TRUE, 失败时返回 FALSE 
$stmt->execute(array(
    ":tagname" => $q
));  
$rows_count = $stmt->rowCount();

if(!$rows_count && $q!=""){
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO tags (tagname)
    VALUES ('".$q."')";
    // 使用 exec() ，没有结果返回 
    $pdo->exec($sql);
    echo "新记录插入成功";
}

?>