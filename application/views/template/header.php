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
		<title>{title}</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('styles/reset.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('styles/global.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('styles/freeow.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('styles');?>/{css_file}" />
	</head>

<body class='{title}-page'>
	<div class='header'>
			<div class="header-inner">
				<a href='<?php echo site_url('lists'); ?>' class='logo'>工大选修</a>
				<form action='<?php echo site_url('search'); ?>' method='get' class='search' name='searching'>
					<input type='text' name='keyword' placeholder='搜索选修课程...' id='search-block' /><button type='submit' name='' >搜索</button>
				</form>
				<a href='#' id='portrait' ><img src='<?php echo base_url('avatar').'/'.$this->session->userdata('img'); ?>' /><span class='list-state'></span></a>
				<ul class='drop-list'>
					<li><a href='<?php echo site_url('favorite'); ?>'>我的收藏</a></li>
					<li><a href='<?php echo site_url('alter'); ?>'>修改资料</a></li>
					<li><a href='<?php echo site_url('login/logout'); ?>'>退出登录</a></li>
					<span class='arrow'></span>
				</ul>
			</div>
		</div>