<?php 
include 'conn.php';

$kid = $_GET['kid'];
// echo $kid;

$stmt = $pdo->query('select * from file_cx where kid ='.$kid); //返回一个PDOStatement对象
$rows=$stmt->fetchAll(PDO::FETCH_BOTH);//既有索引键也有关联键

// print_r($rows);


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>文件上传</title>
	<meta charset="utf-8">
</head>
<body>
	 <a href="./userlist.php">用户列表</a>
	<center>
		<!-- enctype="mulipart/form-data"属性是指以二进制方式进行数据传输 
		传输文件需要设置-->
		<form action="upload_server.php?kid=<?=$kid?>" method="post" enctype="multipart/form-data">
		<!-- <input type="hidden" name="max_file_size" value="1048576"> -->
		<input type="file" name="file[]" multiple>
		<br>
		<textarea name="notice"></textarea>
		<br>
		<input type="submit" name="上传">		
	</form>
	</center>
	

	<table border="1">
		<tr>
			<td>编号</td>
			<td>名称</td>
			<td>时间</td>
			<td>删除</td>
		</tr>
	
			<?php 
			$i=1;
			foreach ($rows as $key => $value) {
			?>
				<tr>
			<td><?=$i;?></td>
			<td><a href="<?=$value['url'];?>"><?=$value['notice'];?></a></td>
			<td><?=$value['dtime'];?></td>
			<td><a href="delfile.php?fid=<?=$value['Id']?>&kid=<?=$kid?>">删除</a></td>
		</tr>

			<?php
			$i++;
			}
			?>
	</table>

</body>
</html>
