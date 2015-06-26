$(document).ready(function() {
	$('#weekmenu').menu({
		items: "> :not(.ui-widget-header)",
	});
	
	var iframeheight = $('iframe').height();
	if(iframeheight < 480){
		$('iframe').height(480);
	}
	
	$('li :not(.ui-widget-header)').click(function(e) {
    e.preventDefault();
		var weeknum = $(this, 'a').attr('href');
		$('iframe').attr('src', 'ordermeal.php?w=' + weeknum);
  });
});