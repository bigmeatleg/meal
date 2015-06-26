$(document).ready(function(e) {
  $('li').click(function(e){
		e.preventDefault();
		var param = $('a', this).attr('href');
		$('#weekmeal').attr('src', 'weekmeallist.php?' + param);
	});
	
	$('a').attr('style','text-decoration:none');
	$('#menu').menu({
	});
	
	$('li').attr('style', 'padding: 8px;');
	
});