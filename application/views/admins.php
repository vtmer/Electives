<!DOCTYPE html>
<html>
  <head>
    <title>GDUT Electives-Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url('styles/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('styles/admins.css'); ?>" rel="stylesheet" media="screen">

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
          <a class="navbar-brand" href="http://v3.bootcss.com/examples/navbar-fixed-top/#">工大选修-后台管理</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://v3.bootcss.com/examples/navbar-fixed-top/#">Home</a></li>
            <li><a href="http://v3.bootcss.com/examples/navbar-fixed-top/#about">About</a></li>
            <li><a href="http://v3.bootcss.com/examples/navbar-fixed-top/#contact">Contact</a></li>
            <li class="dropdown">
              <a href="http://v3.bootcss.com/examples/navbar-fixed-top/#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="http://v3.bootcss.com/examples/navbar-fixed-top/#">Action</a></li>
                <li><a href="http://v3.bootcss.com/examples/navbar-fixed-top/#">Another action</a></li>
                <li><a href="http://v3.bootcss.com/examples/navbar-fixed-top/#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="http://v3.bootcss.com/examples/navbar-fixed-top/#">Separated link</a></li>
                <li><a href="http://v3.bootcss.com/examples/navbar-fixed-top/#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><h4>Hi</h4></li>
            <li><h4>XXX</h4></li>
            <li><a href="<?php echo site_url('admins/logout')?>">退出</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>



  </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted credit">Example courtesy <a href="http://martinbean.co.uk">Martin Bean</a> and <a href="http://ryanfait.com/sticky-footer/">Ryan Fait</a>.</p>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('scripts/bootstrap.min.js'); ?>"></script>
  </body>
</html>
