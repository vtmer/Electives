<body class='list-page'>
		<div class='header'>
			<div class="header-inner">
				<a href='<?php echo site_url('lists'); ?>' class='logo'>工大选修</a>
				<form action='' method='' class='search'>
					<input type='text' name='' placeholder='搜索选修课程...' id='search-block' /><button type='submit' name='' >搜索</button>
				</form>
				<a href='#' id='portrait' ><img src="<?php echo base_url('images/portrait.png');?>" /><span class='list-state'></span></a>
				<ul class='drop-list'>
					<li><a href='<?php echo site_url('favorite'); ?>'>我的收藏</a></li>
					<li><a href='<?php echo site_url('alter'); ?>'>修改资料</a></li>
					<li><a href='<?php echo site_url('login/logout');?>'>退出登录</a></li>
					<span class='arrow'></span>
				</ul>
			</div>
		</div>
		<div class='crumbs wrap clearfix'>
			<a href='<?php echo site_url('lists'); ?>'>主页<span class='arrow'></span></a><strong>课程列表</strong>
		</div>
		<div class='main wrap'>
			<form class='select-box clearfix'>
				<div>
					<input type='hidden' name='school-select' id='school-select' value='mega-center' />
					<a href='#' class='select-button'>
						<span class='select-text'>大学城校区</span><span class='list-state'></span>
					</a>
					<ul class='drop-list'>
						<li><a href='#' val='longdong-campus' class='on-select'>大学城</a></li>
						<li><a href='#' val='longdong-campus'>龙洞校区</a></li>
						<li><a href='#' val='dongfenglu-campus'>东风路校区</a></li>
						<span class='arrow'></span>
					</ul>
				</div>
				<div>
					<input type='hidden' name='class-select' id='class-select' value='humanity-class' />
					<a href='#' class='select-button'>
						<span class='select-text'>人文社会科学类</span><span class='list-state'></span>
					</a>
					<ul class='drop-list'>
						<li><a href='#' val='humanity-class' class='on-select'>人文社会科学类</a></li>
						<li><a href='#' val='eng-class'>工程技术基础类</a></li>
						<li><a href='#' val='natural-class'>自然科学类</a></li>
						<span class='arrow'></span>
					</ul>
				</div>
				<div>
					<input type='hidden' name='assess-select' id='assess-select' value='total-assess' />
					<a href='#' class='select-button'>
						<span class='select-text'>按综合星级排序</span><span class='list-state'></span>
					</a>
					<ul class='drop-list'>
						<li><a href='#' val='humanity-class' class='on-select'>按综合星级排序</a></li>
						<li><a href='#' val='interest-assess'>按趣味性排序</a></li>
						<li><a href='#' val='diff-assess'>按考试难度排序</a></li><span class='arrow'></span>
					</ul>
				</div>
				<button type='submit' class='orange-button'>筛选</button>
			</form>
			<p class='tips'>筛选结果为空！</p>
			<div class='class-list'>
				<ul class='list-title clearfix'>
					<li class='num-area'>序号</li>
					<li class='id-area'>课程编号</li>
					<li class='classname-area'>课程名称</li>
					<li class='assess-area'>综合星级</li>
					<li class='assess-area'>趣味性</li>
					<li class='assess-area'>考试难度</li>
					<li class='cancel-area'></li>
				</ul>
				<?php foreach($courses as $row):?>
				<ul class='clearfix'>
					<li class='num-area'><?php if($row['id']<10&&$row['id']>0) echo '0'.$row['id']; ?></li>
					<li class='id-area' title='<?php echo $row['code']?>'><?php echo $row['code']?></li>
					<li class='classname-area' title='<?php echo $row['name']; ?>'><a href="<?php echo site_url('intro').'/index/'.$row['id'];?>"><?php echo $row['name']; ?></a></li>
					<li class='assess-area'><span class='star-assess star-<?php echo $row['multiple_grade']; ?>'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-<?php echo $row['interest_grade']; ?>'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-<?php echo $row['exam_grade']; ?>'>星级评分</span></li>
				</ul>
				<?php endforeach;?>
				<!--<ul class='clearfix'>
					<li class='num-area'>123</li>
					<li class='id-area' title='01137715'>01137715</li>
					<li class='classname-area' title='由案说法由案说法由案说法由啦啦啦啦啦啦！！！！！！！！'>由案说法由案说法由案说法由啦啦啦啦啦啦！！！！！！！！</li>
					<li class='assess-area'><span class='star-assess star-4'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-0'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-1'>星级评分</span></li>
				</ul>
				<ul class='clearfix'>
					<li class='num-area'>1234</li>
					<li class='id-area' title='12345678912'>12345678912</li>
					<li class='classname-area' title='三维动画制作'>三维动画制作</li>
					<li class='assess-area'><span class='star-assess star-5'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-2'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-3'>星级评分</span></li>
				</ul>
				<ul class='clearfix'>
					<li class='num-area'>123456</li>
					<li class='id-area' title='123456789123'>123456789123</li>
					<li class='classname-area' title='由案说法由案说法由案说法由案说法由案说法'>由案说法由案说法由案说法由案说法由案说法</li>
					<li class='assess-area'><span class='star-assess star-4'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-0'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-1'>星级评分</span></li>
				</ul>-->
				<a href='#' id='go-top'>置顶按钮</a>
			</div>
			<a href='#' class='load-more'>加载更多<span>...</span></a>
		</div>