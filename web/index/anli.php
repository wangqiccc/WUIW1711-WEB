<?php
include "header.php";
include "../public/db.php";
if(isset($_GET['t'])){
    $t=$_GET['t'];
}else{
    $t=1;
}
//echo $t;
$sql="select project.*,team.tname,team.tename,team.tthumb,team.tposition ,team.tdescription
      from project,team WHERE project.did=team.tid and project.ptype=$t";
$r=$db->query($sql);
$idata=$r->fetch_all(MYSQLI_ASSOC);
$data=array_slice($idata,0,6);
?>
    <link rel="stylesheet" href="../static/css/gongsi.css">
    <link rel="stylesheet" href="../static/css/anli.css">
	<div class="banner_all">
		<div class="banner1">
			<h1>LIVABLE HOME</h1>
			<div class="banner_line1"></div>
			<p>案例展示</p>
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
				<a href="anli.php">
					<div class="bread1_ledt_line"></div>
					<p>案例展示<br><i>LIVABLE HOME</i></p>
				</a>
			</div>
			<div class="bread1_huang"></div>
            <img src="../static/imgs/gbanner1.png">
		</div>
	</div>
	<div class="pinpai_tou">
		<div class="pinpai_tou_kuang"></div>
		<div class="pinpai_tou_cover"></div>
		<div class="pinpai_tou_hengline"></div>
		<div class="pinpai_tou_ling"></div>
		<div class="pinpai_tou_hengline1"></div>
		<p>ABOUT THE BRAND</p>
		<h1>成&nbsp;&nbsp;&nbsp;&nbsp;功&nbsp;&nbsp;&nbsp;&nbsp;案&nbsp;&nbsp;&nbsp;&nbsp;例</h1>
		<div class="pinpai_tou_hengline2"></div>
		<div class="pinpai_tou_ling1"></div>
		<div class="pinpai_tou_hengline3"></div>
	</div>
	<div class="chenggong_bottom1">
		<div class="chenggong_bottom1_left">
			<img src="../upload/<?php echo $data[0]['pthumb']?>" class="chenggong_bottom1_leftimg1">
			<div class="chenggong_bottom1_left_bg">
				<img src="../upload/<?php echo $data[0]['tthumb']?>" class="chenggong_bottom1_leftimg2">
			</div>
			<h1><?php echo $data[0]['tname']?><i><?php echo $data[0]['tename']?></i></h1>
			<div class="chenggong_bottom1_left_bottom">
				<div class="chenggong_bottom1_left_bottom_line"></div>
				<p><?php echo $data[0]['tdescription']?></p>
				<div class="chenggong_bottom1_left_bottom_more">+</div>
			</div>
		</div>
		<div class="chenggong_bottom1_middle">
			<div class="chenggong_bottom1_middle_im">
				<img src="../upload/<?php echo $data[2]['pthumb']?>">
			</div>
			<div class="chenggong_bottom1_left_bg">
				<img src="../upload/<?php echo $data[2]['tthumb']?>">
			</div>
			<h1><?php echo $data[2]['tename']?></h1>
			<div class="chenggong_bottom1_middle_line"></div>
			<p><?php echo $data[2]['tdescription']?></p>
		</div>
		<div class="chenggong_bottom1_middle">
            <div class="chenggong_bottom1_middle_im">
                <img src="../upload/<?php echo $data[2]['pthumb']?>">
            </div>
            <div class="chenggong_bottom1_left_bg">
                <img src="../upload/<?php echo $data[2]['tthumb']?>">
            </div>
            <h1><?php echo $data[2]['tename']?></h1>
            <div class="chenggong_bottom1_middle_line"></div>
            <p><?php echo $data[2]['tdescription']?></p>
		</div>
	</div>
	<div class="chenggong_bottom1 chenggong_bottom2">
		<div class="chenggong_bottom1_middle chenggong_bottom2_middle">
            <div class="chenggong_bottom1_middle_im">
                <img src="../upload/<?php echo $data[2]['pthumb']?>">
            </div>
            <div class="chenggong_bottom1_left_bg">
                <img src="../upload/<?php echo $data[2]['tthumb']?>">
            </div>
            <h1><?php echo $data[2]['tename']?></h1>
            <div class="chenggong_bottom1_middle_line"></div>
            <p><?php echo $data[2]['tdescription']?></p>
		</div>
		<div class="chenggong_bottom1_middle">
            <div class="chenggong_bottom1_middle_im">
                <img src="../upload/<?php echo $data[2]['pthumb']?>">
            </div>
            <div class="chenggong_bottom1_left_bg">
                <img src="../upload/<?php echo $data[2]['tthumb']?>">
            </div>
            <h1><?php echo $data[2]['tename']?></h1>
            <div class="chenggong_bottom1_middle_line"></div>
            <p><?php echo $data[2]['tdescription']?></p>
		</div>
		<div class="chenggong_bottom1_left chenggong_bottom2_left">
            <img src="../upload/<?php echo $data[0]['pthumb']?>" class="chenggong_bottom1_leftimg1">
            <div class="chenggong_bottom1_left_bg">
                <img src="../upload/<?php echo $data[0]['tthumb']?>" class="chenggong_bottom1_leftimg2">
            </div>
            <h1><?php echo $data[0]['tname']?><i><?php echo $data[0]['tename']?></i></h1>
            <div class="chenggong_bottom1_left_bottom">
                <div class="chenggong_bottom1_left_bottom_line"></div>
                <p><?php echo $data[0]['tdescription']?></p>
                <div class="chenggong_bottom1_left_bottom_more">+</div>
            </div>
		</div>
	</div>

	<div class="chenggong_fenge">
		<div class="chenggong_fenge_left">
			<img src="../upload/<?php echo $data[0]['pthumb']?>">
		</div>
		<div class="chenggong_fenge_right">
			<p>优秀不是我们的目的／满足你才是我们的目标</p>
			<h1>EXCELLENCE IS NOT<br>OUR GOAL</h1>
			<h2>TO SATISFY YOU IS OUR GOAL</h2>
			<h3>GOIND JASK say __</h3>
			<img src="../static/imgs/chenggong6.png">
		</div>
	</div>
	<div class="pinpai_tou">
		<div class="pinpai_tou_kuang"></div>
		<div class="pinpai_tou_cover"></div>
		<div class="pinpai_tou_hengline"></div>
		<div class="pinpai_tou_ling"></div>
		<div class="pinpai_tou_hengline1"></div>
		<p>ABOUT THE BRAND</p>
		<h1>完&nbsp;&nbsp;&nbsp;&nbsp;成&nbsp;&nbsp;&nbsp;&nbsp;案&nbsp;&nbsp;&nbsp;&nbsp;例</h1>
		<div class="pinpai_tou_hengline2"></div>
		<div class="pinpai_tou_ling1"></div>
		<div class="pinpai_tou_hengline3"></div>
	</div>
	<div class="wancheng_bottom">
		<div class="wancheng_bottom1">
			<ul>
				<li>
					<a href="anli.php?t=1">阳台展示</a>
					<div class="<?php if($t==1){echo "wancheng_bottom1_line";}?>">
						<div class="<?php if($t==1){echo "wancheng_bottom1_line1";}?>">
						</div>
					</div>
				</li>
				<li class="wancheng_bottom1_li">
					<a href="anli.php?t=2">厨房展示</a>
					<div class="<?php if($t==2){echo "wancheng_bottom1_line";}?>">
						<div class="<?php if($t==2){echo "wancheng_bottom1_line1";}?>">
						</div>
					</div>
				</li>
				<li class="wancheng_bottom1_li">
					<a href="anli.php?t=3">客厅展示</a>
					<div class="<?php if($t==3){echo "wancheng_bottom1_line";}?>">
						<div class="<?php if($t==3){echo "wancheng_bottom1_line1";}?>">
						</div>
					</div>
				</li>
				<li class="wancheng_bottom1_li">
					<a href="anli.php?t=4">书房展示</a>
					<div class="<?php if($t==4){echo "wancheng_bottom1_line";}?>">
						<div class="<?php if($t==4){echo "wancheng_bottom1_line1";}?>">
						</div>
					</div>
				</li>
				<li class="wancheng_bottom1_li">
					<a href="anli.php?t=5">卧室展示</a>
					<div class="<?php if($t==5){echo "wancheng_bottom1_line";}?>">
						<div class="<?php if($t==5){echo "wancheng_bottom1_line1";}?>">
						</div>
					</div>
				</li>
			</ul>
		</div>
		<div class="wancheng_bottom2">
			<ul>
                <?php foreach ($data as $v): $pdescription=mb_substr($v['pdescription'],0,10,"utf-8")."...";?>
				<li>
					<div class="wancheng1">
						<img src="../upload/<?php echo $v['pthumb']?>">
					</div>
					<h1><?php echo $v['pname']?></h1>
					<h2><?php echo $pdescription?></h2>
					<div>
						<div class="wancheng1_ren">
							<img src="../upload/<?php echo $v['tthumb']?>">
						</div>
						<p><?php echo $v['tposition']?></p>
						<span>&nbsp;/&nbsp;</span>
						<h3><?php echo $v['tename']?></h3>
						<div class="wancheng1_more">+
						</div>
					</div>
				</li>
                <?php endforeach;?>
			</ul>
		</div>

        <?php //echo $str?>

	</div>
<?php include "footer.php"?>