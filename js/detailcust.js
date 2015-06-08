$(document).ready(function(e) {
  var aryInputWidth = ['180', '180', '100%', '180', '180', '100%'];
	$('input[type=text]').css('width', function(index, value){
		return aryInputWidth[index];
	});
	
	$('#stdform').validationEngine('attach');
		
	$('.titlefield').css('width', '80');
});

function FormSubmit() {
	$('#stdform').submit();
}