<?php
header("content-Type:text/html;charset=utf-8");
$db=new mysqli("sqld.duapp.com","2f0bb36be96e459daf3d24c482f78dd0","1e8d0be75ecd4f3da24c92b7811928b2","WVBhKobOJBKdxvOSbecR",4050);
$db->query("set names utf8");
if($db->connect_errno){
    echo "数据库连接错误".$db->connect_error;
    exit();
}