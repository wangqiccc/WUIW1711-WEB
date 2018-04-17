<?php
session_start();
unset($_SESSION["user"]);
if(isset($_SESSION["user"])){
    $msg="退出失败";
    $href="../admin.php";
}else{
    $msg="退出成功";
    $href="login.php";
}
include "../message.php";