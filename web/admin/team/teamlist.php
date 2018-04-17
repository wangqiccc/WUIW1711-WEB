<?php
include "../../public/db.php";
$sql="select * from team";
$r=$db->query($sql);
$arr=$r->fetch_all(MYSQLI_ASSOC);
$str="";
foreach ($arr as $v){
    $tdescription=mb_substr($v['tdescription'],0,10,"utf-8")."...";

    $str.="<tr> 
        <td>{$v['tname']}</td>
        <td>{$v['tename']}</td>
        <td>{$v["tposition"]}</td>
        <td><img src='../../upload/{$v["tthumb"]}' alt=''></td>
        <td>{$tdescription}</td>
        <td><a  href='teamupdate.php?id={$v["tid"]}'class='btn btn-warning'>修改</a><a href='teamdel.php?id={$v["tid"]}' class='btn btn-danger del'>删除</a></td>
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
        .table tr td{
            vertical-align: middle !important;
            text-align: center;
        }
        .table tr th{
            vertical-align: middle !important;
            text-align: center;
        }
        .table tr td img{
            width: 50px;
            height: 50px;
            display: block;
            border-radius: 50% ;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<ol class="breadcrumb">
    <li><a href="#">主页</a></li>
    <li><span>团队管理</span></li>
</ol>
<div class="col-sm-10">
    <table class="table table-bordered text-center">
        <tr>
            <th>名称</th>
            <th>英文名称</th>
            <th>职位</th>
            <th>图片</th>
            <th>描述</th>
            <th>管理</th>
        </tr>
        <?php echo "$str"?>
    </table>
</div>
<div><a href="teaminsert.php" class=" col-sm-2 col-sm-offset-4 btn btn-primary">添加</a></div>
<script src="../../static/js/jquery.min.js"></script>
<script>
    $(".del").click(function(e){
        if(!confirm("确定删除吗")){
            e.preventDefault();
        }
    })
</script>
</body>
</html>