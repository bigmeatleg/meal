$(document).ready(function(e) {
  $('a').button().click(function(e){
		e.preventDefault();
		var param = $(this).attr('href');
		$('#weekmeal').attr('src', 'weekmeallist.php?' + param);
	});
});