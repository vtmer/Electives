$(document).ready(function(){

	(function($){
	$(function(){
		/*生成弹窗
		--------------------------------------*/ 
		var $windowOverlay = $('.window-overlay');
		var $theWindow = $('.window');
		$.createWindow($theWindow);
		var $commentButton = $('.comment-class');
		$commentButton.on('click', function(event){
			$theWindow.triggerHandler('open');
			event.preventDefault();
		});
		// 星级评论
		function assess(event){
			var $this = $(this),
				$parent = $this.parent(),
				existClass = '',
				level = $this.index() + 1;
			for(var i = 5; i; i--){
				console.log(i);
				existClass = 'star-' + i;
				if($parent.hasClass(existClass)){
					$parent.removeClass(existClass);
					break;
				}
			}
			$this.parent().addClass('star-' + level);
			event.data.input.attr('value', level);
			event.preventDefault();
		}
		$('.interest-assess').on('click', 'a', {input : $('#interest-assess')}, assess);
		$('.diff-assess').on('click', 'a', {input : $('#diff-assess')}, assess);
	});
	
})(jQuery);
	
});


var count = 1;
jQuery(".load-more").bind("click",function(){
	
	var id = $('#courseid').val();//session('user_id')
	var action = document.assessing.attributes["action"].value;
	var end = action.indexOf("comment");
	action = action.substr(0,end);
	var url = action + "load_more";
	//alert(url);

	jQuery.getJSON(url,{page:count,courseid:id},function(data){
		
		$.each(data,function(i,array){
			//alert(array.id);
		var str = "";
		var str = "<div class='comment-box'><div class='comment-content'><img src='http://localhost/Electives/avatar/"+array.img+"' title='阿猫'/><h3>"+array.kickname+"<span class='comment-time'>"+array.comment_time+"</span></h3><ul class='data-list'><li><span class='item-desc'>考试方式</span>"+array.exam_form+"</li><li><span class='item-desc'>课程评价</span>"+array.content+"</li></ul></div><div class='comment-sidebar'><ul class='data-list'><li><span class='item-desc'>趣味性</span><span class='star-assess star-"+array.interest_grade+"'>星级评价</span></li><li><span class='item-desc'>考试难度</span><span class='star-assess star-"+array.exam_grade+"'>星级评价</span></li></ul></div></div>";
		jQuery(".comments").append(str);
		});	
		
	
	count++;
	});
})