<!DOCTYPE HTML>
<!--[if IE 6]><html class="ie6 lte9 lte8 lte7 no-css3" lang="zh-cn"><![endif]-->
<!--[if IE 7]><html class="ie7 lte9 lte8 lte7 no-css3" lang="zh-cn"><![endif]-->
<!--[if IE 8]><html class="ie8 lte9 lte8 no-css3" lang="zh-cn"><![endif]-->
<!--[if IE 9]><html class="ie9 lte9 no-css3" lang="zh-cn"><![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8) | !(IE 9)  ]><!--><html lang="zh-cn" class='non-ie'><!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="..." />
		<meta name="keywords" content="..." />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" /><!-- 响应式网页设计：initial-scale设定初始缩放比例 maximum-scale设定允许用户缩放到的最大比例 minimum-scale设定允许用户缩放到的最小比例 值范围从0.0到10.0 user-scalable设定是否允许用户进行手动缩放 值为yes或no -->
		<title>index</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('styles/reset.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('styles/global.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('styles/freeow.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('styles/index.css');?>" />
	</head>

	<body class='index-page'>
		<div class='main'>
			<form action='<?php echo site_url('login/check');?>' method='post'>
				<input type="text" name='account' id='account' placeholder='你的学号' maxlength='15' />
				<input type="password" name='password' id='password' placeholder='教务系统密码' maxlength='20' />
				<button type='submit' name='submit' id='submit' class='orange-button'>登录</button>
				<div class='warning-box'>
					<p>注：使用广工教务管理系统账户登录，方便我们根据你的所在校区为你筛选课程，你的隐私信息将会保密。</p>
				</div>
				<div class='warning-box' id='error-info' >
					<p>错误：账户密码匹配错误！</p>
				</div>
			</form>
			<div class='bg-box'></div>
		</div>


		<?php if(isset($error)):?>
	
		<div id="freeow-message" hidden><?php echo $content;?></div>
		<div id="freeow" class="freeow freeow-top-right"></div>
		<?php endif;?>

		
		<div class="intros">
			<h2>网站介绍</h2>
			<div class='intro1'>
				<h3>无需注册，快速登录</h3>
				<p>只需使用你的教务系统账号登录，免去繁琐的注册过程</p>
			</div>
			<div class='intro2'>
				<h3>选修课程星级排序</h3>
				<p>你可以根据选修的上课有趣程度和考试难易程度进行星级排序，好课程一网打尽</p>
			</div>
			<div class='intro3'>
				<h3>课程简介预先知道</h3>
				<p>选修课程内容早知道，选课时不再迷迷糊糊</p>
			</div>
		</div>