		<div class='crumbs wrap clearfix'>
			<a href='<?php echo site_url('lists'); ?>'>主页<span class='arrow'></span></a><strong>课程列表</strong>
		</div>
		<div class='main wrap'>
			<form class='select-box clearfix' action="<?php echo site_url('lists/select'); ?>" method="get" >
				<div>
					<input type='hidden' name='school-select' id='school-select' value='<?php if(isset($cam_select)) {echo $cam_select;} else {echo $this->session->userdata('campus');} ?>' />
					<a href='#' class='select-button'>
						<span class='select-text' ><?php if(isset($cam_select)) {echo $cam_select;} else {echo $this->session->userdata('campus');} ?></span><span class='list-state' ></span>
					</a>
				 
					<ul class='drop-list' >
						<li><a href='#' val='大学城校区' class='on-select' >大学城校区</a></li>
						<li><a href='#' val='龙洞校区'>龙洞校区</a></li>
						<li><a href='#' val='东风路校区'>东风路校区</a></li>
						<span class='arrow'></span>
					</ul>
				 
				</div>
				<div>
					<input type='hidden' name='class-select' id='class-select' value='<?php if(isset($kind_select)) {echo $kind_select;} else {echo '人文社会科学类';} ?>' />
					<a href='#' class='select-button'>
						<span class='select-text'><?php if(isset($kind_select)) {echo $kind_select;} else {echo '人文社会科学类'; } ?></span><span class='list-state'></span>
					</a>
					<ul class='drop-list'>
						<li><a href='#' val='人文社会科学类' class='on-select'>人文社会科学类</a></li>
						<li><a href='#' val='工程技术基础类'>工程技术基础类</a></li>
						<li><a href='#' val='自然科学类'>自然科学类</a></li>
						<span class='arrow'></span>
					</ul>
				</div>
				<div>
					<input type='hidden' name='assess-select' id='assess-select' value='<?php if(isset($assess_select)) {echo $assess_select;} else {echo 'multiple_grade'; }?>' />
					<a href='#' class='select-button'>
						<span class='select-text'>按<?php if(isset($assess_select_cn)) {echo $assess_select_cn;} else {echo '综合星级'; } ?>排序</span><span class='list-state'></span>
					</a>
					<ul class='drop-list'>
						<li><a href='#' val='multiple_grade' class='on-select'>按综合星级排序</a></li>
						<li><a href='#' val='interest_grade'>按趣味性排序</a></li>
						<li><a href='#' val='exam_grade'>按考试难度排序</a></li><span class='arrow'></span>
					</ul>
				</div>
				<button type='submit' class='orange-button'>筛选</button>
			</form>
				<?php if($courses == null):?>
			<p class='tips'>筛选结果为空！</p>
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
				
				
				<?php if(isset($courses)&&$courses):?>
				<?php foreach($courses as $row):?>
				<ul class='clearfix'>
					<li class='num-area'><?php if($row['id']<10&&$row['id']>0) echo '0'.$row['id'];else {echo $row['id'];} ?></li>
					<li class='id-area' title='<?php echo $row['code']?>'><?php echo $row['code']?></li>
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