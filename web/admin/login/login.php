<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            list-style: none;
            /*border: 0;*/
        }
        .table{
            width: 200px;
            height: 300px;
            margin: 100px auto;
            border: 1px solid #1D1D1D;
            border-radius: 10px;
            padding-top: 20px;
        }
        li{
            height: 30px;
            margin: 10px auto;
            margin-top: 5px;
        }
        input{
            height: 30px;
            width: 180px;
            margin: 0 auto;
            display: block;
        }
        span{
            width: 60px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            display: block;
            float: left;
        }
        img{
            margin: 0 auto;
            display: block;
        }
    </style>

</head>
<body>
<div class="table">
<form action="checklogin.php" method="post">
    <ul>
        <li><input type="text" placeholder="请输入账号" name="user" required></li>
        <li><input type="password" placeholder="请输入密码" name="pass" required> </li>
        <li><input type="text" placeholder="请输入验证码" name="code" required></li>
        <img src="code.php"  alt="" width="180px" height="30" onclick="this.src='code.php?t='+new Date().getTime()">
        <li><input type="submit" value="登录"></li>
    </ul>
</form>
</div>
</body>
</html>