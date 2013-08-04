<body class='intro-page'>
		<div class='window-overlay'>
			<div class='window'>
				<a href='#' class='window-close-button'>关闭</a>
				<h2 class='window-title'>我要评价</h2>
				<form action="#" methed='#'>
					<input type='hidden' value='0' name='interest-assess'/>
					<input type='hidden' value='1' name='diff-assess'/>
					<ul class='data-list'>
						<li><span class='item-desc'>趣味性</span><span class='star-assess star-5'>星级评价</span></li>
						<li><span class='item-desc'>考试难度</span><span class='star-assess star-2'>星级评价</span></li>
						<li><span class='item-desc'><label for='test-way'>考试方式</label></span><input type='' name='test-way' id='test-way' /></li>
						<li><span class='item-desc'><label for='your-comment'>课程评价</label></span><textarea name='your-comment' id='your-comment'></textarea></li>
						<li><span class='item-desc'></span><button type='submit' class='orange-button'>发布评价</button></li>
					</ul>
				</form>
			</div>
		</div>
		<div class='header'>
			<div class="header-inner">
				<a href='<?php echo site_url('lists'); ?>' class='logo'>工大选修</a>
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
		<?php foreach($intro as $row_course):?>
		<div class='crumbs wrap clearfix'>
			<a href='<?php echo site_url('lists'); ?>'>主页<span class='arrow'></span></a><a href='<?php echo site_url('lists'); ?>'>课程列表<span class='arrow'></span></a><strong><?php echo $row_course['name']; ?></strong>
		</div>
		<div class='main'>
			<div class="main-content">
				
				
				<ul class='data-list'>
					<li><span class='item-desc'>课程编号</span><?php echo $row_course['code']; ?></li>
					<li><span class='item-desc'>课程归属</span><?php echo $row_course['kind']; ?></li>
				</ul>
				<h1><?php echo $row_course['name']; ?></h1>
				<div class='teacher-intro'>
					<h2>教师<span>Teacher</span></h2>
					<ul class='data-list'>
						<li><span class='item-desc'>任课教师</span><?php echo $row_course['teacher']; ?></li>
						<li><span class='item-desc'>联系邮箱</span><?php echo $row_course['email']; ?></li>
						<li><span class='item-desc'>联系电话</span><?php echo $row_course['phone']; ?></li>
					</ul>
				</div>
				<div class='class-intro'>
					<h2>简介<span>Introduction</span></h2>
					<p><?php echo $row_course['intro']; ?></p>
				</div>
				<?php endforeach;?>
				
				<div class="comments">
					<h2>评价<span>Comments</span></h2>
					
					<?php foreach($comment as $row_comment):?>

					<div class='comment-box'>
						<div class='comment-content'>
							<img src='images/portrait.png' title='阿猫'/>
							<h3><?php foreach($user as $row_user):?><?echo $row_user['kickname'];?><?php endforeach;?><span class='comment-time'><?php echo $row_comment['comment_time']; ?></span></h3>
							<ul class='data-list'>
								<li><span class='item-desc'>考试方式</span><?php echo $row_comment['exam_form']; ?></li>
								<li><span class='item-desc'>课程评价</span><?php echo $row_comment['content']; ?></li>
							</ul>
						</div>
						<div class="comment-sidebar">
							<ul class='data-list'>
								<li><span class='item-desc'>趣味性</span><span class='star-assess star-<?php echo $row_comment['interest_grade']; ?>'>星级评价</span></li>
								<li><span class='item-desc'>考试难度</span><span class='star-assess star-<?php echo $row_comment['exam_grade']; ?>'>星级评价</span></li>
							</ul>
						</div>
					</div>
					<?php endforeach;?>
					
					<!--<div class='comment-box'>
						<div class='comment-content'>
							<img src='images/portrait2.png' title='阿猫'/>
							<h3>什么什么名字<span class='comment-time'>2001.12.12</span></h3>
							<ul class='data-list'>
								<li><span class='item-desc'>考试方式</span>论文</li>
								<li><span class='item-desc'>课程评价</span>什么什么</li>
							</ul>
						</div>
						<div class="comment-sidebar">
							<ul class='data-list'>
								<li><span class='item-desc'>趣味性</span><span class='star-assess star-1'>星级评价</span></li>
								<li><span class='item-desc'>考试难度</span><span class='star-assess star-2'>星级评价</span></li>
							</ul>
						</div>
					</div>
					<div class='comment-box'>
						<div class='comment-content'>
							<img src='images/portrait.png' title='阿猫'/>
							<h3>什么什么名字<span class='comment-time'>2001.12.12</span></h3>
							<ul class='data-list'>
								<li><span class='item-desc'>考试方式</span>论文</li>
								<li><span class='item-desc'>课程评价</span>什么什么什么什么什么什么什么什么什么什么什么什</li>
							</ul>
						</div>
						<div class="comment-sidebar">
							<ul class='data-list'>
								<li><span class='item-desc'>趣味性</span><span class='star-assess star-2'>星级评价</span></li>
								<li><span class='item-desc'>考试难度</span><span class='star-assess star-3'>星级评价</span></li>
							</ul>
						</div>
					</div>
					<div class='comment-box'>
						<div class='comment-content'>
							<img src='images/portrait2.png' title='阿猫'/>
							<h3>什么什么名字<span class='comment-time'>2001.12.12</span></h3>
							<ul class='data-list'>
								<li><span class='item-desc'>考试方式</span>论文</li>
								<li><span class='item-desc'>课程评价</span>什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么</li>
							</ul>
						</div>
						<div class="comment-sidebar">
							<ul class='data-list'>
								<li><span class='item-desc'>趣味性</span><span class='star-assess star-5'>星级评价</span></li>
								<li><span class='item-desc'>考试难度</span><span class='star-assess star-2'>星级评价</span></li>
							</ul>
						</div>
					</div>
					<div class='comment-box'>
						<div class='comment-content'>
							<img src='images/portrait2.png' title='阿猫'/>
							<h3>什么什么名字<span class='comment-time'>2001.12.12</span></h3>
							<ul class='data-list'>
								<li><span class='item-desc'>考试方式</span>论文</li>
								<li><span class='item-desc'>课程评价</span>什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么什么</li>
							</ul>
						</div>
						<div class="comment-sidebar">
							<ul class='data-list'>
								<li><span class='item-desc'>趣味性</span><span class='star-assess star-1'>星级评价</span></li>
								<li><span class='item-desc'>考试难度</span><span class='star-assess star-4'>星级评价</span></li>
							</ul>
						</div>
					</div>-->
				</div>
				<a href='#' class='load-more'>加载更多<span>...</span></a>
				<a href='#' id='go-top'>置顶按钮</a>
			</div>
			<div class='main-sidebar'>
				<ul class='data-list'>
					<li><span class='item-desc'>综合星级</span><span class='star-assess star-<?php echo $row_course['multiple_grade']; ?>'>星级评价</span></li>
					<li><span class='item-desc'>趣味性</span><span class='star-assess star-<?php echo $row_course['interest_grade']; ?>'>星级评价</span></li>
					<li><span class='item-desc'>考试难度</span><span class='star-assess star-<?php echo $row_course	['exam_grade']; ?>'>星级评价</span></li>
				</ul>
				<ul class='sidebar-list'>
					<li><a href='#' class='comment-class'>我要评价</a></li>
					<li><a href='#' class='favorite-class'>收藏</a></li>
					<li><a href='#' class='share-class'>分享</a></li>
				</ul>
			</div>
		</div>