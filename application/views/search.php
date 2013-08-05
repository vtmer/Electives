<body class='search-page'>
		<div class='header'>
			<div class="header-inner">
				<a href='<?php echo site_url('lists'); ?>' class='logo'>工大选修</a>
				<form action='<?php echo site_url('search'); ?>' method='post' class='search'>
					<input type='text' name='keyword' placeholder='搜索选修课程...' id='search-block' /><button type='submit' name='' >搜索</button>
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
			<a href='<?php echo site_url('lists'); ?>'>主页<span class='arrow'></span></a><strong>课程列表</strong>
		</div>
		<div class='main wrap'>
			<?php $i = 0;?>
			<?php if(isset($search_result)&&$search_result !== null):?>
			<?php foreach($search_result as $row): $i++;?>
			<?php endforeach;?>
			<?php endif;?>
			<p class='tips'>您搜索的关键字为 <strong><?php if(isset($none)){echo $none;} else {echo $keyword;} ?></strong> ，共有 <strong><?php echo $i;?></strong> 个结果！</p>
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
				
				<?php if(isset($search_result)&&$search_result):?>
				<?php foreach($search_result as $row): ?>
				<?php $i++;?>
				<ul class='clearfix'>
					<li class='num-area'><?php if($row['id']<10&&$row['id']>0) {echo '0'.$row['id'];} else {echo $row['id'];} ?></li>
					<li class='id-area' title='<?php echo $row['code']; ?>'><?php echo $row['code']; ?></li>
					<li class='classname-area' title='<?php echo $row['name']; ?>'><a href="<?php echo site_url('intro').'/index/'.$row['id'];?>"><?php echo $row['name']; ?></a></li>
					<li class='assess-area'><span class='star-assess star-<?php echo $row['multiple_grade']; ?>'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-<?php echo $row['interest_grade']; ?>'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-<?php echo $row['exam_grade']; ?>'>星级评分</span></li>
				</ul>
				<?php endforeach;?>
				<?php endif;?>
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