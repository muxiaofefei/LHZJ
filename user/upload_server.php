<?php 
/**
 * 文件上传处理代码
 */

include 'conn.php';
header("content-type:text/html;charset=utf-8");
//设置时区
date_default_timezone_set('PRC');
//获取上传文件信息
$filedata = $_FILES['file'];
//获取客户id
$kid = $_GET['kid']; 
// 获取前端备注信息
$notice = $_POST['notice'];
if(empty($notice)){
  $notice = $filedata['name'][0];
}
// 统计上传文件的个数
$filecount = count($filedata['name']);
//检测存放上传文件的路径是否存在，如果不存在则新建目录
if (!file_exists('uploads')){
  mkdir('uploads');
}
// 循环依次逐个处理上传文件
for ($i=0; $i < $filecount; $i++) { 
    //获取文件名
  $filename = $filedata['name'][$i];
  //获取文件临时路径
  $temp_name = $filedata['tmp_name'][$i];

  //phpinfo函数会以数组的形式返回关于文件路径的信息 
  //[dirname]:目录路径[basename]:文件名[extension]:文件后缀名[filename]:不包含后缀的文件名
  $arr = pathinfo($filename);
  // print_r($arr);die;

  //获取文件的后缀名
  $ext_suffix = $arr['extension'];

  //为上传的文件新起一个名字，保证更加安全
  $new_filename = date('YmdHis',time()).rand(100,1000).'.'.$ext_suffix;
  
  //拼接网络地址方便用浏览器预览和下载文件
  $url='http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
  $dpath = 'uploads/'.$new_filename;
  $dz = dirname($url)."/".$dpath;

    
  $stmt = $pdo->prepare("insert into file_cx(kid,notice,path,url,dtime)values(:kid,:notice,:path,:url,:dtime)");
  $stmt->execute(array(
      ":kid" => $kid,
      ":notice" => $notice,
      ":path" => $dpath,
      ":url" => $dz,
      ":dtime" => date('Y-m-d H:i:s',time())
  ));

  move_uploaded_file($temp_name,$dpath);
}


// die;


/*  //获取大小
  $size = $filedata['size'];
  //获取文件上传码，0代表文件上传成功
  $error = $filedata['error'];
*/

  /*//判断文件大小是否超过设置的最大上传限制
  if ($size > 2*1024*1024){
    //
    echo "<script>alert('文件大小超过2M大小');window.history.go(-1);</script>";
    exit();
  }
*/

/*
  //phpinfo函数会以数组的形式返回关于文件路径的信息 
  //[dirname]:目录路径[basename]:文件名[extension]:文件后缀名[filename]:不包含后缀的文件名
  $arr = pathinfo($filename);
  //获取文件的后缀名
  $ext_suffix = $arr['extension'];
  //设置允许上传文件的后缀
  $allow_suffix = array('jpg','gif','jpeg','png');
  //判断上传的文件是否在允许的范围内（后缀）==>白名单判断
  if(!in_array($ext_suffix, $allow_suffix)){
    //window.history.go(-1)表示返回上一页并刷新页面
    echo "<script>alert('上传的文件类型只能是jpg,gif,jpeg,png');window.history.go(-1);</script>";
    exit();
  }
*/

/*
  
$url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];

$dpath = 'uploads/'.$new_filename;
$dz = dirname($url)."/".$dpath;



// unlink('uploads/20200108221137675.log');

  //将文件从临时路径移动到磁盘
  if (move_uploaded_file($temp_name,$dpath)){
    echo "<script>alert('文件上传成功！');</script>";
  }else{
    echo "<script>alert('文件上传失败,错误码：$error');</script>";
  }
*/
 ?>

<script type="text/javascript">
  window.location.href="./upload.php?kid=<?=$kid?>"; 
</script>




===============================================================================================
$_FILES[‘file’][‘error’]有以下几种类型

1、UPLOAD_ERR_OK：其值为 0，没有错误发生，文件上传成功。

2、UPLOAD_ERR_INI_SIZE：其值为 1，上传的文件超过了 php.ini 中 upload_max_filesize选项限制的值。

3、UPLOAD_ERR_FORM_SIZE：其值为 2，上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。

4、UPLOAD_ERR_PARTIAL：其值为 3，文件只有部分被上传。

5、UPLOAD_ERR_NO_FILE：其值为 4，没有文件被上传。

6、UPLOAD_ERR_NO_TMP_DIR：其值为 6，找不到临时文件夹。PHP 4.3.10 和 PHP 5.0.3 引进。

7、UPLOAD_ERR_CANT_WRITE：其值为 7，文件写入失败。PHP 5.1.0 引进。
————————————————
版权声明：本文为CSDN博主「阿南-anan」的原创文章，遵循 CC 4.0 BY-SA 版权协议，转载请附上原文出处链接及本声明。
原文链接：https://blog.csdn.net/weixin_42380348/article/details/89199344