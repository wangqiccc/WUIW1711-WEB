<?php
$path=$_SERVER["SCRIPT_NAME"];
$pos=strrpos($path,"/");
$name=substr($path,$pos+1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>公司首页</title>
    <link rel="stylesheet" href="../static/css/public.css">
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=	8ysHvG1Qkg7d8jgxAqhg6tDxzqQzbs83"></script>
</head>
<body>
<div id="head">
    <div class="head_top">
        <div class="head_logo">
            <img src="../static/img/logo.jpg" alt="" class="logo">
            <p class="yiju_zi">宜居时代</p>
        </div>
        <div class="daohan">
            <div class="daohan_item">
                <div class="item_left" id="<?php if($name==="index.php"){
                echo "item_left";
            }?>"></div>
                <a href="index.php">
                    <span class="daohan_zi">公司首页</span>
                </a>
                <div class="item_right" id="<?php if($name==="index.php"){
                    echo "item_right";
                }?>"></div>
            </div>
            <div class="daohan_item">
                <div class="item_left" id="<?php if($name==="gongsi.php"){
                    echo "item_left";
                }?>"></div>
                <a href="gongsi.php">
                    <span class="daohan_zi">公司简介</span>
                </a>
                <div class="item_right" id="<?php if($name==="gongsi.php"){
                    echo "item_right";
                }?>"></div>
            </div>
            <div class="daohan_item">
                <div class="item_left" id="<?php if($name==="product.php"||$name==="product_content.php"){
                    echo "item_left";
                }?>"></div>
                <a href="product.php">
                    <span class="daohan_zi">产品中心</span>
                </a>
                <div class="item_right" id="<?php if($name==="product.php"||$name==="product_content.php"){
                    echo "item_right";
                }?>"></div>
            </div>
            <div class="daohan_item">
                <div class="item_left" id="<?php if($name==="anli.php"){
                    echo "item_left";
                }?>"></div>
                <a href="anli.php">
                    <span class="daohan_zi">案例展示</span>
                </a>
                <div class="item_right" id="<?php if($name==="anli.php"){
                    echo "item_right";
                }?>"></div>
            </div>
            <div class="daohan_item">
                <div class="item_left" id="<?php if($name==="tuandui.php"){
                    echo "item_left";
                }?>"></div>
                <a href="tuandui.php">
                    <span class="daohan_zi">团队介绍</span>
                </a>
                <div class="item_right" id="<?php if($name==="tuandui.php"){
                    echo "item_right";
                }?>"></div>
            </div>
            <div class="daohan_item">
                <div class="item_left" id="<?php if($name==="about.php"){
                    echo "item_left";
                }?>"></div>
                <a href="about.php">
                    <span class="daohan_zi">关于我们</span>
                </a>
                <div class="item_right" id="<?php if($name==="about.php"){
                    echo "item_right";
                }?>"></div>
            </div>
        </div>
        <div class="sousuo">
            <p>&#xe627;</p>
        </div>
    </div>
</div>