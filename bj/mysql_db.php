
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

 <?php

$dbhost = 'localhost';  // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = 'root';          // mysql用户名密码

// 创建数据库
$con = mysql_connect($dbhost,$dbuser,$dbpass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

if (mysql_query("CREATE DATABASE LHZJ",$con))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }


/*
mysql_select_db("LHZJ", $con);

$sql = "CREATE TABLE DAIKIN_AIR_PRICE 
(
DAKIN_ID int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(DAKIN_ID),
NAME varchar(50),
TYPE varchar(15),
PPRICE INT,
DPRICE int
)";

mysql_query($sql,$con);*/

  

mysql_close($con);







// 删除数据库
/*$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
    die('连接失败: ' . mysqli_error($conn));
}
echo '连接成功<br />';
$sql = 'DROP DATABASE my_db';
$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
    die('删除数据库失败: ' . mysqli_error($conn));
}
echo "数据库 my_db 删除成功\n";
mysqli_close($conn);*/


?>