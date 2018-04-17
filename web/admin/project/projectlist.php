<?php
include "../../public/db.php";
$sql="select project.*, team.tname from project,team WHERE project.did=team.tid";
$r=$db->query($sql);
$arr=$r->fetch_all(MYSQLI_ASSOC);
$str="";
foreach ($arr as $v){
    $pics=$v['ppicture'];
    $iarr=explode(";",$pics);
    array_pop($iarr);
    $imgs="";
    //对汉字进行截取，去前十个
    $pdescription=mb_substr($v['pdescription'],0,10,"utf-8")."...";
    //对图片进行截取 取三个
    $iarr=array_slice($iarr,0,3);
    foreach ($iarr as $src){
        $imgs.="<img src='../../upload/{$src}'>";
    }
    $str.="<tr>
        <td>{$v['pname']}</td>
        <td><img src='../../upload/{$v["pthumb"]}' alt=''></td>
        <td>{$imgs}</td>
        <td>{$pdescription}</td>
        <td>{$v['tname']}</td>
        <td>{$v['ptype']}</td>
        <td><a href='projectupdate.php?id={$v["pid"]}' class='btn btn-warning'>修改</a><a href='projectdel.php?id={$v["pid"]}'class='btn btn-danger'>删除</a></td>
</tr>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../static/css/bootstrap.css">
    <style>
        .table tr td img{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: block;
            float: left;
            margin-left: 20px;
        }
        .table tr td{
            vertical-align: middle !important;
            text-align: center;
        }
        .table tr th{
            vertical-align: middle !important;
            text-align: center;
        }
        div{
            float: none !important;
        }
    </style>
</head>
<body>
<ol class="breadcrumb">
    <li><a href="#">主页</a></li>
    <li><span>项目管理</span></li>
</ol>
<div class="col-sm-10">
    <table class="table table-bordered text-center" id="table" >
        <tr>
            <th>项目名称</th>
            <th>缩略图</th>
            <th>多图片</th>
            <th>项目描述</th>
            <th>设计师</th>
            <th>项目类型</th>
            <th>管理</th>
        </tr>
        <?php echo "$str"?>
    </table>
</div>
<div><a href="projectinsert.php" class="col-sm-offset-4 btn btn-primary">添加</a></div>
</body>
</html>