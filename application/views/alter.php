		<div class='crumbs wrap clearfix'>
			<a href='<?php echo site_url('lists'); ?>'>主页<span class='arrow'></span></a><!--<a href='<?php echo site_url('lists'); ?>'>课程列表<span class='arrow'></span></a>--><strong>个人资料</strong>
		</div>
		<div class='main'>
			<div class='alter-portrait'>
				<?php foreach($info as $row):?>
				<h2>修改头像<span>Head Portrait</span></h2>
				<form action='<?php echo site_url('alter/do_upload'); ?>' method='post' enctype="multipart/form-data">
					
					<img src="<?php echo base_url('avatar').'/'.$this->session->userdata('img'); ?>" alt="" />
				
					
					<input type="file" name="userfile" size="20" />
					<button type='submit' class='orange-button'>上传</button>
				</form>
			</div>
			<div class='alter-profile'>
				<h2>修改资料<span>profile</span></h2>
				
				<form action='<?php echo site_url('alter/edit'); ?>' method='post'>
					<ul class='data-list'>
						<li><span class='item-desc'>校区：</span><?php echo $row['campus']; ?></li>
						<li><span class='item-desc'>届数：</span><?php echo $row['grade']; ?></li>
						<li><span class='item-desc'>昵称：</span><input type='text' value="<?php echo $row['kickname']; ?>" name="kickname"/></li>
						<li><span class='item-desc'></span><button type='submit' class='orange-button'>保存</button></li>
					</ul>
				</form>
				<?php endforeach;?>
			</div>
		</div>