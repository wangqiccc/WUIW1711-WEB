<?php
include "header.php";
include "../public/db.php";
$sql="select * from goods limit 0,6";
$r=$db->query($sql);
$garr=$r->fetch_all(MYSQLI_ASSOC);

$sql="select *from team limit 0,4";
$r=$db->query($sql);
$tarr=$r->fetch_all(MYSQLI_ASSOC);
?>
    <link rel="stylesheet" href="../static/css/index.css">
	<div class="banner">
		<div class="banner_all1">
			<div class="banner_item">
				<div class="item_left"></div>
				<p class="banner_shuzi">1</p>
				<div class="item_right"></div>
			</div>
			<div class="banner_item banner_item1">
				<div class="item_left"></div>
				<p class="banner_shuzi ">2</p>
				<div class="item_right"></div>
			</div>
			<div class="banner_item banner_item1">
				<div class="item_left"></div>
				<p class="banner_shuzi">3</p>
				<div class="item_right"></div>
			</div>
			<div class="banner_item banner_item1">
				<div class="item_left"></div>
				<p class="banner_shuzi">4</p>
				<div class="item_right"></div>
			</div>
			<div class="banner_item banner_item1">
				<div class="item_left"></div>
				<p class="banner_shuzi">5</p>
				<div class="item_right"></div>
			</div>
		</div>
	</div>
	<div class="product">
		<div class="product_top">
			<p class="product_strong">LIVABLE</p>
			<p class="product_normal">ERA</p>
			<div class="product_title">
				产品<br>中心
			</div>
			<span class="pruoduct_right">
				SOMETHING<br>YOU
				<h1>DON'T KNOW</h1>
			</span>
		</div>
		<div class="product_bottom">
            <?php foreach ($garr as $v):?>
			<div class="product_item product_item2">
				<img src="../upload/<?php echo $v['gthumb']?>" alt="">
				<div class="product_float">
					<div class="product_floata">
					</div>
					<div class="product_floatb"><?php echo $v['gname']?></div>
					<div class="product_floatc">
						<img src="../static/imgs/qq.png" alt="">
						<p> ·<?php echo $v['gename']?>·</p>
						<img src="../static/imgs/qq.png" alt="">
					</div>
				</div>
			</div>
            <?php endforeach;?>
		</div>
	</div>
	<div class="product tuandui">
		<div class="product_top">
			<p class="product_strong">LIVABLE</p>
			<p class="product_normal">ERA</p>
			<div class="product_title">
				案例<br>展示
			</div>
			<span class="pruoduct_right">
				SOMETHING<br>YOU
				<h1>DON'T KNOW</h1>
			</span>
		</div>
		<div class="tuandui_bottom">
			<img src="../static/imgs/tuandui2.png" alt="" class="tuandui_tu2">
			<img src="../static/imgs/tuandui3.png" alt="" class="tuandui_tu3">
			<img src="../static/imgs/tuandui1.png" alt="" class="tuandui_tu1">
			<h1>LIVABLE ERA <h2>阳台展示</h2></h1>
			<p>宜居时代有限公司成立于1984年，1988年进入家居行业，经过30余年的发展“</p>
			<div class="tuandui_wenzi">
					宜居时代创造性的引进和提出了先进的服务理念。率先提出“先行赔付绿色环保”、“零延迟”、“一个月无理由退换货”、“没有增项的家装”等服务承诺，从消费者的切身利益出发，踏实认真履行“先行赔付”十数载。“让客户满意”，“向消费者倾斜”是永远不懈的追求。
					一个月无理由退换货”、“没有增项的家装”等服务承诺，从消费者的切身利益出发，踏实认真履行“先行赔付”十数载。“让客户满意”，“向消费者
				<div class="send1">
					<span>SEND</span>
					<div class="send_more">+</div>
				</div>
			</div>
		</div>
	</div>
	<div class="jieshaoall">
		<div class="jieshao">
			<div class="product_top">
				<p class="product_strong">LIVABLE</p>
				<p class="product_normal">ERA</p>
				<div class="product_title">
					团队<br>介绍

				</div>
				<span class="pruoduct_right">
					SOMETHING<br>YOU
					<h1>DON'T KNOW</h1>
				</span>
			</div>
		</div>

		<div class="jieshao_bottom">
			<div class="jieshao_bottom1">
			<img src="../static/imgs/team_bg.png" alt="">
			</div>
			<div class="jieshao_bottom2">
				<h1>PROTENA TEAM</h1>
				<div class="more1">
					<span>MORE</span>
					<a href="tuandui.php" class="more_white">+</a>
				</div>
				<p>项目团队成员来自13个国家顶尖家居行业专家，曾获得国内外多项大奖，承接各类建筑事物，项目资质齐全</p>
				<div class="jieshao_renwu">
                    <?php foreach ($tarr as $t):?>
					<div class="renwu_item">
						<img src="../upload/<?php echo $t['tthumb']?>" alt="">
						<span><?php echo $t['tename']?></span>
					</div>
                    <?php endforeach;?>
				</div>
				<div class="jieshao_zhujue">
				</div>
				<div class="jieshao_zhujue jieshao_zhujue1">
					<img src="../static/imgs/ren.png" alt="">
				</div>
			</div>

		</div>

	</div>
	</div>
	<?php include "footer.php"?>