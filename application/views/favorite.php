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
		
				<a href='#' id='go-top'>置顶按钮</a>
			</div>
			<a href='#' class='load-more'>加载更多<span>...</span></a>
		</div>