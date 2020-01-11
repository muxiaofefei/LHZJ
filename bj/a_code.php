<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>

<table border="1">

<?php 

// 选择配置数据库
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "lhzj";

$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->exec('set names utf8');

//去除数组中数据空格
function TrimArray($Input){
    if (!is_array($Input))
        return trim($Input);
    return array_map('TrimArray', $Input);
}
// 获取前端页面提交数据
$data_a_formA = $_POST['waiji_xh'];

// print_r($data_a_formA);die;

$NCwaiji_xh = explode("\n",(string)$data_a_formA);  //数据拆分
// print_r($waiji_xh);die;

$Cwaiji_xh = TrimArray($NCwaiji_xh);
// print_r(array_count_values($waiji_xh));
$waiji_xh = array_count_values($Cwaiji_xh);

// print_r($waiji_xh);die;

$i=0;
foreach ($waiji_xh as $key => $value) {
	
	if(!empty($key)){
		
		// echo $key;
		// echo "<hr>";
				
		$res = $pdo->query('select * from daikin_air where TYPE like "%'.$key.'%"');
		$rows = array();
		while($row = $res->fetch()){
		    $rows[] = $row;
		}

		$db_data[$i]['TYPE'] = $rows[0]['TYPE'];
		$db_data[$i]['count'] = $value;
		$db_data[$i]['CPRICE'] = $rows[0]['CPRICE'];
		$db_data[$i]['DPRICE'] = $rows[0]['DPRICE'];
		$db_data[$i]['NOTICE'] = $rows[0]['NOTICE'];


	}
	$i++;

}

// die;
// print_r($db_data);
// die;

//对二维数组进行降序排列
$last = array_column($db_data,'CPRICE');
array_multisort($last,SORT_DESC,$db_data);

// print_r($db_data);
// die;

$j=0;
$Cwj=0;
$Cnj=0;
foreach ($db_data as $key => $value) {
	

		if(strstr($db_data[$j]['NOTICE'], '外机')){
			$Cwj+=$db_data[$j]['count'];
			$ktjqxh = '外机';
		}else{
			$Cnj+=$db_data[$j]['count'];
			$ktjqxh = '内机';
		}

		echo "<tr>";
		echo "<td>空调".$ktjqxh."</td>";
		echo "<td>".$db_data[$j]['TYPE']."</td>";
		echo "<td>".$db_data[$j]['count']."</td>";
		echo "<td>台</td>";
		echo "<td  colspan='2'>".$db_data[$j]['CPRICE']."</td>";
		echo "<td>".$db_data[$j]['CPRICE']*$db_data[$j]['count']."</td>";
		echo "<td>".$db_data[$j]['DPRICE']."</td>";
		echo "<td>".$db_data[$j]['count']."</td>";
		echo "<td>".$db_data[$j]['DPRICE']*$db_data[$j]['count']."</td>";
		// echo "<td>".$rows[0]['NOTICE']."</td>";
		echo "</tr>";

	$j++;

}

echo "内机台数".$Cnj;
echo "=====";
echo "外机台数".$Cwj;
die;


foreach ($waiji_xh as $key => $value) {
	if(!empty($key)){
			
		$res = $pdo->query('select * from daikin_air where TYPE like "%'.$key.'%"');
		$rows = array();
		while($row = $res->fetch()){
		    $rows[] = $row;
		}
		// print_r($rows);
		echo "<tr>";
		echo "<td>空调内机</td>";
		echo "<td>".$rows[0]['TYPE']."</td>";
		echo "<td>".$value."</td>";
		echo "<td>台</td>";
		echo "<td  colspan='2'>".$rows[0]['CPRICE']."</td>";
		echo "<td>".$rows[0]['CPRICE']*$value."</td>";
		echo "<td>".$rows[0]['DPRICE']*$value."</td>";
		// echo "<td>".$rows[0]['NOTICE']."</td>";
		echo "</tr>";
	}
}

 ?>

</table>


</body>
</html>