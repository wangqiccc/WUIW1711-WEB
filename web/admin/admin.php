<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../static/css/bootstrap.css">
    <style>
        *{
            margin: 0;
            padding: 0;
            text-decoration: none;
            color: #333;
            list-style: none;
        }
        html,body{
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        body{
            display: flex;
            flex-direction: column;
        }
        .top{
            width: 100%;
            height: 150px;
            background: #ccc;
        }
        .main{
            width: 100%;
            height: 150px;
            background: #eee;
            flex-grow: 1;
            display: flex;
        }
        h3{
            text-align: center;
            line-height: 80px;
            font-size: 40px;
        }
        .tuichu{
            float: right;
        }
        .left{
            width: 200px;
            height: 100%;
            float: left;
            background:#eeeccc;
            border-right: 1px solid #ccc;
        }
        .left li{
            width: 100% ;
            height: 30px;
            line-height: 30px;
            padding-left: 20px;
        }
        .right{
            height: 100%;
            flex-grow: 1;
        }
        iframe{
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
</head>
<body>
<div class="top">
<?php
    session_start();
    if(isset($_SESSION["user"])){
         echo " <div>欢迎<span> {$_SESSION["user"]}</span><a href='login/logout.php' class='tuichu'>/退出</a><a href='../index/index.php' class='tuichu'>网站前台</a></div>";
    }else{
        $msg="尚未登录，请登录";
        $href="login/login.php";
        include "message.php";
        exit();
    }
?>
    <h3>宜居时代后台管理</h3>
</div>
<div class="main">
    <div class="left">
        <ul>
            <li><a href="login/updatepass.php" target="main">修改密码</a></li>
            <li><a href="goods/goodslist.php" target="main">商品管理</a></li>
            <li><a href="team/teamlist.php" target="main">团队管理</a></li>
            <li><a href="project/projectlist.php" target="main">项目管理</a></li>
        </ul>
    </div>
    <div class="right">
        <iframe src="" name="main"></iframe>
    </div>
</div>
</body>
</html>