<body class='alter-page'>
		<div class='header'>
			<div class="header-inner">
				<a href='#' class='logo'>工大选修</a>
				<form action='' method='' class='search'>
					<input type='text' name='' placeholder='搜索选修课程...' id='search-block' /><button type='submit' name='' >搜索</button>
				</form>
				<a href='#' id='portrait' ><img src='images/portrait.png' /><span class='list-state'></span></a>
				<ul class='drop-list'>
					<li><a href='<?php echo site_url('favorite'); ?>'>我的收藏</a></li>
					<li><a href='<?php echo site_url('alter'); ?>'>修改资料</a></li>
					<li><a href='<?php echo site_url('login/logout'); ?>'>退出登录</a></li>
					<span class='arrow'></span>
				</ul>
			</div>
		</div>
		<div class='crumbs wrap clearfix'>
			<a href='<?php echo site_url('lists'); ?>'>主页<span class='arrow'></span></a><a href='<?php echo site_url('lists'); ?>'>课程列表<span class='arrow'></span></a><strong>什么什么课程</strong>
		</div>
		<div class='main'>
			<div class='alter-portrait'>
				<h2>修改头像<span>Head Portrait</span></h2>
				<form action='' method=''>
					<img src="images/portrait.png" alt="" /><input type='file' />
				</form>
			</div>
			<div class='alter-profile'>
				<h2>修改资料<span>profile</span></h2>
				<form action='' method=''>
					<ul class='data-list'>
						<li><span class='item-desc'>校区：</span>什么什么</li>
						<li><span class='item-desc'>届数：</span>什么什么什么什么什么</li>
						<li><span class='item-desc'>昵称：</span><input type='text' /></li>
						<li><span class='item-desc'></span><button type='submit' class='orange-button'>保存</button></li>
					</ul>
				</form>
			</div>
		</div>