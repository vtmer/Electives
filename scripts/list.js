(function($){
	$(function(){
		/*绑定多选下拉框
		----------------------------------------------------*/
		/*$("a[value$='人文社会科学类']").show();*/
		var $selectButton = $('.select-box').find('.select-button');
		var $selectList = $('.select-box').find('.drop-list');
		$selectList.css('display','none');
		$selectButton.each(function(i, elem){
			$.bindDropDownList(this, $selectList.eq(i), 'dropDownButton-2', function(){
				$(elem).find('.list-state').toggleClass('list-on-state');
			});
		});
		$selectList.on('click', 'a', function(event){
			var $this = $(this);
			var parentList = event.delegateTarget,
				$parentList = $(parentList);
			if(!parentList.targetButton||!parentList.targetInput){
				parentList.targetButton = $parentList.siblings('.select-button')[0];
				parentList.targetInput = $parentList.siblings('input')[0];
			}
			var $targetInput = $(parentList.targetInput);
			var $targetButton = $(parentList.targetButton);
			if(!$this.hasClass('on-select')){
				// 颜色标记
				$parentList
					.find('.on-select')
					.removeClass('on-select');
				$this.addClass('on-select');
				// 改变value值
				$targetInput.attr('value', $this.attr('val'));
				$targetButton.replaceText($.trim($this.text()));
			}
			event.preventDefault();

		});
	});
})(jQuery);