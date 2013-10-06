$(document).ready(function(method){
	
	method='add_list';
	ajax_load(method);
});

function ajax_load(method){

	$.ajax({
		type:"GET",
		url:'./admins/select/'+method,
		//data:"id=one",
		dataType:"html",
		//data:'',
		//cache:false,
		beforeSend:function(){
			$('#account').remove();
			$('#addlist').remove();
			$('#editcos').remove();
			$('#analyse').remove();
		},
		success:function(html){
			$('#wrap').append(html);
			//alert(msg);
		}
	});
}

$('#add').on("click",function(method){
	//alert("this is one");
	method='add_list';
	ajax_load(method);
	$('ul > li').removeAttr('class');
	$('#manage').attr('class','active');

});

$('#cos').on("click",function(method){
	//alert("this is one");
	method='edit_cos';
	ajax_load(method);
	$('ul > li').removeAttr('class');
	$('#manage').attr('class','active');
});

$('#pwd').on("click",function(method){
	//alert("this is one");
	method='edit_pwd';
	ajax_load(method);
	$('ul > li').removeAttr('class');
	$('#manage').attr('class','active');
});

$('#anly').on("click",function(method){
	//alert("this is one");
	method='analyse';
	ajax_load(method);
	$('ul > li').removeAttr('class');
	$('#manage').attr('class','active');

});

$('#index').on("click",function(method){
	$('ul > li').removeAttr('class');
	$('#index').attr('class','active');
});

$('#about').on("click",function(method){
	$('ul > li').removeAttr('class');
	$('#about').attr('class','active');
});

$('#contact').on("click",function(method){
	$('ul > li').removeAttr('class');
	$('#contact').attr('class','active');
});


//update adminstrator's password
