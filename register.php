<?php
//注册会员

//接收数据
$name=$_POST["name"];
$password=$_POST["password"];

require_once 'config.php';
$link = mysqli_connect('$servername','$username','$password','$dbname');
//连接
//$link = mysqli_connect('mysql636.db.sakura.ne.jp','shawn','csw-123456','shawn_db');

//判断连接状况
if (mysqli_connect_errno()) {
    echo '连接失败';
}

$res=mysqli_query($link, "select name from users2 where name='$name'");
if ($res) {
    $ress=mysqli_fetch_assoc($res);
    if ($ress==NULL) {
        $res=mysqli_query($link, "insert into users2 (name, password) values ('$name', '$password')");
        $loginms = '注册成功';
    }else {
        $loginms = '该名字已注册';
    }
}

include('index.html');












?>