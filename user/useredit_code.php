<?php 
include('conn.php');

$data = $_POST;
$id = $_GET['id'];
// print_r($id);die;

if(empty($data)){
	echo "错误：数据为空！！！！";
	die;
}

$count  =  $pdo->exec("UPDATE `user` SET `name`='".$data['uname']."',`tel`='".$data['mobile']."',`adders`='".$data['address']."',`notice`='".$data['notice']."',`tags`='".$data['tags']."' WHERE `Id`=".$id); //返回受影响的行数



$stmt = $pdo->prepare("select tel from user where tel = :tel");
$stmt->execute(array(
    ":tel" => $data['mobile']
));  
$rows_count = $stmt->rowCount();
if($rows_count == 0){
	$isnone = 0;
}elseif($rows_count == 1){
	$isnone = 0;
}else{
	$isnone = $rows_count;
}


$count  =  $pdo->exec("UPDATE `user` SET `isnone`='".$isnone."' WHERE `Id`=".$id); //返回受影响的行数

 ?>

 <script type="text/javascript">
alert("修改成功！");
// window.location.href="./useredit.php?id=<?=$id?>"; 
window.location.href="./userlist.php"; 

 </script>