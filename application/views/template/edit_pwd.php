<div class="container" id="account">	
  
  <style type="text/css">
#wrap > .container {
  padding: 100px 15px 0;
}
.form-control{
  margin-bottom: 20px;
}
form{
  margin-left: 360px;
  margin-right: 360px;
}
h2{
  margin-top: -10px;
  margin-left: 410px;
  margin-right: 350px;
  margin-bottom: 30px;
}
</style>
	
  <div class="jumbotron">
    <h2>管理员密码管理</h2>
  <form class="form-signin" action="<?php echo site_url('adsignin/check'); ?>" method="post">
        <h2 class="form-signin-heading"></h2>
        <input type="text" class="form-control" placeholder="原密码" autofocus="" name="password" id="account-one" />
        <input type="password" class="form-control" placeholder="新密码" name="password" id="password-two" />
        <input type="password" class="form-control" placeholder="重复新密码" name="password" id="password-three" />
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="submit">确认修改</button>

  </form>
  </div>
</div>