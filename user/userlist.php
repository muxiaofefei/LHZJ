<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户信息列表</title>
</head>
<body>
	
<?php 
error_reporting(0); //屏蔽错误信息
include('conn.php');
$id = $_GET['id'];
if(empty($id)){
	// 查询用户信息
	$stmt = $pdo->query('select Id,name,tel,adders,tags from user'); //返回一个PDOStatement对象
	$rows=$stmt->fetchAll(PDO::FETCH_BOTH);//既有索引键也有关联键
	// print_r($rows);
}else {
	//按标签查询用户信息
	$stmt = $pdo->query('select * from user where FIND_IN_SET('.$id.',tags)'); //返回一个PDOStatement对象
	$rows=$stmt->fetchAll(PDO::FETCH_BOTH);//既有索引键也有关联键
	// 查询标签信息
	$stmt = $pdo->query('select tagname from tags where Id ='.$id); //返回一个PDOStatement对象
	$tagname=$stmt->fetchAll(PDO::FETCH_BOTH);//既有索引键也有关联键
	// print_r($rows);die;
}

 ?>
 <a href="../">首页</a>
<table border="1">
	<tr>
		<td>编号</td>
		<td>姓名</td>
		<td>地址</td>
		<td>标签</td>
		<td>添加文件</td>
	</tr>
	<?php 
	$i=1;
	foreach ($rows as $key => $value) {
	?>
	<tr>
		<td><?=$i;?></td>
		<td><a href="./useredit.php?id=<?=$value['Id']?>"><?=$value['name']?></a></td>
		<td><?=$value['adders']?></td>
		<td>
		<?php 
		//按id输出标签中文名称
		$tags = explode(",",$value['tags']);
		foreach ($tags as $key => $value1) {
			// echo $value1;		
			$stmt = $pdo->query('select tagname from tags where Id ='.$value1); //返回一个PDOStatement对象
			$rows=$stmt->fetchAll(PDO::FETCH_BOTH);//既有索引键也有关联键
			// print_r($rows);
			echo "<a href='./userlist.php?id=".$value1."'>".$rows[0]['tagname']."</a>";
			echo "-";
		}

		// 查询改项目的文件数量
		$stmt = $pdo->prepare("select Id from file_cx where kid = :kid");
		$stmt->execute(array(
		    ":kid" => $value['Id']
		));  
		$rows_count = $stmt->rowCount();

		?>	
		</td>
		<td><a href="./upload.php?kid=<?=$value['Id']?>">添加文件--<?=$rows_count?></a></td>
	</tr>
	<?php
	$i++;
	} ?>
</table>



</body>
</html>