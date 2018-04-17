<?php
include "../../public/db.php";
$sql="select * from team";
$r=$db->query($sql);
$arr=$r->fetch_all(MYSQLI_ASSOC);
$str="";
foreach ($arr as $v){
    $str.="<option value='{$v["tid"]}'>{$v["tname"]}</option>";
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
        }
    </style>
</head>
<body>
<ol class="breadcrumb">
    <li><a href="../admin.php">主页</a></li>
    <li><a href="goodslist.php">项目管理</a></li>
    <li><span>添加项目</span></li>
</ol>
<form action="checkprojectinsert.php" class="form-horizontal col-sm-8" method="post">
    <div class="form-group">
        <lable for="input1" class="control-label col-sm-2" >名称</lable>
        <div class="col-sm-10">
            <input type="text" name="pname" id="input1" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <lable for="file" class="control-label col-sm-2" >缩略图</lable>
        <div class="col-sm-10">
            <input type="file" id="file" class="form-control">
            <input type="button" value="预览" id="pre1">
            <input type="button" value="上传" id="upload1">
            <div class="show1"></div>
            <input type="hidden" name="pthumb">
        </div>
    </div>
    <div class="form-group">
        <lable for="files" class="control-label col-sm-2" >多图片</lable>
        <div class="col-sm-10">
            <input type="file" id="files" class="form-control"  multiple>
            <input type="button" value="预览" id="pre2">
            <input type="button" value="上传" id="upload2">
            <div class="show2"></div>
            <input type="hidden" name="ppicture">
        </div>
    </div>
    <div class="form-group">
        <lable for="input5" class="control-label col-sm-2" >项目描述</lable>
        <div class="col-sm-10">
            <textarea name="pdescription" id="input5" ></textarea>
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
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
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
                    $("[name=pthumb]").val(r);
                }
            })
        });
        //多图片上传
        $("#pre2").click(function () {
            let files = $("#files")[0].files;
            if (file.length === 0) {
                return;
            }
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
                            alert(1);
                            $("[name=ppicture]").val(str);
                        }
                    }
                })
            })
        });
    </script>
</body>
</html>