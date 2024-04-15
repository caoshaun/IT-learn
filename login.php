<?php
session_start();

//接收数据
$name=$_POST["name"];
$password=$_POST["password"];

//连接
$link = mysqli_connect('mysql636.db.sakura.ne.jp','shawn','csw-123456','shawn_db');

//判断连接状况
if (mysqli_connect_errno()) {
    echo '连接失败';
}

$res=mysqli_query($link, "select name from users2 where name='$name' AND password='$password'");
if ($res) {
    $ress=mysqli_fetch_assoc($res);
    if ($ress==NULL) {
        $ms = '电话或密码输入错误';
    }else {
        header('Location: myhome.html');
        $_SESSION['id']=$name;
        $_SESSION['login_status']=1;
    }
}




// include('index.html');









?>