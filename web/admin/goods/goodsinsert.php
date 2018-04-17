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
    <li><a href="goodslist.php">商品管理</a></li>
    <li><span>商品添加</span></li>
</ol>
<!--    <form action="checkgoodsinsert.php" method="get">-->
<!--        <ul>-->
<!--            <li><input type="text" name="gname" placeholder="名称"></li>-->
<!--            <li><input type="text" name="gename"></li>-->
<!--            <li>-->
<!--                <input type="file" id="file">-->
<!--                <input type="button" value="预览" id="pre1">-->
<!--                <div class="show1"></div>-->
<!--                <input type="button" value="上传" id="upload1">-->
<!--                <input type="hidden" name="gthumb">-->
<!--            </li>-->
<!--            <h4>缩略图</h4>-->
<!--            <li>-->
<!--                <input type="file" id="files" multiple>-->
<!--                <input type="button" value="预览" id="pre2">-->
<!--                <div class="show2"></div>-->
<!--                <input type="button" value="上传" id="upload2">-->
<!--                <input type="hidden" name="gpicture">-->
<!--            </li>-->
<!--            <h4>多图片</h4>-->
<!--            <li>-->
<!--                <textarea name="gdescription" id="" ></textarea>-->
<!--            </li>-->
<!--            <li><input type="submit" value="提交"></li>-->
<!--        </ul>-->
<!--    </form>-->
<form action="checkgoodsinsert.php" class="form-horizontal col-sm-8" method="post">
    <div class="form-group">
        <lable for="input1" class="control-label col-sm-2" >名称</lable>
        <div class="col-sm-10">
            <input type="text" name="gname" id="input1" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <lable for="input2" class="control-label col-sm-2" >英文名称</lable>
        <div class="col-sm-10">
            <input type="text" name="gename" id="input2" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <lable for="gthumb" class="control-label col-sm-2" >缩略图</lable>
        <div class="col-sm-10">
            <input type="file" id="file" class="form-control">
            <input type="button" value="预览" id="pre1">
            <input type="button" value="上传" id="upload1">
            <div class="show1"></div>
            <input type="hidden" name="gthumb">
        </div>
    </div>
    <div class="form-group">
        <lable for="files" class="control-label col-sm-2" >多图片</lable>
        <div class="col-sm-10">
            <input type="file" id="files" class="form-control"  multiple>
            <input type="button" value="预览" id="pre2">
            <input type="button" value="上传" id="upload2">
            <div class="show2"></div>
            <input type="hidden" name="gpicture">
        </div>
    </div>
    <div class="form-group">
        <lable for="input5" class="control-label col-sm-2" >描述</lable>
        <div class="col-sm-10">
            <textarea name="gdescription" id="" ></textarea>
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
                    // alert("上传成功");
                    $("[name=gthumb]").val(r);
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
                            // alert(1);
                            $("[name=gpicture]").val(str);
                        }
                    }
                })
            })
        });
    </script>
</body>
</html>