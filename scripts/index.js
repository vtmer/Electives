(function($){
	$(function(){
		/*表单验证
		------------------------*/
		var $form = $('form');
		function checkOut($aForm){
			var passOrNot = true;
			$aForm.find('input').each(function(){
				var $this = $(this);
				if(!$this.val()){
					passOrNot = false;
				}
			});
			return passOrNot;
		}
		//获取焦点时消去错误提示框
		$form.on('focus blur', 'input', function(){
			$('#error-info').fadeOut(function(){
				$(this).remove();
			});
		});
		var $submit = $('#submit');
		$submit.on('click', function(){
			//首先检查表单是否符合要求
			var passOrNot = checkOut($form);
			if(!passOrNot){
				var $errorInfo = $('#error-info');
				if($errorInfo.length&&!$errorInfo.is(':animated')){
					//如果表单不符合要求并且错误信息已经存在
					//则错误信息闪烁两次
					$errorInfo
						.fadeOut(100)
						.fadeIn(100)
						.fadeOut(100)
						.fadeIn(100);
				}else{
					$('<div class="warning-box" id="error-info"><p>错误：账户或密码不能为空！</p></div>')
						.css('display','none')
						.appendTo($form)
						.fadeIn(400);
				}
			}
			return passOrNot;
		});
	});
})(jQuery);