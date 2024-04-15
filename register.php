<?php
//注册会员

//接收数据
$name=$_POST["name"];
$password=$_POST["password"];

//连接
$link = mysqli_connect('mysql636.db.sakura.ne.jp','shawn','csw-123456','shawn_db');

//判断连接状况
if (mysqli_connect_errno()) {
    echo '连接失败';
}

$res=mysqli_query($link, "select name from users2 where name='$name'");
if ($res) {
    $ress=mysqli_fetch_assoc($res);
    if ($ress==NULL) {
        $res=mysqli_query($link, "insert into users2 (name, password) values ('$name', '$password')");
        $ms = '注册成功';
    }else {
        $ms = '该电话已注册';
    }
}

include('index.html');












?>