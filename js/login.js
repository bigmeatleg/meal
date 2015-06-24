$(document).ready(function(e) {
	$('#stdform').validationEngine('attach', {
		promptPosition: 'topLeft',
		scroll: false,
		autoHidePrompt: true,
		autoHideDelay: 2000,
		fadeDuration: 0.5
	});
	$('button').attr('style', 'width:200px; height:30px')
	.click(function(e) {
    e.preventDefault();
		$('#stdform').submit();
  });  
});