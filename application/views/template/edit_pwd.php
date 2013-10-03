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
.glyphicon{
  top: -215px;
  left: 320px;
}
input{
  margin-top: 10px;
}
</style>
	
  <div class="jumbotron">
    <h2>管理员密码管理</h2>
  <form class="form-signin" action="<?php echo site_url('admins/updatepwd'); ?>" method="post">
        <h2 class="form-signin-heading"></h2>
        <input type="password" class="form-control" placeholder="原密码" autofocus="" name="pwd-old" id="pwd-old" />
        <input type="password" class="form-control" placeholder="新密码" name="pwd-new" id="pwd-new" />
        <input type="password" class="form-control" placeholder="重复新密码" name="pwd-renew" id="pwd-renew" />
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="submit" disabled>确认修改</button>

  </form>
  </div>
</div>
<script text="javascript">
$("input[name='pwd-old']").change(function(){
  // 这里可以写些验证代码
  var pwd = $('#pwd-old').val();
  $.ajax({
    type:"GET",
    url:"./admins/checkpwd/"+pwd,
    //data:"pwd="+pwd,
    success:function(msg){
      //alert(msg);
      if(msg=='correct'){
        $("form").append("<span class='glyphicon glyphicon-star-empty' ></span>");
        $("#submit").removeAttr("disabled");

      }
      else if(msg=='error'){
        $("form span").remove();
        $("#submit").attr("disabled","disabled");
      }
      //$("#pwd-old").append("<span class="glyphicon glyphicon-star-empty" ></span>");}
    }

  });
});
</script>