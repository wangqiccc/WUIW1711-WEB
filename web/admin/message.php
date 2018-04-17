<?php
header("Content-Type:text/html");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .content{
            width: 200px;
            height: 200px;
            margin: 200px auto;
        }
        span{
            width: 100%;
            display: block;
            text-align: center;
            margin-bottom: 20px;
        }
        div{
            text-align: center;
        }
        a{
            color: red;
        }
    </style>
</head>
<body>
    <div class="content">
        <span><?php echo $msg?></span>
        <div>将在<time>3</time>s进行跳转 <br> 直接跳转，请<a href="<?php echo $href?>" >点击</a></div>
    </div>
<script>
    let time=document.querySelector("time");
    let a=document.querySelector("a");
    let n=3;
    setInterval(function(){
        n--;
        time.innerHTML=n;
        if(n===0){
            location.href=a.href;
        }
    },1000)

</script>
</body>
</html>