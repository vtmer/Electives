(function($){
	$(function(){
		/*表单验证
		------------------------*/
		var $form = $('.form-signin');
		$form
		.validate({
			isUser : {
				reg : /^\w+$/,
				target : $('#account'),
				expect : true,
				info : '您输入您的用户名!',
				on : 'change'
			},/*
			isEmpty : {
				target : $('#account'),
				expect : true,
				info : '请输入您的用户名!',
				on : 'change'
			},*/
			isEmpty : {
				target : $('#password'),
				expect : false,
				info : '请输入您的密码!'
			},
			submit : {
				target : $('#submit'),
				fail : function(infoBox){
					var $errorInfo = $('#error-info');
					if($errorInfo.is(':animated')){
						return false;
					}

					if($errorInfo.length){
						//如果表单不符合要求并且错误信息已经存在
						//则错误信息闪烁两次
						$errorInfo
							.fadeOut(100)
							.fadeIn(100)
							.fadeOut(100)
							.fadeIn(100);
					}else{
						$('<div class="alert alert-danger" id="error-info"><p>' + infoBox[0] + '</p></div>')
							.css('display','none')
							.appendTo($form)
							.fadeIn(400);
					}

					return false;
				}
			}
		})
		// 获取焦点时消去错误提示框
		.on('focus blur', 'input', function(){
			$('#error-info').fadeOut(function(){
				$(this).remove();
			});
		});
		// 消掉错误提示框
		$('#error-info').remove();
	});
})(jQuery);