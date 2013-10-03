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

});

$('#cos').on("click",function(method){
	//alert("this is one");
	method='edit_cos';
	ajax_load(method);
});

$('#pwd').on("click",function(method){
	//alert("this is one");
	method='edit_pwd';
	ajax_load(method);
});

$('#anly').on("click",function(method){
	//alert("this is one");
	method='analyse';
	ajax_load(method);

});

//update adminstrator's password
