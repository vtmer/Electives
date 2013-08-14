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


