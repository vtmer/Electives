var count = 1;
jQuery(".load-more").bind("click",function(){
	var keyword = $('.key-more').html();
	var action = document.searching.attributes["action"].value;
	//alert(action);
	var url = action+"/load_more";
	jQuery.getJSON(url,{page:count,key:keyword},function(data){
		
		$.each(data,function(i,array){
			//alert(array.id);
		var str = "";
		var str = "<ul class='clearfix'><li class='num-area'>"+array.id+"</li><li class='id-area' title=''>"+array.code+"</li><li class='classname-area' title=''><a href='http://localhost/Electives/index.php/intro/index/"+array.id+"'>"+array.name+"</a></li><li class='assess-area'><span class='star-assess star-"+array.multiple_grade+"'>星级评分</span></li><li class='assess-area'><span class='star-assess star-"+array.interest_grade+"'>星级评分</span></li><li class='assess-area'><span class='star-assess star-"+array.exam_grade+"'>星级评分</span></li></ul>";
		jQuery("#go-top").before(str);
		});	
		
	
	count++;
	});
})