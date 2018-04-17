<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../static/css/bootstrap.css">
    <script src="../../static/js/jquery.min.js"></script>
    <script src="../../static/js/jquery.validate.min.js"></script>
    <script src="../../static/js/messages_zh.min.js"></script>
</head>
<body>
<ol class="breadcrumb">
    <li><a href="#">主页</a></li>
    <li><a href="#">修改密码</a></li>
</ol>
<div class="col-sm-6">
<form action="checkUpdatepass.php" id="myform" class="form-horizontal" method="post">
    <div class="form-group" class="form-horizontal">
        <label for="input1" class="col-sm-2 control-label">原密码</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="input1" name="oldpass" placeholder="请输入原始密码">
        </div>
    </div>
    <div class="form-group form-horizontal">
        <label for="newpass" class="col-sm-2 control-label" >新密码</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="newpass" name="newpass"  placeholder="请输入新密码">
        </div>
    </div>
    <div class="form-group form-horizontal">
        <label for="input3" class="col-sm-2 control-label">确认密码</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="input3" name="newpass2" placeholder="请确认新密码">
        </div>
    </div>
    <button type="submit" class="btn btn-success col-sm-offset-5">确认修改</button>
</form>
</div>
    <script>
        $("form").validate({
            rules:{
                oldpass:{
                    required:true
                },
                newpass:{
                    required:true,
                },
                newpass2:{
                    required:true,
                    equalTo:"#newpass"
                }
            },
            messages:{
                oldpass:{
                    required:"请输入原密码",
                    remote:"原始密码错误"
                },
                newpass:{
                    required:"请输入新密码"
                },
                newpass2:{
                    required:"请确认新密码",
                    equalTo:"两次输入不一致"
                }
            },
            errorElement:true,
        })
    </script>
</body>
</html>