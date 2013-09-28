$(document).ready(function(){
	
	//alert("this is one");

	$.ajax({
		type:"GET",
		url:'./admins/select/add_list',
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



});

$('#add').on("click",function(){
	//alert("this is one");
	$.ajax({
		type:"GET",
		url:'./admins/select/add_list',
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

});

$('#cos').on("click",function(){
	//alert("this is one");
	$.ajax({
		type:"GET",
		url:'./admins/select/edit_cos',
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

});

$('#pwd').on("click",function(){
	//alert("this is one");
	$.ajax({
		type:"GET",
		url:'./admins/select/edit_pwd',
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

});

$('#anly').on("click",function(){
	//alert("this is one");
	$.ajax({
		type:"GET",
		url:'./admins/select/analyse',
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

});

