<?php
    include "header.php";
    include "../public/db.php";
    $sql="select count(*) as total from goods";
    $r=$db->query($sql);
    $numarr=$r->fetch_array(MYSQLI_ASSOC);
    $count=$numarr["total"];
    $pagers=ceil($count/8);
    $str="";
    if(isset($_GET["p"])){
        $p=$_GET["p"];
    }else{
        $p=0;
    }
    for($i=0;$i<$pagers;$i++){
        $n=$i+1;
        if($i==$p){
            $str.="<span class='chanpin_lunbo1 chanpin_lunbo2'>{$n}</span>";
        }else{
            $str.="<a href='product.php?p={$i}' class='<?php if($n==(p+1)) echo `chanpin_lunbo2`;?>'>{$n}</a>";
        }
    }
    $start=$p*8;
    $sql="select * from goods limit {$start},8";
    $r=$db->query($sql);
    $arr=$r->fetch_all(MYSQLI_ASSOC);
?>
    <link rel="stylesheet" href="../static/css/gongsi.css">
    <link rel="stylesheet" href="../static/css/product.css">
	<div class="banner_all">
		<div class="banner1">
			<h1>LIVABLE HOME</h1>
			<div class="banner1_tu">
				<img src="../static/imgs/yizi.png">
			</div>
			<div class="banner_line1"></div>
			<p>公司简介</p>
		</div>
	</div>
	<div class="bread">
		<div class="bread1">
			<div class="bread1_left">
				<a href="">
					<div class="bread1_ledt_line"></div>
					<p>首页<br><i>HOME</i></p>
				</a>
				<div class="bread1_left_shenglue"></div>
				<div class="bread1_left_shenglue bread1_left_shenglue1"></div>
				<div class="bread1_left_shenglue bread1_left_shenglue2"></div>
				<a href="">
					<div class="bread1_ledt_line"></div>
					<p>产品介绍<br><i>LIVABLE HOME</i></p>
				</a>
			</div>
			<img src="../upload/<?php echo $arr[0]['gthumb']?>">
			<div class="bread1_huang"></div>
		</div>
	</div>
	<div class="pinpai_tou">
		<div class="pinpai_tou_kuang"></div>
		<div class="pinpai_tou_cover"></div>
		<div class="pinpai_tou_hengline"></div>
		<div class="pinpai_tou_ling"></div>
		<div class="pinpai_tou_hengline1"></div>
		<p>ABOUT THE BRAND</p>
		<h1>产&nbsp;&nbsp;&nbsp;&nbsp;品&nbsp;&nbsp;&nbsp;&nbsp;中&nbsp;&nbsp;&nbsp;&nbsp;心</h1>
		<div class="pinpai_tou_hengline2"></div>
		<div class="pinpai_tou_ling1"></div>
		<div class="pinpai_tou_hengline3"></div>
	</div>
	<div class="chanpin_bottom">
		<ul>
            <?php foreach ($arr as $v):?>
			<li class="chanpin_bottom_li">
				<div class="chanpin_bottom_cover">
					<h1><?php echo $v["gname"]?></h1>
					<h2><?php echo $v["gename"]?></h2>
<!--					<p>CHAIR</p>-->
                    <a href="product_content.php?id=<?php echo $v['gid']?>">
					    <div class="chanpin_bottom_cover_more">+</div>
                    </a>
				</div>
				<img src="../upload/<?php echo $v["gthumb"]?>">
				<div class="chanpin_bottom_huang"></div>
			</li>
            <?php endforeach;?>
		</ul>

	</div>
    <div class="chanpin_lunbo">
        <a  href="<?php $x=$p-1;if($p!=0){;echo "product.php?p=$x";}else{echo "javascript:void(0)";}?>" class="chanpin_lunbo1"><</a>
        <?php echo $str?>
        <a href="<?php $x=$p+1; if($x!=$n){echo "product.php?p=$x";}else{echo "javascript:void(0)";}?>" class="chanpin_lunbo1">></a>
    </div>
<?php include "footer.php"?>