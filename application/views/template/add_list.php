<div class="container" id="addlist">

<style type="text/css">
#wrap > .container {
  padding: 100px 15px 0;
}
.jumbotron{
	height: 450px;
}
</style>	

	<div class="jumbotron">
		<form role="form" action="<?php echo site_url('admins/upload');?>" method="post" enctype="multipart/form-data">
		<h3>批量添加选修课程</h3>

		

		<label for="exampleInputFile">上传课程列表</label>
    	<input type="file" id="exampleInputFile" name="userfile" />
    	
    	<div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">上传须知</h3>
        </div>
        <div class="panel-body">
          <p>Panel content</p>
        </div>
      	</div>
 

		<button type="submit" class="btn btn-primary">上传</button>
	
		</form>
	</div>