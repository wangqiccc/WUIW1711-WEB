<?php
//GD 内置函数库 关于图像函数
//创建一个画板
$width=180;
$heigth=40;
$image=imagecreatetruecolor($width,$heigth);
//创建一个颜色
//mt_rand(120,255) 随机颜色
function getcolor($type="l"){
    global $image;
    if($type==="l"){
        return imagecolorallocate($image,mt_rand(120,255),mt_rand(120,255),mt_rand(120,255));
    }else{
        return imagecolorallocate($image,mt_rand(0,120),mt_rand(0,120),mt_rand(0,120));
    }
}
//填充颜色
imagefill($image,0,0,getcolor());
//线条
for($i=0;$i<10;$i++){
    imageline($image,mt_rand(0,$width),mt_rand(0,$heigth),mt_rand(0,$width),mt_rand(0,$heigth),getcolor());
}
//添加点
for($i=0;$i<100;$i++){
    imagesetpixel($image,mt_rand(0,$width),mt_rand(0,$heigth),getcolor());
}


//添加字母
session_start();
 $code="";
for($i=0;$i<4;$i++) {
    $str="qwertyuipkjhgfdsazxcvbnmQWERTYUIPKJHGFDSAZXCVBNM23456789";
    $len=strlen($str);
    $pos=mt_rand(0,$len-1);
    $letter=substr($str,$pos,1);
    $code.=$letter;

    strtoupper($code);
    imagettftext($image,mt_rand(20,30),mt_rand(-15,15),$i*45,mt_rand(25,35),getcolor("d"),"FRAHVIT.TTF",$letter);
}
$_SESSION["code"]=strtoupper($code);
//用当前的图像资源生成一张图片
header("Content-Type:image/png");
imagepng($image);
imagedestroy($image);
