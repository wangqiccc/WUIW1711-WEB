<?php
$tid=$_POST["tid"];
$tname=$_POST["tname"];
$tename=$_POST["tename"];
$tposition=$_POST['tposition'];
$tthumb=$_POST["tthumb"];
$tdescription=$_POST["tdescription"];
include "../../public/db.php";
$sql="UPDATE team SET tname='{$tname}',tename='{$tename}',tposition='{$tposition}',tthumb='{$tthumb}',
     tdescription='{$tdescription}'WHERE tid=$tid";
$db->query($sql);
if ($db->affected_rows===1){
    $msg="修改成功";
    $href="teamlist.php";
}else{
    $msg="修改失败";
    $href="teamupdate.php?id=$tid";
}
include "../message.php";