$(document).ready(function(){
	var switch1 = $("#emailNotif").find("input.switch");
	$("#emailNotif").find("a.title").on("click", function () {
		   if(switch1.prop("checked")==true)
		     switch1.prop("checked", false); 
		   else
		     switch1.prop("checked", true)
	})

	var switch2 = $("#pushNotif").find("input.switch");
	$("#pushNotif").find("a.title").on("click", function () {
		   if(switch2.prop("checked")==true)
		     switch2.prop("checked", false); 
		   else
		     switch2.prop("checked", true)
	})

	var switch3 = $("#hideProfile").find("input.switch");
	$("#hideProfile").find("a.title").on("click", function () {
		   if(switch3.prop("checked")==true)
		     switch3.prop("checked", false); 
		   else
		     switch3.prop("checked", true)
	})
});