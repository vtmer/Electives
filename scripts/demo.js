$(document).ready(function(){

	var message = $("#freeow-message").html();
	
	$("#freeow").freeow("tips", message , {
	classes: ["gray", "error"],
	autoHide: true
});
})
