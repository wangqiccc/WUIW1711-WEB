<?php
$id=$_GET["id"];
include "../../public/db.php";
$sql="select * from project WHERE pid='{$id}'";
$r=$db->query($sql);
$arr=$r->fetch_array(MYSQLI_ASSOC);
//var_dump($arr);
$pics=$arr['ppicture'];
//分割为数组
$pic=explode(";",$pics);
array_pop($pic);
$imgs="";
foreach ($pic as $src){
    $imgs.="<img src='../../upload/{$src}'>";
}
$sql="select * from team";
$r=$db->query($sql);
$darr=$r->fetch_all(MYSQLI_ASSOC);
$str="";
foreach ($darr as $v){
    if($v["tid"]===$arr["did"]){
        $str.="<option value='{$v["tid"]}' selected>{$v["tname"]}</option>";
    }else{
        $str.="<option value='{$v["tid"]}'>{$v["tname"]}</option>";
    }

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
        .show1{
            min-height: 100px;
            border: 1px solid #eee;
        }
        .show2{
            min-height: 100px;
            border: 1px solid #eee;
        }
        img{
            width: 50px;
            height: 50px;
            display: block;
            float: left;
            border-radius: 50%;
            margin-left: 20px;
        }
    </style>
</head>
<body>
<ol class="breadcrumb">
    <li><a href="../admin.php">主页</a></li>
    <li><a href="goodslist.php">商品管理</a></li>
    <li><span>商品修改</span></li>
</ol>
<form action="checkprojectupdate.php?id=<?php echo $arr["pid"]?>" class="form-horizontal col-sm-8" method="post">
<!--    <input type="hidden" name="gid" value="--><?php //echo $arr['gid']?><!--">-->
    <div class="form-group">
        <lable for="input1" class="control-label col-sm-2" >项目名称</lable>
        <div class="col-sm-10">
            <input type="text" name="pname" id="input1" class="form-control" value="<?php echo $arr["pname"] ?>">
        </div>
    </div>
    <div class="form-group">
        <lable for="file" class="control-label col-sm-2" >缩略图</lable>
        <div class="col-sm-10">
            <input type="file" id="file" class="form-control">
            <input type="button" value="预览" id="pre1">
            <input type="button" value="上传" id="upload1">
            <div class="show1"><img src="../../upload/<?php echo $arr["pthumb"]?>" alt=""></div>
            <input type="hidden" name="pthumb" value="<?php echo $arr["pthumb"]?>">
        </div>
    </div>
    <div class="form-group">
        <lable for="files" class="control-label col-sm-2" >多图片</lable>
        <div class="col-sm-10">
            <input type="file" id="files" class="form-control" multiple>
            <input type="button" value="预览" id="pre2">
            <input type="button" value="上传" id="upload2">
            <div class="show2"><?php echo $imgs?></div>
            <input type="hidden" name="ppicture" value="<?php echo $pics?>">
        </div>
    </div>
    <div class="form-group">
        <lable for="input5" class="control-label col-sm-2" >描述</lable>
        <div class="col-sm-10">
            <textarea name="pdescription" id="input5"><?php echo $arr["pdescription"]?></textarea>
        </div>
    </div>
    <div class="form-group">
        <lable for="input6" class="control-label col-sm-2" >设计师</lable>
        <div class="col-sm-10">
            <select name="did" id="input6"  class="form-control">
                <?php echo $str?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <lable for="input7" class="control-label col-sm-2" >项目类型</lable>
        <div class="col-sm-10">
            <select name="ptype" id="input7" class="form-control">
                <option value="1"<?php if($arr["ptype"]==="1"){echo "selected";}?>>1</option>
                <option value="2" <?php if($arr["ptype"]==="2"){echo "selected";}?>>2</option>
                <option value="3" <?php if($arr["ptype"]==="3"){echo "selected";}?>>3</option>
                <option value="4" <?php if($arr["ptype"]==="4"){echo "selected";}?>>4</option>
                <option value="5" <?php if($arr["ptype"]==="5"){echo "selected";}?>>5</option>
                <option value="6" <?php if($arr["ptype"]==="6"){echo "selected";}?>>6</option>
            </select>
        </div>
    </div>
    <input type="submit" value="提交" class="col-sm-offset-2">
</form>
<script src="../../static/js/jquery.min.js"></script>
<script>
    //单图片上传
    $("#pre1").click(function(){
        let file=$("#file")[0].files[0];
        if(file===undefined){
            return;
        }
        let fr=new FileReader();
        fr.readAsDataURL(file);
        $(".show1").empty();
        fr.onload=function(){
            $("<img>").attr("src",fr.result).appendTo(".show1");
        }
    });
    $("#upload1").click(function(){
        let file=$("#file")[0].files[0];
        let formData=new FormData();
        formData.append("f",file);
        $.ajax({
            url:"../upload.php",
            data:formData,
            type:"post",
            processData:false,
            contentType:false,
            success:function(r){
                alert("上传成功");
                $("[name=gthumb]").val(r);
            }
        })
    });
    //多图片上传
    $("#pre2").click(function () {
        let files = $("#files")[0].files;
        if (files.length === 0) {
            return;
        }
        $(".show2").empty();
        $.each(files, function (index, file) {
            let fr = new FileReader();
            fr.readAsDataURL(file);
            fr.onload = function () {
                $("<img>").attr("src", fr.result).appendTo(".show2");
            }
        })
    });
    $("#upload2").click(function () {
        let files = $("#files")[0].files;
        let str="";
        let len=files.length;
        let n=0;
        $.each(files, function (index, file) {
            let formData = new FormData();
            formData.append("f", file);
            $.ajax({
                url: "../upload.php",
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function (r) {
                    str+=r+";";
                    n++;
                    if(n===len){
                        $("[name=gpicture]").val(str);
                    }
                }
            })
        })
    });
</script>
</body>
</html>