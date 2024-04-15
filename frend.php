<?php
session_start();


$frend_tel=$_POST["frend_tel"];
$_SESSION["to"]=$frend_tel;
//var_dump($_SESSION);


//对数据库进行增删改查
$link = mysqli_connect('mysql636.db.sakura.ne.jp','shawn','csw-123456','shawn_db');

//判断连接状况
if (mysqli_connect_errno()) {
    echo '连接失败';
}

//先看该用户是否存在
$res=mysqli_query($link, "select tel from users where tel='$frend_tel'");
if ($res) {
    $ress=mysqli_fetch_assoc($res);
    if ($ress==NULL) {
        echo "用户不存在";
    }else {
        echo "<form action='addfrend.php' method='post'>";
        echo "<input type='submit' value='加好友' name='addfrend'>";
        echo "</form>";
        //var_dump($_SESSION);
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





?>
