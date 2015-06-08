$(document).ready(function(e) {
  $('#btnAdminFood').click(function(e) {
    e.preventDefault();
		window.location.replace('adminfood.php');
  });
	
	$('#btnAdminCust').click(function(e) {
		e.preventDefault();
		window.location.replace('admincust.php');
	});
	
	$('#btnAdminMan').click(function(e) {
    e.preventDefault();
		window.location.replace('adminman.php');
  });
});