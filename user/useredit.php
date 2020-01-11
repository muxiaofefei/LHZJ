<?php 

include('conn.php');
$id = $_GET['id'];

$stmt = $pdo->prepare('select * from user where Id = :Id'); //返回一个PDOStatement对象
$stmt->execute(array(
    ":Id" => $id
    ));

$data=$stmt->fetch(PDO::FETCH_ASSOC);

 ?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<meta content="email=no" name="format-detection">
<meta content="initial-scale=1.0,user-scalable=no,maximum-scale=1" media="(device-height: 568px)" name="viewport">
<title>用户信息</title>

<!-- 标签样式 -->
<link href="css/biaoqian.css" type="text/css" rel="stylesheet" />

<style>
	dl dt,dl dd{
		display: inline-block;
	}

	input{
		height: 30px;
		line-height: 30px;
		padding: 0 10px;
	}

	textarea{
		resize: none;
		width: 200px;
		line-height: 30px;
		padding: 0 10px;
		height: 60px;
	}
</style>

</head>
<body>
 <a href="./userlist.php">首页</a>
<form action="useredit_code.php?id=<?=$id?>" name="form1" method="post" autocomplete="off">

	<dl>
        <dt>姓名：</dt>
        <dd>
            <input type="text" name="uname" value="<?=$data['name']?>">
        </dd>
    </dl>
	<dl>
        <dt>电话：</dt>
        <dd>
            <input type="text" name="mobile" value="<?=$data['tel']?>">
        </dd>
    </dl>
	<dl>
        <dt>地址：</dt>
        <dd>
        	<textarea name="address" id="" cols="30" rows="10"><?=$data['adders']?></textarea>
        </dd>
    </dl>
	<dl>
        <dt>备注：</dt>
        <dd>
            <textarea name="notice" id="" cols="30" rows="10"><?=$data['notice']?></textarea>
        </dd>

        <input type="hidden" name="tags" id="tags" value="<?=$data['tags']?>">
    </dl>

<?php 
    $stmt = $pdo->query('select Id,tagname from tags'); //返回一个PDOStatement对象
    $rows=$stmt->fetchAll(PDO::FETCH_BOTH);//既有索引键也有关联键
    // print_r($rows);
 ?>


<div class="demo">	

<div class="plus-tag tagbtn clearfix" id="myTags">
    <?php 
    if($data['tags']!=''){
        $data['tags'] = explode(",", $data['tags']);

     ?>
    <?php foreach ($data['tags'] as $key => $value) {
        $tagid = $value - 1;
        // echo $tagid;
    ?>
        <a value="-1" title="<?=$rows[$tagid]['tagname']?>" tagid="<?=$rows[$tagid]['Id']?>" href="javascript:void(0);"><span><?=$rows[$tagid]['tagname']?></span><em></em></a>
    <?php
    	}
    } ?>

</div>

<div id="mycard-plus">
		<div class="default-tag tagbtn">
			<div class="clearfix">
                <?php foreach ($rows as $k) { ?>
    				<a value="-1" title="<?=$k['tagname']?>" tagid="<?=$k['Id']?>" href="javascript:void(0);"><span><?=$k['tagname']?></span><em></em></a>
                <?php } ?>  
            </div>

		</div>


	</div>
</div>

	<input type="submit" name="">
	<button type="button" οnclick="window.location.href='reg.php'">删除</button>

</form>
</body>

<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>

<script type="text/javascript" src="js/biaoqiantexiao.js"></script>


<script src="asset/verJs.js"></script>
<script>
    var form = new VerJs();
    form.init({
        form:"form",//验证的表单
        //验证数据集，也可以在标记中以data-XXX的形式加入验证
        data:{
            uname:{
                required:true
            },
            mobile:{
                mobile:true,
                required:true
            },
            min_number:{
                min:2
            },
            max_number:{
                max:12
            },
            eq:{
                equal:"#eq"
            },
            min_length:{
                minlength:6
            },
            max_length:{
                maxlength:6
            },
            rule:{
                rule:"^\\d{6}$",
                required:true
            }
        },
        //验证提示消息
        message:{
            req:{
                required:"这是一条必填数据"
            },
            rule:{
                rule:"请输入六位数字"
            }
        },
        success:function (data) {
            //ajax提交成功后的回调函数
            alert("提交成功！");
            window.location.href="./useredit_code.php"; 
        },
        fail:function (data) {
            //ajax提交失败后的回调函数
            alert("ieieiiruwei");
        }
    });
</script>

<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
<p>适用浏览器：360、FireFox、Chrome、Opera、傲游、搜狗、世界之窗. 不支持Safari、IE8及以下浏览器。</p>
<p>来源：<a href="http://sc.chinaz.com/" target="_blank">站长素材</a></p>
</div>
</html>
