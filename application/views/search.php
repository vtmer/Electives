		<div class='crumbs wrap clearfix'>
			<a href='<?php echo site_url('lists'); ?>'>主页<span class='arrow'></span></a><strong>课程列表</strong>
		</div>
		<div class='main wrap'>
			
			<p class='tips'>您搜索的关键字为 <strong><?php if(isset($none)){echo $none;} else {echo $keyword;} ?></strong> ，共有 <strong><?php echo $num;?></strong> 个结果！</p>
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
	
				<a href='#' id='go-top'>置顶按钮</a>
			</div>
			<a href='#' class='load-more'>加载更多<span>...</span></a>
		</div>