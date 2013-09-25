$(document).ready(function(){

	var tips = $("#messenger").html();
	//alert(message);
	if(tips !== undefined)
	{
		Messenger.options = {
		extraClasses: 'messenger-fixed messenger-on-top',
		theme: 'air'
		};

	//Messenger().post "Your request has succeded!";
	//$.globalMessenger().post("Your request has succeded!");
		$.globalMessenger().post({
    		message: tips,
    		hideAfter: 3,
    		hideOnNavigate: true
		});
	}
})
