<!DOCTYPE html>
<html>
  <head>
    <title>GDUT Electives-Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url('styles/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('styles/admins.css'); ?>" rel="stylesheet" media="screen">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('styles/messenger.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('styles/messenger-theme-air.css');?>" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="wrap">

    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">工大选修-后台管理</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">首页</a></li>
            <li><a href="#">关于</a></li>
            <li><a href="#">联系</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">管理<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a id="add" href="#">添加选修课程（批量）</a></li>
                <li><a id="cos" href="#">修改选修课程</a></li>
                <li><a id="pwd" href="#">管理员帐号</a></li>
                <li><a id="anly" href="#">课程、用户数据分析</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><h4>Hi</h4></li>
            <li><h4><?php echo $this->session->userdata('admin'); ?></h4></li>
            <li><a href="<?php echo site_url('admins/logout'); ?>">退出</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
    <?php if(isset($tips)):?>
    <div id="messenger" hidden><?php echo $content;?></div>
    <?php endif;?>

	

	</div>


    <div id="footer">
      <div class="container">
        <p class="text-muted credit">Build by <a target="_blank" href="http://sayue.github.io">sayue </a>and Example courtesy <a href="http://martinbean.co.uk">Martin Bean</a> and <a href="http://ryanfait.com/sticky-footer/">Ryan Fait</a>.</p>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo base_url('scripts/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('scripts/messenger.min.js');?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('scripts/bootstrap.min.js'); ?>"></script>
  </body>
    <script src="<?php echo base_url('scripts/prompt.js');?>"></script>
    <script src="<?php echo base_url('scripts/admins.js');?>"></script>
</html>
