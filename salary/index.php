<!DOCTYPE html>
<html>
<head>
	<title>工资记录</title>
</head>
<body>
<?php 
    include('conn.php');
    $stmt = $pdo->query('select * from salary'); //返回一个PDOStatement对象
    $rows=$stmt->fetchAll(PDO::FETCH_BOTH);//既有索引键也有关联键
	// print_r($rows);
	?>

<form action="addcode.php" method="post">
	工资：<input type="text" name="money">
	<br>
	备注：<input type="text" name="notice">
	<br>
	<input type="submit" name="提交">
</form>



<table border="1">
	<tr>
		<td>序号</td>
		<td>工资</td>
		<td>备注</td>
	</tr>


	<?php 
	$i=0;
	foreach ($rows as $key => $value) {
	 $i++;
	 ?>
		<tr>
			<td><?=$i?></td>
			<td><?=$value['money']?></td>
			<td><?=$value['notice']?></td>
		</tr>
	<?php } ?>
</table>

</body>
</html>