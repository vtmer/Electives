<body class='index-page'>
		<div class='main'>
			<form action='<?php echo site_url('login/check');?>' method='post'>
				<input type="text" name='account' id='account' placeholder='你的学号' maxlength='15' />
				<input type="password" name='password' id='password' placeholder='教务系统密码' maxlength='20' />
				<button type='submit' name='submit' id='submit' class='orange-button'>登录</button>
				<div class='warning-box'>
					<p>注：使用广工教务管理系统账户登录，方便我们根据你的所在校区为你筛选课程，你的隐私信息将会保密。</p>
				</div>
				<div class='warning-box' id='error-info' >
					<p>错误：账户密码匹配错误！</p>
				</div>
			</form>
			<div class='bg-box'></div>
		</div>
		<div class="intros">
			<h2>网站介绍</h2>
			<div class='intro1'>
				<h3>无需注册，快速登录</h3>
				<p>只需使用你的教务系统账号登录，免去繁琐的注册过程</p>
			</div>
			<div class='intro2'>
				<h3>选修课程星级排序</h3>
				<p>你可以根据选修的上课有趣程度和考试难易程度进行星级排序，好课程一网打尽</p>
			</div>
			<div class='intro3'>
				<h3>课程简介预先知道</h3>
				<p>选修课程内容早知道，选课时不再迷迷糊糊</p>
			</div>
		</div>