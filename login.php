<?php
//登录页面，登录成功 => myhome.html
//         登录失败 => 向index.html返回信息

session_start();

//接收数据
$name=$_POST["name"];
$password=$_POST["password"];

//邮箱为空执行
if ($email==''){
    $loginms = "请输入邮箱";
    //echo "<a href='login.html'>返回</a>";
}
if ($password==''){
    $loginms = "请输入密码";
    //echo "<a href='login.html'>返回</a>";
}

//连接
require_once 'config.php';
$link = mysqli_connect('$servername','$username','$password','$dbname');
//$link = mysqli_connect('mysql636.db.sakura.ne.jp','shawn','csw-123456','shawn_db');

//判断连接状况
if (mysqli_connect_errno()) {
    echo '连接失败';
}

$res=mysqli_query($link, "select name from users2 where name='$name' AND password='$password'");
if ($res) {
    $ress=mysqli_fetch_assoc($res);
    if ($ress==NULL) {
        $loginms = '名字或密码输入错误';
    }else {
        header('Location: myhome.html');
        $_SESSION['id']=$name;
        $_SESSION['login_status']=1;
    }
}




include('index.html');









?>