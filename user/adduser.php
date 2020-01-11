<?php 
include('conn.php');

$data = $_POST;

$stmt = $pdo->prepare("select tel from user where tel = :tel");
$stmt->execute(array(
    ":tel" => $data['mobile']
));  
$rows_count = $stmt->rowCount();
if($rows_count){
	$isnone = $rows_count + 1;
}else{
	$isnone = 0;
}

$stmt = $pdo->prepare("insert into user(name,tel,adders,notice,tags,isnone)values(:name,:tel,:adders,:notice,:tags,:isnone)");
$stmt->execute(array(
    ":name" => $data['uname'],
    ":tel" => $data['mobile'],
    ":adders" => $data['address'],
    ":notice" => $data['notice'],
    ":tags" => $data['tags'],
    ":isnone" => $isnone
));
 ?>