<?php
//搜素好友。如果存在则显示添加按钮，指向addfriend.php

session_start();
// var_dump($_SESSION);


$frend_name=$_POST["frend_name"];
$_SESSION["to"]=$frend_name;
// var_dump($_SESSION);


//对数据库进行增删改查
include 'config.php';
$link = mysqli_connect(servername,username,password,dbname);
//$link = mysqli_connect('mysql636.db.sakura.ne.jp','shawn','csw-123456','shawn_db');

//判断连接状况
if (mysqli_connect_errno()) {
    echo '连接失败';
}

//先看该用户是否存在
$res=mysqli_query($link, "select name from users2 where name='$frend_name'");
if ($res) {
    $ress=mysqli_fetch_assoc($res);
    if ($ress==NULL) {
        $ms = "用户不存在";
    }else {
        $ms = "<br><form action='addfriend.php' method='post'><input type='submit' class='btn' value='加好友' name='addfrend'></form><br><br>";
        // var_dump($_SESSION);
    }
}

/*
if(isset($_POST["frend"])){
    $wid=$_SESSION["id"];
    $wto=$_SESSION["to"];
    $res=mysqli_query($link, "insert into frend (from1, to2, status) values ('$wid', '$wto', 0)");
    var_dump($_SESSION);
}
 
*/




include('myhome.html');
?>
