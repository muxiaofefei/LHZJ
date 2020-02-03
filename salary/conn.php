<?php 

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "lhzj";
 
try{
	 $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    // 设置sql语句查询如果出现问题 就会抛出异常
     set_exception_handler("cus_exception_handler");
 } catch(PDOException $e){
        die("连接失败: ".$e->getMessage());
 }

 function cus_exception_handler($e)
{
       die("sql 异常: ".$e->getMessage());
}


 ?>