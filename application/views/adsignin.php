<!DOCTYPE html>
<html>
  <head>
    <title>Signin GDUT-Electives</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
	<link href="<?php echo base_url('styles/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
	<link href="<?php echo base_url('styles/adsignin.css'); ?>" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <div class="container">

      <form class="form-signin" action="<?php echo site_url('adsignin/check'); ?>" method="post">
        <h2 class="form-signin-heading">工大选修-后台管理</h2>
        <input type="text" class="form-control" placeholder="用户名" autofocus="" name="username" id="account" />
        <input type="password" class="form-control" placeholder="密码" name="password" id="password" />
        <label class="checkbox">
          <input type="checkbox" value="remember-me" /> 记住我 
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="submit">登录</button>

      </form>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo base_url('scripts/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('scripts/adsignin.js'); ?>"></script>
 <script src="<?php echo base_url('scripts/global.js'); ?>"></script>
  </body>
 
</html>
