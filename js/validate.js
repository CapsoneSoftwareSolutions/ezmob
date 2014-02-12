/*Article form validation*/

$("#articlepost").submit(function () {
//alert(123);
var title	=	$("#title").val();
var desc	=	$("#description").val();

if(title=='')
{

	$("#validation_errors").html("Enter the Title");
	$("#title").val('');
	$("#title").focus();
	return false;
}
else if(title.length<5)
{

	$("#validation_errors").html("Enter Minimum 5 Characters");
	$("#title").val('');
	$("#title").focus();
	return false;
}
else if(desc=='')
{

	$("#validation_errors").html("Enter the Description");
	$("#description").val('');
	$("#description").focus();
	return false;
}
else if(desc.length<5)
{

	$("#validation_errors").html("Enter Minimum 5 Characters");
	$("#description").val('');
	$("#description").focus();
	return false;
}
});