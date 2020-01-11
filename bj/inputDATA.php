<!-- 将特定txt格式的文件数据导入mysql数据库 -->

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php
// 选择配置数据库
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "lhzj";
 

//选择导入文件的路径
$file_path = "datatxt/TYPE.txt";
$file_path1 = "datatxt/NOTICE.txt";
$file_path2 = "datatxt/DPRICE.txt";
$file_path3 = "datatxt/CPRICE.txt";

if(file_exists($file_path)){

	$type_arr = file($file_path);
	$notice_arr = file($file_path1);
	$dprice_arr = file($file_path2);
	$cprice_arr = file($file_path3);

	try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// 设置 PDO 错误模式，用于抛出异常
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	for($i=0;$i<count($type_arr);$i++){//逐行读取文件内容

			// 数据样例
			// RPZQ10BAY（原型号RPZQ10AAY已停产）

			preg_match_all("/[\(,（].*[\),）]/",$type_arr[$i], $out);	//匹配圆括号的数据
			$type = preg_replace("/[\(,（].*[\),）]/","",$type_arr[$i]);	//将圆括号的数据替换为空


		    $sql = "INSERT INTO daikin_air (TYPE,DPRICE,CPRICE,NOTICE)
		   
		    VALUES ('".$type."','".$dprice_arr[$i]."','".$cprice_arr[$i]."','".$out[0][0].$notice_arr[$i]."')";
		    
		    // 使用 exec() ，没有结果返回 
		    $conn->exec($sql);
		    echo "新记录插入成功";
		    echo "<br>";
	

	}


		}
		catch(PDOException $e)
		{
		    echo $sql . "<br>" . $e->getMessage();
		}
		 
		$conn = null;


}


?>



