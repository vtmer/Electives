	<div class='crumbs wrap clearfix'>
			<a href='<?php echo site_url('lists'); ?>'>主页<span class='arrow'></span></a><strong>我的收藏</strong>
		</div>

		<div class='main wrap'>
			
			<?php if(!$status):?>
			<p class='tips'>您的收藏夹为空！快去<a href='<?php echo site_url('lists'); ?>'><strong> 主页 </strong></a>挑选您喜爱的课程吧！！</p>
			<?php endif;?>
			 
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
				
				<?php if($status):?>
				<?php foreach($favorite as $row):?>
				
				<ul class='clearfix'>
					<li class='num-area'><?php if($row['id']<10&&$row['id']>0) {echo '0'.$row['id'];} else {echo $row['id'];} ?></li>
					<li class='id-area' title='<?php echo $row['code'];?>'><?php echo $row['code'];?></li>
					<li class='classname-area' title='<?php echo $row['name'];?>'><a href="<?php echo site_url('intro').'/index/'.$row['id'];?>"><?php echo $row['name'];?></a></li>
					<li class='assess-area'><span class='star-assess star-<?php echo $row['multiple_grade'];?>'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-<?php echo $row['interest_grade'];?>'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-<?php echo $row['exam_grade'];?>'>星级评分</span></li>
					<li class='cancel-area'>
					
						<a href="<?php echo site_url('favorite/cancel').'/'.$this->session->userdata('user_id').'/'.$row['id']; ?>" class='orange-button' id='cancel-button'>取消收藏</a>
					
					</li>
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
					<li class='cancel-area'>
						<a href='#' class='orange-button' id='cancel-button'>取消收藏</a>
					</li>
				</ul>
				<ul class='clearfix'>
					<li class='num-area'>1234</li>
					<li class='id-area' title='12345678912'>12345678912</li>
					<li class='classname-area' title='三维动画制作'>三维动画制作</li>
					<li class='assess-area'><span class='star-assess star-5'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-2'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-3'>星级评分</span></li>
					<li class='cancel-area'>
						<a href='#' class='orange-button' id='cancel-button'>取消收藏</a>
					</li>
				</ul>
				<ul class='clearfix'>
					<li class='num-area'>123456</li>
					<li class='id-area' title='123456789123'>123456789123</li>
					<li class='classname-area' title='由案说法由案说法由案说法由案说法由案说法'>由案说法由案说法由案说法由案说法由案说法</li>
					<li class='assess-area'><span class='star-assess star-4'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-0'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-1'>星级评分</span></li>
					<li class='cancel-area'>
						<a href='#' class='orange-button' id='cancel-button'>取消收藏</a>
					</li>
				</ul>
				<ul class='clearfix'>
					<li class='num-area'>01</li>
					<li class='id-area' title='01137715'>01137715</li>
					<li class='classname-area' title='由案说法'>由案说法</li>
					<li class='assess-area'><span class='star-assess star-1'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-3'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-5'>星级评分</span></li>
					<li class='cancel-area'>
						<a href='#' class='orange-button' id='cancel-button'>取消收藏</a>
					</li>
				</ul>
				<ul class='clearfix'>
					<li class='num-area'>123</li>
					<li class='id-area' title='01137715'>01137715</li>
					<li class='classname-area' title='由案说法由案说法由案说法由啦啦啦啦啦啦！！！！！！！！'>由案说法由案说法由案说法由啦啦啦啦啦啦！！！！！！！！</li>
					<li class='assess-area'><span class='star-assess star-4'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-0'>星级评分</span></li>
					<li class='assess-area'><span class='star-assess star-1'>星级评分</span></li>
					<li class='cancel-area'>
						<a href='#' class='orange-button' id='cancel-button'>取消收藏</a>
					</li>
				</ul>-->
				<a href='#' id='go-top'>置顶按钮</a>
			</div>
			<a href='#' class='load-more'>加载更多<span>...</span></a>
		</div>