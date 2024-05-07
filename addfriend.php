<?php
//添加好友
require_once 'config.php';

session_start();

$link = mysqli_connect('$servername','$username','$password','$dbname');
//$link = mysqli_connect('mysql636.db.sakura.ne.jp','shawn','csw-123456','shawn_db');

//判断连接状况
if (mysqli_connect_errno()) {
    echo '连接失败';
}


$wid=$_SESSION["id"];
$wto=$_SESSION["to"];
$res=mysqli_query($link, "insert into frend (from1, to2, status) values ('$wid', '$wto', 0)");


/*
if(isset($_POST["addfrend"])){
    $wid=$_SESSION["id"];
    $wto=$_SESSION["to"];
    $res=mysqli_query($link, "insert into frend (from1, to2, status) values ('$wid', '$wto', 0)");
    var_dump($_SESSION);
}
 
*/
include("myhome.html");


?>