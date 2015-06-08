$(document).ready(function(e) {
  $('#stdform').validationEngine('attach', {
		promptPosition: 'topLeft',
		scroll: false
	});
});

function FormSubmit(){
	$('#stdform').submit();
}