<?php
$gname=$_POST["gname"];
$gename=$_POST["gename"];
$gthumb=$_POST["gthumb"];
$gpicture=$_POST["gpicture"];
$gdescription=$_POST["gdescription"];
include "../../public/db.php";
$sql="insert into goods(gname,gename,gthumb,gpicture,gdescription)VALUES ('{$gname}','{$gename}','{$gthumb}','{$gpicture}','{$gdescription}')";
//var_dump($sql);
$db->query($sql);
if ($db->affected_rows===1){
    $msg="添加成功";
}else{
    $msg="添加失败";
}
$href="goodslist.php";
include "../message.php";