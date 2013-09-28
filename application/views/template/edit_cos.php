<div class="container" id="editcos">

<style type="text/css">
#wrap > .container {
  padding: 100px 15px 0;
}
.jumbotron{
	height: 450px;
}
h3{
	margin-top: 10px;
}
.nav-left{
	width: 200px;
}
.table-right{
	margin-left: 300px;
	margin-top: -135px;
}
</style>	

	<div class="jumbotron">
		<form role="form">

		<div class="nav-left">
		<h3>修改选修课程</h3>
		<!--校区选择 -->
		<div class="btn-group">
  		<button type="button" class="btn btn-info">校区</button>
  		<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
    	<span class="caret"></span>
   		<span class="sr-only">Toggle Dropdown</span>
  		</button>
  		<ul class="dropdown-menu" role="menu">
    		<li><a href="#">大学城校区</a></li>
    		<li><a href="#">龙洞校区</a></li>
    		<li><a href="#">东风路校区</a></li>
 	 	</ul>
		</div><br/>

		<!--课程种类 -->
		<div class="btn-group">
  		<button type="button" class="btn btn-info">课程种类</button>
  		<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
    	<span class="caret"></span>
   		<span class="sr-only">Toggle Dropdown</span>
  		</button>
  		<ul class="dropdown-menu" role="menu">
    		<li><a href="#">人文社会科学类</a></li>
    		<li><a href="#">工程技术基础类</a></li>
    		<li><a href="#">自然科学类</a></li>
 	 	</ul>
		</div>
		</div>
		<!-- -->
		
		<!--课程链接-->
		<div class="table-right">
		<table class="table table-hover">
  		<thead>
          <tr>
            <th>选修课</th>
          </tr>
        </thead>
        <tbody>
          <tr><td><a href="#">电影怎样讲故事</a></td></tr>
          <tr><td><a href="#">读解电影音乐</a></td></tr>
          <tr><td><a href="#">中外广告创意赏析</a></td></tr>
        </tbody>
		</table>
		</div>

		<!--对话修改框-->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
    	<div class="modal-content">
      	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      	</div>
      	<div class="modal-body">
        ...
      	</div>
      	<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      	</div>
    	</div><!-- /.modal-content -->
  		</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<!--修改框按钮
		<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" display="hidden">
  		Launch demo modal
		</button>-->

		
	
		</form>
	</div>