<?php 
include 'conn.php';
$fid = $_GET['fid'];
$kid = $_GET['kid'];
$stmt = $pdo->query('select path from file_cx where Id ='.$fid); //返回一个PDOStatement对象
$rows=$stmt->fetchAll(PDO::FETCH_BOTH);//既有索引键也有关联键

// print_r($rows);die;
unlink($rows[0]['path']);

$count  =  $pdo->exec("delete from  file_cx where Id =".$fid); //返回受影响的行数
 ?>


<script type="text/javascript">
	alert("删除成功！");
	window.location.href="./upload.php?kid=<?=$kid?>"; 

</script>