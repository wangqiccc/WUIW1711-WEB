<?php
include "../../public/db.php";
$sql="select * from goods";
$r=$db->query($sql);
$arr=$r->fetch_all(MYSQLI_ASSOC);
$str="";
foreach ($arr as $v){
    $pics=$v['gpicture'];
    $iarr=explode(";",$pics);
    array_pop($iarr);
    $imgs="";
    //对汉字进行截取，去前十个
    $gdescription=mb_substr($v['gdescription'],0,10,"utf-8")."...";
    //对图片进行截取 取三个
    $iarr=array_slice($iarr,0,3);
    foreach ($iarr as $src){
        $imgs.="<img src='../../upload/{$src}'>";
    }
    $str.="<tr> 
        <td>{$v['gname']}</td>
        <td>{$v['gename']}</td>
        <td><img src='../../upload/{$v["gthumb"]}' alt=''></td>
        <td>{$imgs}</td>
        <td>{$gdescription}</td>
        <td><a href='goodsupdate.php?id={$v["gid"]}' class='btn btn-warning'>修改</a><a href='goodsdel.php?id={$v["gid"]}'class='btn btn-danger'>删除</a></td>
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
    <li><a href="goodslist.php">商品管理</a></li>
</ol>
<div class="col-sm-10">
<table class="table table-bordered text-center" id="table" >
    <tr>
        <th>名称</th>
        <th>英文名称</th>
        <th>缩略图</th>
        <th>多图片</th>
        <th>描述</th>
        <th>操作</th>
    </tr>
    <?php echo "$str"?>
</table>
</div>
<div><a href="goodsinsert.php" class="col-sm-offset-4 btn btn-primary">添加</a></div>
</body>
</html>