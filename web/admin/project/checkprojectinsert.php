<?php
$pname=$_POST["pname"];
$pthumb=$_POST["pthumb"];
$ppicture=$_POST["ppicture"];
$pdescription=$_POST["pdescription"];
$did=$_POST["did"];
$ptype=$_POST["ptype"];
include "../../public/db.php";
$sql="insert into project(pname,pthumb,ppicture,pdescription,did,ptype) VALUES ('{$pname}','{$pthumb}','{$ppicture}','{$pdescription}','{$did}','{$ptype}')";
$db->query($sql);
if ($db->affected_rows===1){
    $msg="添加成功";
}else{
    $msg="添加失败";
}
$href="projectlist.php";
include "../message.php";