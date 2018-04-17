<?php
$oldpass=$_POST["oldpass"];
$newpass=$_POST["newpass"];
//include "../static/db.php";
$db=new mysqli("localhost","root","","web");
$db->query("set names utf8");
$sql="select * from admin";
$r=$db->query($sql);
$arr=$r->fetch_array(MYSQLI_ASSOC);
if($oldpass===$arr["password"]){
    $sql="update `admin` set `password`= '{$newpass}'";
    $db->query($sql);
    $msg="修改密码成功";
}else{
    $msg="原密码输入错误";
}
$href="updatepass.php";
include "../message.php";

