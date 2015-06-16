$(document).ready(function(e) {
  $('#stdform').validationEngine('attach', {
		promptPosition: 'topLeft',
		scroll: false,
		autoHidePrompt: true,
		autoHideDelay: 2000,
		fadeDuration: 0.5
	});
	
	$('#btnRandPWD').click(function(e) {
    e.preventDefault();
		var randPWD = generatePassword();
		$('#user_password').attr('value', randPWD);
  });
});

function generatePassword() {
    var length = 8,
        charset = "abcdefghijklnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
        retVal = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
        retVal += charset.charAt(Math.floor(Math.random() * n));
    }
    return retVal;
}

function FormSubmit(){
	$('#stdform').submit();
}