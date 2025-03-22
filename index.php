<?php
//首页php

session_start();

// var_dump($_SESSION);

//检测登录状态
if($_SESSION['login_status']==1){
    $ms = '<a href="myhome.html">已登录</a>';
}else{
    $ms = '<a href="myhome.html">未登录</a>';
}

//登出
if(isset($_POST['logout'])){
    session_destroy();
    header('Location: index.php');
    exit;
}


include('index.html');
?>