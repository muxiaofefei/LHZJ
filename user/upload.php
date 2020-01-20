<?php 
include 'conn.php';

$kid = $_GET['kid'];
// echo $kid;

$stmt = $pdo->query("select * from file_cx where kid = $kid order by dtime desc"); //返回一个PDOStatement对象
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
	

<!-- <input type="checkbox" name="vehicle" value="Bike" /> -->

	<form action="./delfile.php?kid=<?=$kid?>" name="form1" method="post">
		
		<table border="1" id="checklist">
			<tr>
				<td>编号</td>
				<td>名称</td>
				<td>时间</td>
				<td>
					-<a id="all" href="#" onclick="swapCheck()">全选</a>-|
					<input type="submit" name="sc" value="删除">-|
				</td>
			</tr>
		
				<?php 
				$i=1;
				foreach ($rows as $key => $value) {
				?>
			<tr>
				<td><?=$i;?></td>
				<td><a href="<?=$value['url'];?>"><?=$value['notice'];?></a></td>
				<td><?=$value['dtime'];?></td>
				<td><label>
					<input type="checkbox" name="bh[]" value="<?=$value['Id']?>">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<!-- <a href="delfile.php?fid=<?=$value['Id']?>&kid=<?=$kid?>">删除</a> -->
				</td>
			</tr>

				<?php
				$i++;
				}
				?>
		</table>
	
	</form>
</body>
</html>

<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>

<script type="text/javascript">
		//checkbox 全选/取消全选
		var isCheckAll = false;
		function swapCheck() {
			if (isCheckAll) {
				$("input[type='checkbox']").each(function() {
					this.checked = false;
				});
				isCheckAll = false;
			} else {
				$("input[type='checkbox']").each(function() {
					this.checked = true;
				});
				isCheckAll = true;
			}
		}
	</script>

