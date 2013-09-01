<!--<body class='intro-page'>-->
		<div class='window-overlay'>
			<div class='window'>
				<div class='window-handle'><a href='#' class='window-close-button'>关闭</a></div>
				<h2 class='window-title'>我要评价</h2>
				<?php foreach($intro as $row_course):?>
				<form action="<?php echo site_url('intro/comment').'/'.$row_course['id']; ?>" method='post' name='assessing'>
					<input type='hidden' value='<?php echo $row_course['id'];?>' id='courseid' />
					<input type='hidden' value='' name='interest-assess' id='interest-assess'/>
					<input type='hidden' value='' name='diff-assess' id='diff-assess'/>
					<ul class='data-list'>
						<li><span class='item-desc'>趣味性</span><span class='clearfix star-assess interest-assess'><a href='#' title='1星'></a><a href='#' title='2星'></a><a href='#' title='3星'></a><a href='#' title='4星'></a><a href='#' title='5星'></a></span></li>
						<li><span class='item-desc'>考试难度</span><span class='clearfix star-assess diff-assess'><a href='#' title='1星'></a><a href='#' title='2星'></a><a href='#' title='3星'></a><a href='#' title='4星'></a><a href='#' title='5星'></a></span></li>
						<li><span class='item-desc'><label for='test-way'>考试方式</label></span><input type='' name='test-way' id='test-way' value=''/></li>
						<li><span class='item-desc'><label for='your-comment'>课程评价</label></span><textarea name='your-comment' id='your-comment' value=''></textarea></li>
						<li><span class='item-desc'></span><button type='submit' class='orange-button'>发布评价</button></li>
					</ul>
				</form>
			<?php endforeach;?>
			</div>
		</div>

		<?php if(isset($tips)):?>
	
		<div id="freeow-message" hidden><?php echo $content;?></div>
		<div id="freeow" class="freeow freeow-top-right"></div>
		<?php endif;?>

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
							<img src='<?php echo 'http://opcourse-avatars.stor.sinaapp.com/'.$row_comment['img']; ?>' title='阿猫'/>
							<h3><?php if($row_comment['kickname']) {echo $row_comment['kickname'];} else {echo 'NO NAME';}?><span class='comment-time'><?php echo $row_comment['comment_time']; ?></span></h3>
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
					
			
				</div>
				<a href='#footer' class='load-more'>加载更多<span>...</span></a>
				<a href='#' id='go-top'>置顶按钮</a>
			</div>
			<div class='main-sidebar'>
				<ul class='data-list'>
					<li><span class='item-desc'>综合星级</span><span class='star-assess star-<?php echo $row_course['multiple_grade']; ?>'>星级评价</span></li>
					<li><span class='item-desc'>趣味性</span><span class='star-assess star-<?php echo $row_course['interest_grade']; ?>'>星级评价</span></li>
					<li><span class='item-desc'>考试难度</span><span class='star-assess star-<?php echo $row_course['exam_grade']; ?>'>星级评价</span></li>
				</ul>

				<script>
				function show_share(){
					if(!$('.bshare-custom').is(":visible"))
					{
						$('.bshare-custom').fadeIn(1000);
					}
					else
					{
						$('.bshare-custom').fadeOut(1000);
					}
				}
				 
				</script>
				
				<ul class='sidebar-list'>
					<li><a href='#' class='comment-class'>我要评价</a></li>
					<li><a href='<?php echo site_url('favorite/add').'/'.$this->session->userdata('user_id').'/'.$row_course['id']; ?>' class='favorite-class'>收藏</a></li>
					<li><a href='#' class='share-class' onclick='show_share();'>分享</a></li>
					</ul>
				
				<div class="bshare-custom" hidden>
					<a title="分享到QQ空间" class="bshare-qzone"></a>
					<a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
					<a title="分享到人人网" class="bshare-renren"></a>
					<a title="分享到腾讯微博" class="bshare-qqmb"></a>
					<a title="分享到豆瓣" class="bshare-douban"></a>
					<a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a>
					<span class="BSHARE_COUNT bshare-share-count">0</span>
				</div>

			</div>
		</div>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url('scripts/buttonLite.js');?>">
		</script>
		<script type="text/javascript" charset="utf-8">
				bShare.addEntry({
   		    	title: "#工大选修#",
   				url: window.location.herf,
   			 	summary: "我在工大选修发现一门不错的选修课《<?php echo $row_course['name']; ?>》哦！你也一起来看看吧！@Vtmer维生数工作室",
   				pic: ""
			});
		</script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url('scripts/bshareC0.js');?>">
		</script>
		
		
		
