<?php
//展示好友列表

session_start();
$wid=$_SESSION["id"];
// var_dump($_SESSION);

include 'config.php';
$link = mysqli_connect(servername,username,password,dbname);
//$link = mysqli_connect('mysql636.db.sakura.ne.jp','shawn','csw-123456','shawn_db');
//判断连接状况
if (mysqli_connect_errno()) {
    echo '连接失败';
}
$res = mysqli_query($link, "select to2 from frend where from1='$wid'");
if ($res){
    while ($ress = mysqli_fetch_assoc($res)){
        $output .= $ress["to2"]."<br>";
    }
}
$ms = $output;


include('showfriends.html')

?>