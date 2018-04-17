<?php
include "header.php";
include "../public/db.php";
$sql="select * from team limit 0,6";
$r=$db->query($sql);
$tarr=$r->fetch_all(MYSQLI_ASSOC);
$sql="select count(*) as total from team";
$r=$db->query($sql);
$numarr=$r->fetch_array(MYSQLI_ASSOC);
$count=$numarr["total"];
$pagers=ceil($count/4);
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
        $str.="<a href='tuandui.php?p={$i}' class='<?php if($n==(p+1)) echo `chanpin_lunbo2`;?>'>{$n}</a>";
    }
}
$start=$p*4;
$sql="select * from team limit {$start},4";
$r=$db->query($sql);
$arr=$r->fetch_all(MYSQLI_ASSOC);
?>
    <link rel="stylesheet" href="../static/css/gongsi.css">
    <link rel="stylesheet" href="../static/css/tuandui.css">
	<div class="banner_all">
		<div class="banner1">
			<h1>LIVABLE HOME</h1>
			<div class="banner_line1"></div>
			<p>团队介绍</p>
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
				<a href="">
					<div class="bread1_ledt_line"></div>
					<p>团队介绍<br><i>LIVABLE HOME</i></p>
				</a>
			</div>
			<img src="../static/imgs/gbanner1.png">
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
		<h1>品&nbsp;&nbsp;&nbsp;&nbsp;牌&nbsp;&nbsp;&nbsp;&nbsp;介&nbsp;&nbsp;&nbsp;&nbsp;绍</h1>
		<div class="pinpai_tou_hengline2"></div>
		<div class="pinpai_tou_ling1"></div>
		<div class="pinpai_tou_hengline3"></div>
	</div>
	<div class="team_bottom">
		<div class="team_bottom1">
			<div class="team_bottom1_left">
				<p>COMMERCIAL SPACE TEAM</p>
				<h1>室内设计团队</h1>
			</div>
			<div class="team_bottom1_right">
				<ul class="team_bottom1_right_ul">
                    <?php foreach ($tarr as $v):?>
					<li>
						<img src="../upload/<?php echo $v['tthumb']?>">
						<div class="team_bottom1_right_name">
							<span><?php echo $v['tename']?></span>
							<h1><?php echo $v['tname']?></h1>
							<div class="hui"></div>
							<div class="hei"></div>
							<p>特级室内<br><?php echo $v['tposition']?></p>
						</div>
					</li>
                    <?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="team_bottom1 team_bottom2">
			<div class="team_bottom1_right">
				<ul class="team_bottom1_right_ul">
                    <?php foreach ($tarr as $v):?>
                    <li>
                        <img src="../upload/<?php echo $v['tthumb']?>">
                        <div class="team_bottom1_right_name">
                            <span><?php echo $v['tename']?></span>
                            <h1><?php echo $v['tname']?></h1>
                            <div class="hui"></div>
                            <div class="hei"></div>
                            <p>特级室内<br><?php echo $v['tposition']?></p>
                        </div>
                    </li>
                     <?php endforeach;?>
				</ul>

			</div>
			<div class="team_bottom1_left">
				<p>COMMERCIAL SPACE TEAM</p>
				<h1>家居设计团队</h1>
			</div>
		</div>
		<div class="jiaju1">
			<img src="../static/imgs/team7.png">
		</div>
	</div>
	<div class="pinpai_tou">
		<div class="pinpai_tou_kuang"></div>
		<div class="pinpai_tou_cover"></div>
		<div class="pinpai_tou_hengline"></div>
		<div class="pinpai_tou_ling"></div>
		<div class="pinpai_tou_hengline1"></div>
		<p>ABOUT THE BRAND</p>
		<h1>团&nbsp;&nbsp;&nbsp;&nbsp;队&nbsp;&nbsp;&nbsp;&nbsp;介&nbsp;&nbsp;&nbsp;&nbsp;绍</h1>
		<div class="pinpai_tou_hengline2"></div>
		<div class="pinpai_tou_ling1"></div>
		<div class="pinpai_tou_hengline3"></div>
	</div>
	<div class="team_bottom">
		<div class="team_bottom3">
			<ul>
                <?php foreach ($tarr as $v):?>
				<li>
					<div class="touxiang_bg">
						<img src="../upload/<?php echo $v['tthumb']?>">
					</div>
					<h1><?php echo $v['tname']?></h1>
					<p><?php echo $v['tdescription']?></p>
				</li>
                <?php endforeach;?>
			</ul>
		</div>
	</div>
<div class="chanpin_lunbo">
    <a  href="<?php $x=$p-1;if($p!=0){;echo "tuandui.php?p=$x";}else{echo "javascript:void(0)";}?>" class="chanpin_lunbo1"><</a>
    <?php echo $str?>
    <a href="<?php $x=$p+1; if($x!=$n){echo "tuandui.php?p=$x";}else{echo "javascript:void(0)";}?>" class="chanpin_lunbo1">></a>
</div>
<?php include "footer.php"?>



