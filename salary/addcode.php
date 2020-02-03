<?php 
include 'conn.php';

$data = $_POST;
// print_r($data);die;

$stmt = $pdo->prepare("insert into salary(money,notice)values(:money,:notice)");
$stmt->execute(array(
    ":money" => $data['money'],
    ":notice" => $data['notice']
));


 ?>


 <script type="text/javascript">
	alert("添加成功！");
	window.location.href="./index.php"; 

</script>