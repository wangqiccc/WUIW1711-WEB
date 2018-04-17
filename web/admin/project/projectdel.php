<?php
$id=$_GET["id"];
include "../../public/db.php";
$sql="delete from project where pid='{$id}'";
$db->query($sql);
if($db->affected_rows===1){
    $msg="删除成功";
}else{
    $msg="删除失败";
}
$href="projectlist.php";
include "../message.php";
