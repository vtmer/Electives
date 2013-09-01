var count = 1;
jQuery(".load-more").bind("click",function(){
	
	var userid = $('#user-id').val();//session('user_id')
	var action = document.searching.attributes["action"].value;
	var end = action.indexOf("search");
	action = action.substr(0,end);
	var url = action + "favorite/load_more";
	//alert(url);

	jQuery.getJSON(url,{page:count},function(data){
		
		$.each(data,function(i,array){
			//alert(array.id);
		var str = "";
		var str = "<ul class='clearfix'><li class='num-area'>"+array.id+"</li><li class='id-area' title=''>"+array.code+"</li><li class='classname-area' title=''><a href='http://localhost/Electives/index.php/intro/index/"+array.id+"'>"+array.name+"</a></li><li class='assess-area'><span class='star-assess star-"+array.multiple_grade+"'>星级评分</span></li><li class='assess-area'><span class='star-assess star-"+array.interest_grade+"'>星级评分</span></li><li class='assess-area'><span class='star-assess star-"+array.exam_grade+"'>星级评分</span></li><li class='cancel-area'><a href='http://localhost/Electives/index.php/favorite/cancel/"+userid+"/"+array.id+"' class='orange-button' id='cancel-button'>取消收藏</a></li></ul>";
		jQuery("#go-top").before(str);
		});	
		
	
	count++;
	});
})