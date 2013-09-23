;(function($){
	$.fn.extend({
		goTop: function(speed){
			if($(this).is(':animated'))return false;
			var targetOffset=$(this).offset().top;
			speed = speed || 400;
			$('html,body').animate({scrollTop:targetOffset},speed);
			return this;
		},
		replaceText:function(text){
			var $this = $(this),
			$nodes = $this.contents(),
			elemText = $.trim($this.text());
			$nodes.each(function(){
				var $this = $(this);
				if($.trim($this.text()) === elemText){
					if(this.nodeType === 3){
						this.nodeValue = text;
					}else{
						$this.replaceText(text);
					}
					return false;
				}
			});
			return this;
		},
		//内容域相对窗口的位置
		offset_content : function(){
			var $this = this;
			var left = $this.offset().left + parseFloat($this.css('border-left-width'));
			var top = $this.offset().top + parseFloat($this.css('border-top-width'));
			return {
				left:left,
				top:top
			};
		},
		draggable: function(opts){
			var $this = $(this);
			var $elem = $this;
			// 默认值：
			// 1、限制容器，默认为最近定位父级元素
			// 2、拖动触发对象，默认为该元素自身
			// 3、水平锁定，即只能垂直移动，默认关闭
			// 4、垂直锁定，即只能水平移动，默认关闭
			var options = $.extend({
				container : $this.offsetParent(),
				dragHandle : $this,
				lockX : false,
				lockY : false
			}, opts);
			var $parent = $this.offsetParent();
			//计算最近定位父元素内容区域相对于window的位置
			var p_left = $parent.offset_content().left;
			var p_top = $parent.offset_content().top;
			//计算容器内容区域相对于window的位置
			var c_left = options.container.offset_content().left;
			var c_top = options.container.offset_content().top;
			//计算 left 和 top 的最大值
			var minLeft = c_left - p_left;
			var minTop = c_top - p_top;
			//计算 left 和 top 的最大值
			var maxLeft = options.container.innerWidth() + minLeft - $this.outerWidth();
			var maxTop = options.container.innerHeight() + minTop - $this.outerHeight();
			//重设css样式
			if($this.css('position') !== 'absolute'){
				$this.css('position', 'absolute');
			}
			$this.css('margin','0');
			// 自定义move事件
			$this.on('move', function(event, targetLeft, targetTop){
				var $this = $(this);
				if(!options.lockX){
					if(targetLeft > maxLeft){
						$this.css('left', maxLeft);
					}else if(targetLeft < minLeft){
						$this.css('left', minLeft);
					}else{
						$this.css('left', targetLeft);
					}
				}
				if(!options.lockY){
					if(targetTop > maxTop){
						$this.css('top', maxTop);
					}else if(targetTop < minTop){
						$this.css('top', minTop);
					}else{
						$this.css('top', targetTop);
					}
				}
			});
			options.dragHandle
				.on('mousedown', function(event){
					$(this).css('cursor', 'move');
					//获取鼠标坐标和元素坐标的差值
					var dLeft = event.pageX - $elem.offset().left;
					var dTop = event.pageY - $elem.offset().top;
					$(document).on('mousemove.drag', {dLeft:dLeft,dTop:dTop}, function(event){
						//计算目标 left 和 top 值
						var targetLeft = event.pageX - p_left - event.data.dLeft;
						var targetTop = event.pageY - p_top - event.data.dTop;
						$elem.triggerHandler('move', [targetLeft, targetTop]);
						//每次拖动都清除文字选择
						$.clearSlct();
					})
					.on('mouseup.drag', function(){
						$(this).off('mousemove.drag mouseup.drag');
					});
					//取消鼠标的选择文本状态
					event.preventDefault();
				})
				.on('mouseup', function(){
					$(this).css('cursor', 'auto');
				});
		},
		// 表单验证
		validate: function(options){
			var $me = $(this),

				// 预设默认参数
				defaults = {
					isEmpty : {
						reg : /^\s*$/,
						expect : true,
						info : 'It should not be empty!',
						on : 'change'
					},
					isEmail : {
						reg : /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/,
						expect : true,
						info : 'It is not a Email address!',
						on : 'change'
					},
					isNum : {
						reg : /^-?(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/,
						expect : true,
						info : 'It is not a number!',
						on : 'change'
					},
					isInt : {
						reg : /^\d+$/,
						expect : true,
						info : 'It is not a integer!',
						on : 'change'
					},
					submit : {
						on : 'click'
					}
				};
			// 合并默认选项defaults和参数options以及用户自定义默认选项setup
			var o = (function (defaults, options) {
				var obj = {},
					prop = '',
					setup = $.fn.validate.setup;
				for (prop in options) {
					obj[prop] = {
						expect : true,
						on : 'on'
					};
					$.extend(obj[prop], defaults[prop], $.fn.validate.setup, options[prop]);
				}
				return obj;
			})(defaults, options);

			// 处理函数
			// 1.初始化元素的_validation_数据
			// 2.绑定检测事件
			function initValidation(elem, rules){

				// 创建对象存储筛选后的规则
				var elemRules = $.extend({}, rules);
				delete elemRules.target;
				delete elemRules.on;

				$(elem).each(function(){
					var $this = $(this),
						validation = $this.data('_validation_');

					// 如果该元素存在_validation_数据，则忽略初始化该元素
					if(validation){
						return;
					}

					// 初始化元素的_validation_数据
					$this.data('_validation_', elemRules);
					validation = $this.data('_validation_');

					// 设定id
					validation.id = new Date().getTime();

					// 绑定自定义的事件
					// 不同type类型，绑定不同的事件处理
					if ($this.prop('type') !== 'submit') {

						$this.on(rules.on + '.validate', function(){
							var $this = $(this),
								validation = $this.data('_validation_'),
								formValidation = $me.data('_validation_'),
								index = formValidation.idBox.indexOf(validation.id),
								match = ( (new RegExp(validation.reg)).test($this.val()) === validation.expect );

							// 检查正则表达式的结果是否与期望的值相匹配
							if ( match ) {

								// 在表单的_validation_数据中注销掉该元素的id及其提示文本
								if (index !== -1) {
									formValidation.idBox.splice(index, 1);
									formValidation.infoBox.splice(index, 1);
								}

							} else {
								
								// 在表单的_validation_数据中记录下该元素的id及其提示文本
								if (index === -1) {
									formValidation.idBox.push(validation.id);
									formValidation.infoBox.push(validation.info);
								}

							}

							// 如果存在某些元素不匹配
							if (formValidation.idBox.length){
								formValidation.passed = false;
							} else {
								formValidation.passed = true;
							}

							// callback 回调函数
							// always function
							if ( typeof validation.always === 'function' ) {
								validation.always.call(this, match, formValidation.passed, validation.info);
							}
							if ( match ) {
								// succeed function
								if(typeof validation.succeed === 'function'){
									return validation.succeed.call(this, formValidation.passed);
								}
							}else {
								// fail function
								if (typeof validation.fail === 'function'){
									return validation.fail.call(this, validation.info);
								}
							}
						});

						// 初始化后马上检测
						$this.triggerHandler(rules.on + '.validate');
					} else {
						$this.on(rules.on + '.validate', function(){
							var $this = $(this),
								validation = $this.data('_validation_'),
								formValidation = $me.data('_validation_');

							// callback回调函数	
							// always function
							if(typeof validation.always === 'function'){
								validation.always.call(this, formValidation.passed, formValidation.infoBox);
							}
							// 检查表单是否能通过
							if (formValidation.passed) {
								// succeed function
								if(typeof validation.succeed === 'function'){
									return result = validation.succeed.call(this);
								}
							} else {
								// fail function
								if(typeof validation.fail === 'function'){
									return result = validation.fail.call(this, formValidation.infoBox);
								}
							}
						});
					}
				});

			}


			(function ($me, o) {
				// 初始化表单的_validation_数据
				$me.data('_validation_', {
					passed : true,
					elemBox : [],
					idBox : [],
					infoBox : []
				});

				var prop ='',
					rules,
					target,
					i,
					len;

				// 遍历选项 o 中的每组规则，初始化每组中的元素
				for (prop in o){
					rules = o[prop];
					target = rules.target;

					// 如果是以数组的形式存储
					if (target instanceof Array){
						for (i = 0, len = target.length; i < len; i++){
							initValidation(target[i], rules);
						}
					} else {
						initValidation(target, rules);
					}
				}
			})($me, o);

			// 保持链式操作
			return $me;
		}
	});
	$.extend({
		//清除文字选取
		clearSlct: "getSelection" in window ? function(){
            window.getSelection().removeAllRanges();
        } : function(){
            document.selection.empty();
        },
		createPlaceholder: function(elem){
			//判断浏览器是否支持placeholder属性
			if(!('placeholder' in document.createElement('input'))){
				var $elem = $(elem);
				if($elem.parent().css('position') === 'static'){
					$elem.parent().css('position', 'relative');
				}
				$elem.each(function(){
					$this = $(this);
					var $placeholder = $('<label>'+$this.attr('placeholder')+'</label>');
					$placeholder
						.css({
							'height':$this.innerHeight()+'px',
							'line-height':$this.innerHeight()+'px',
							'position': 'absolute',
							'left' : $this.position().left,
							'top' : $this.position().top,
							'z-index': '1000',
							'color': '#b8bcc2',
							'cursor':'text'
						})
						.css($elem.css([
							'margin-top','margin-left',
							'padding-top','padding-left',
							 'font-size'
						]))
						.attr('for', $this.attr('id'));
					$placeholder.insertBefore($this);
					this.$placeholder = $placeholder;
					$this.on('keydown keyup', function(){
						var $this = $(this);
						var $placeholder = this.$placeholder;
						if(!$this.val()){
							$placeholder.css('visibility','visible');
						}else{
							$placeholder.css('visibility','hidden');
						}
					});
					$this.triggerHandler('keyup');
				});
			}else{
				return false;
			}
		},
		bindDropDownList: function(elem, DDList, className, callback){
			var $elem = $(elem);
			var $DDList = $(DDList);
			//处理个数不定的参数
			if(arguments.length === 3 && typeof(arguments[2]) === 'function'){
				var callback = arguments[2];
				var className = 'drop-down-list-'+new Date().getTime();
			}else{
				var className = arguments[2]||'drop-down-list-'+new Date().getTime();
			}
			$elem.on('click', function(){
				//如果对象仍在动画过程中，点击无效
				if($DDList.is(':animated'))return false;
				var $this = $(this);
				if(!this.targetList){
					this.targetList = $DDList.eq($elem.index($this))[0];
				}
				var $targetList = $(this.targetList);
				if(!$this.hasClass(className)){
					//获取正被激活的按钮
					var $enabledElem = $('.'+className);
					if($enabledElem.length){
						// $enabledElem.removeClass(className);
						// $($enabledElem[0].targetList).fadeToggle(100);
						$enabledElem.triggerHandler('click');
					}
					// $targetList.fadeToggle(100);
					$this.addClass(className);
				}else{
					// $targetList.fadeToggle(100);
					$this.removeClass(className);
				}
				$targetList.fadeToggle(100, callback);
				// callback();
				return false;
			});
			$(document).on('click', function(){
				var $target = $('.'+className);
				if($target.length){
					$target.triggerHandler('click');
				}
			});
			$DDList.on('click', function(event){
				//冒泡截止
				event.stopPropagation();
			});
			$DDList.on('click','a', function(event){
				$('.'+className).triggerHandler('click');
			});
		},
		createGoTop: function(elem){
			var $elem = $(elem),
				$parent = $(elem).parent(),
				parentHeight = $parent.innerHeight();
			//父级元素相对当前页面的顶部的距离
			var parentTop = $parent.offset().top;
			//置顶元素top值的上限值
			var maxTop = parentHeight-$elem.outerWidth();
			//置顶元素相对窗口顶部的距离
			var topToWindow;
			//获取topToWindow的值
			$(window).on('resize', function(){
				var $this = $(this);
				topToWindow = $(this).height()*0.85;
				$(window).triggerHandler('scroll');
			});
			$(window).triggerHandler('resize');
			if($parent.css('position') === 'static'){
				$parent.css('position', 'relative');
			}
			$elem.css({
				'display':'block',
				'position':'absolute',
				'left': $parent.innerWidth()+'px',
				'top':topToWindow + 'px',
				'margin': '0'
			});
			$elem.on('click', function(event){
				$('body').goTop();
				event.preventDefault();
			});
			$(window).on('scroll' ,function(){
				var dTop = $(document).scrollTop() - parentTop;
				var targetTop = dTop + topToWindow;
				//由于两类动画同步进行，需要分开两个队列来完成
				//滑动效果用新建的slide队列
				if(targetTop < maxTop){
					$elem
						.clearQueue('slide')
						.animate({'top': targetTop + 'px'},{duration:800,queue:'slide'})
						.dequeue('slide');
				}else{
					$elem
						.clearQueue('slide')
						.animate({'top': maxTop + 'px'},{duration:800,queue:'slide'})
						.dequeue('slide');
				}
				//显隐效果用默认队列
				if($(document).scrollTop() > parentTop){
					$elem.stop('fx',true,true).fadeIn();
				}else{
					$elem.stop('fx',true,true).fadeOut();
				}
			});
			$(window).triggerHandler('scroll');
		},
		exchangeText: function(a, b){
			var $a = $(a);
			var $b = $(b);
			var textA = $.trim($a.text());
			var textB = $.trim($b.text());
			$a.replaceText(textB);
			$b.replaceText(textA);
		},
		createWindow: function(elem){
			var $elem = $(elem);
			var $overlay = $('.window-overlay');
			// $elem.draggable({dragHandle : $('.window-close-button')});
			$elem.draggable({dragHandle : $('.window-handle')});
			// $elem.draggable();
			if($overlay.length){
				$elem.appendTo($overlay);
			}else{
				$elem.wrap('<div class="window-overlay"></div>')
				$overlay = $('.window-overlay');
				$overlay.appendTo('body');
				if($overlay.css('position') !== 'absolute'){
					$overlay.css({
						'display':'none',
						'width':'100%',
						'height':'100%',
						'position': 'absolute',
						'left':'0',
						'top':'0',
						'z-index':'1000',
						'background-color':'rgba(0,0,0,.6)'
					});
				}
			}
			$overlay.css('display', 'none');
			$elem
				.on('locate', function(){
					var $this = $(this);
					var height = $this.outerHeight();
					var width = $this.outerWidth();
					var wHeight = $(window).height();
					var wWidth = $(window).width();
					if(height >= wHeight){
						$this.css('top', '40px');
					}else{
						$this.css('top', (wHeight - height)/2 + 'px');
					}
					$this.css('left', (wWidth - width)/2 + 'px');
				})
				.on('close', function(){
					// $(this).fadeOut();
					$overlay.fadeOut();
				})
				.on('open', function(){
					// $(this).fadeIn();
					$overlay.fadeIn();
					$(this).triggerHandler('locate');
				})
				.on('click', function(event){
					event.stopPropagation();
				})
				.triggerHandler('locate');
			$(window).on('resize', function(){
				$elem.triggerHandler('locate');
			});
			$overlay.on('click', function(){
				$elem.triggerHandler('close');
				return false;
			});
			var $closeButton = $elem.find('.window-close-button');
			if($closeButton.length){
				$closeButton.on('click', function(){
					$elem.triggerHandler('close');
					return false;
				});
			}
		}
	});

	$(function(){
		/*模拟placeholder
		-------------------------------------*/
		var $inputHasPHolder = $('input').filter('[placeholder]')
		if($inputHasPHolder.length){
			$.createPlaceholder($inputHasPHolder);
		}
		/*绑定用户下拉列表
		-------------------------------------*/
		var $portrait = $('#portrait');
		var $portraitList = $('.header .drop-list');
		$portraitList.css('display','none');
		$.bindDropDownList($portrait, $portraitList, 'dropDownButton-1' ,function(){
			$portrait.find('.list-state').toggleClass('list-on-state');
		});
		/*生成置顶按钮
		---------------------------------------*/
		var $goTopButton = $('#go-top');
		if($goTopButton.length)$.createGoTop($goTopButton);
	});
})(jQuery);