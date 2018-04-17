<?php
$id=$_GET["id"];
echo $id;
$pname=$_POST["pname"];
$pthumb=$_POST["pthumb"];
$ppicture=$_POST["ppicture"];
$pdescription=$_POST["pdescription"];
$did=$_POST["did"];
$ptype=$_POST["ptype"];
include "../../public/db.php";
$sql="UPDATE project SET pname='{$pname}',pthumb='{$pthumb}',
      ppicture='{$ppicture}',pdescription='{$pdescription}',did='{$did}',ptype='{$ptype}'WHERE pid=$id";
$db->query($sql);
//echo $sql;
if ($db->affected_rows===1){
    $msg="修改成功";
    $href="projectlist.php";
}else{
    $msg="修改失败";
    $href="projectupdate.php?id=$id";
}
include "../message.php";