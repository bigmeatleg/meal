$(document).ready(function(e) {
  $('#admin_list thead tr td').addClass('titlefield');
	
	$('li').click(function(e){
		e.preventDefault();
		$('#showadd').attr('style', 'visibility:none');
		var meal_link = $('a', this).attr('href');
		$('#meal_list').attr('src', meal_link);
		
		var nLocation = meal_link.indexOf('=') + 1;
		var nRange = meal_link.length - nLocation;
		var cust_id = meal_link.substr(nLocation, nRange);
		
		$('#meal_add').attr('href', 'detailmeal.php?id=' + cust_id);
	});
	
	$('#menu').menu();
	
	$('a#meal_add')
	.button()
	.click(function(e){
			e.preventDefault();
			var url = $(this).attr('href');
			$('#iframe_detail').attr('src', url).attr('width', '100%').attr('height', '100%');
			$('#dialog_detail')
			.attr('style', 'visibility: none')
			.dialog({
				autoOpen: false,
				modal: true,
				width: 600,
				height: 400,
				buttons:[
				{
					text: "新增資料",
					click:function(){
						$('#iframe_detail').contents().find('#action').attr('value', 'addnew');
						$('#iframe_detail')[0].contentWindow.FormSubmit();
					}
				}],
				title: "新增菜單",
				close: function(){
					var src_link = $('#meal_list').attr('src');
					$('#meal_list').attr('src', src_link);
				}
			}).dialog('open');
	});
	
	$('#iframe_dtail').contents().find('a').click(function(e) {
		e.preventDefault();
    alert('update data');
  });
});

function openUpdateDialog(cust_id, food_id){
	$('#iframe_detail').attr('src', 'detailmeal.php?id=' + cust_id + "&fid=" + food_id);
	
	$('#dialog_detail')
	.attr('style', 'visibility: none')
	.dialog({
		autoOpen: false,
		modal: true,
		width: 600,
		height: 400,
		buttons:[
		{
			text: "修改資料",
			click:function(){
				$('#iframe_detail').contents().find('#action').attr('value', 'update');
				$('#iframe_detail')[0].contentWindow.FormSubmit();
			}
		},{
			text: "刪除資料",
			click:function(){
				$('#iframe_detail').contents().find('#action').attr('value', 'delete');
				$('#iframe_detail')[0].contentWindow.FormSubmit();
			}
		}],
		title: "修改資料",
		close: function(){
			var src_link = $('#meal_list').attr('src');
			$('#meal_list').attr('src', src_link);
		}
		}).dialog('open');
}