<?php
$tid=$_GET["id"];
include "../../public/db.php";
$sql="select * from team WHERE tid=$tid";
$r=$db->query($sql);
$arr=$r->fetch_array(MYSQLI_ASSOC);
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
        .table tr td img{
            width: 100px;
            height: 50px;
            display: block;
            float: left;
        }
    </style>
</head>
<body>
<ol class="breadcrumb">
    <li><a href="../admin.php">主页</a></li>
    <li><a href="teamlist.php">团队管理</a></li>
    <li><span>团队修改</span></li>
</ol>
<form action="checkteamupdate.php" class="form-horizontal col-sm-8" method="post">
    <input type="hidden" name="tid" value="<?php echo $arr["tid"]?>">
    <div class="form-group">
        <lable for="input1" class="control-label col-sm-2" >名称</lable>
        <div class="col-sm-10">
            <input type="text" name="tname" id="input1" class="form-control" value="<?php echo $arr["tname"]?>">
        </div>
    </div>
    <div class="form-group">
        <lable for="input2" class="control-label col-sm-2" >英文名称</lable>
        <div class="col-sm-10">
            <input type="text" name="tename" id="input2" class="form-control" value="<?php echo $arr["tename"]?>">
        </div>
    </div>
    <div class="form-group">
        <lable for="input3" class="control-label col-sm-2" >职位</lable>
        <div class="col-sm-10">
            <input type="text" name="tposition" id="input3" class="form-control" value="<?php echo $arr["tposition"]?>">
        </div>
    </div>
    <div class="form-group">
        <lable for="file" class="control-label col-sm-2" >头像</lable>
        <div class="col-sm-10">
            <input type="file" id="file" class="form-control">
            <input type="button" value="预览" id="pre1">
            <input type="button" value="上传" id="upload1">
            <div class="show1">
                <img src="../../upload/<?php echo $arr["tthumb"]?>" alt="">
            </div>
            <input type="hidden" name="tthumb" value="<?php echo $arr["tthumb"]?>">
        </div>
    </div>
    <div class="form-group">
        <lable for="input5" class="control-label col-sm-2" >描述</lable>
        <div class="col-sm-10">
            <textarea name="tdescription" id="input5" ><?php echo $arr["tdescription"]?></textarea>
        </div>
    </div>
    <input type="submit" value="提交" class="col-sm-offset-2 btn btn-success">
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
        fr.onload=function(){
            $(".show1").empty();
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
                let reg=/^\d{4}\-\d{2}\-\d{2}\/[a-z0-9]{32}\.(jpe?g|png|gif)$/;
                if(reg.test(r)){
                    $("[name=tthumb]").val(r);
                }
            }
        })
    });
    </script>
</body>
</html>