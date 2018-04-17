<?php
$tname=$_GET["tname"];
$tename=$_GET["tename"];
$tposition=$_GET['tposition'];
$tthumb=$_GET["tthumb"];
$tdescription=$_GET["tdescription"];
include "../../public/db.php";
$sql="insert into team(tname,tename,tposition,tthumb,tdescription)VALUES ('{$tname}','{$tename}','{$tposition}','{$tthumb}','{$tdescription}')";
$db->query($sql);
if ($db->affected_rows===1){
    $msg="添加成功";
}else{
    $msg="添加失败";
}
$href="teamlist.php";
include "../message.php";