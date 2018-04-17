<?php
    include "header.php";
    include "../public/db.php";
    $id=$_GET["id"];
    $sql="select * from goods where gid=$id;";
    $r=$db->query($sql);
    $arr=$r->fetch_array(MYSQLI_ASSOC);
    $pics=$arr["gpicture"];
    $imgarr=explode(";",$pics);
    array_pop($imgarr);
    $imgstr="";
    foreach ($imgarr as $src){
        $imgstr.="<img src='../upload/{$src}'>";
    }
?>
    <link rel="stylesheet" href="../static/css/gongsi.css">
    <link rel="stylesheet" href="../static/css/product.css">
    <style>
        .product_content1{
            width: 1200px;
            min-height: 100px;
            border: 1px solid #ccc;
        }
        .chanpin_bottom{
            margin-bottom: 20px;
        }
    </style>
	<div class="banner_all">
		<div class="banner1">
			<h1>LIVABLE HOME</h1>
			<div class="banner_line1"></div>
			<p>产品介绍</p>
		</div>
	</div>
	<div class="bread">
		<div class="bread1">
			<div class="bread1_left">
				<a href="index.php">
					<div class="bread1_ledt_line"></div>
					<p>首页<br><i>HOME</i></p>
				</a>
				<div class="bread1_left_shenglue"></div>
				<div class="bread1_left_shenglue bread1_left_shenglue1"></div>
				<div class="bread1_left_shenglue bread1_left_shenglue2"></div>
				<a href="product.php">
					<div class="bread1_ledt_line"></div>
					<p>产品中心<br><i>LIVABLE HOME</i></p>
				</a>
                <div class="bread1_left_shenglue"></div>
                <div class="bread1_left_shenglue bread1_left_shenglue1"></div>
                <div class="bread1_left_shenglue bread1_left_shenglue2"></div>
                <a href="product.php">
                    <div class="bread1_ledt_line"></div>
                    <p><?php echo $arr['gname']?><br><i><?php echo $arr['gename']?></i></p>
                </a>
			</div>
			<img src="../upload/<?php echo $arr['gthumb']?>">
			<div class="bread1_huang"></div>
		</div>
	</div>
	<div class="pinpai_tou">
		<div class="pinpai_tou_kuang"></div>
		<div class="pinpai_tou_cover"></div>
		<div class="pinpai_tou_hengline"></div>
		<div class="pinpai_tou_ling"></div>
		<div class="pinpai_tou_hengline1"></div>
		<p><?php echo $arr['gename']?></p>
		<h1><?php echo $arr['gname']?></h1>
		<div class="pinpai_tou_hengline2"></div>
		<div class="pinpai_tou_ling1"></div>
		<div class="pinpai_tou_hengline3"></div>
	</div>
	<div class="chanpin_bottom">
        <div class="product_content1">
            <h3><?php echo $arr["gdescription"]?></h3>
        </div>
        <?php echo $imgstr?>
	</div>

<?php include "footer.php"?>