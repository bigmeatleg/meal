$(document).ready(function(e) {
  $('tr').click(function(e) {
    e.preventDefault();
		var food_id = $(this).find('td:eq(0)').html();
		var cust_id = $('#cust_id').attr('value');
		window.parent.openUpdateDialog(cust_id, food_id);
  });
});