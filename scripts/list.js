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


var count = 1;
jQuery(".load-more").on("click",function(){
	var sch = $('#school-select').val();
	var kin = $('#class-select').val();
	var gra = $('#assess-select').val();
	//alert(school+kind+grade);
	var action = $('#index').attr("href");
	//alert(action);
	var url = action + "/load_more";
	jQuery.getJSON(url,{page:count,school:sch,kind:kin,grade:gra},function(data){
		
		$.each(data,function(i,array){
			//alert(array.id);
		var str = "";
		var str = "<ul class='clearfix'><li class='num-area'>"+array.id+"</li><li class='id-area' title=''>"+array.code+"</li><li class='classname-area' title=''><a href='http://localhost/Electives/index.php/intro/index/"+array.id+"'>"+array.name+"</a></li><li class='assess-area'><span class='star-assess star-"+array.multiple_grade+"'>星级评分</span></li><li class='assess-area'><span class='star-assess star-"+array.interest_grade+"'>星级评分</span></li><li class='assess-area'><span class='star-assess star-"+array.exam_grade+"'>星级评分</span></li></ul>";
		jQuery(".class-list").append(str);
		});	
		
	
	count++;
	});
})