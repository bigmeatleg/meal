$(document).ready(function(e) {
  $('thead tr td').addClass('titlefield');
	
	var aryWidth = [40, 100, 80, 100, 100, 100, 200];  
	$('thead tr td').css('width', function(index, value){
		return aryWidth[index];
	});
	
	$('tbody tr:odd').css('background-color', 'rgba(227,242,247,1.00)');
	
	$('tbody tr').click(function(e) {
		e.preventDefault();
    var id = $(this).find('td:eq(0)').html();
		$('#dialog_detail')
		.dialog({
			autoOpen:false,
			modal: true,
			width: 600,
			height: 400,
			buttons:[
			{
				text: '修改',
				click: function(){
					$('#iframe_detail').contents().find('#action').attr('value', 'update');
					$('#iframe_detail')[0].contentWindow.FormSubmit();
					}
			},
			{
					text: '刪除',
					click: function(){
						var msg = confirm("你確定要刪除資料嗎?");
						if(msg){
							$('#iframe_detail').contents().find('#action').attr('value', 'delete');
							$('#iframe_detail')[0].contentWindow.FormSubmit();
						}
				}
			}],
			close: function(){
				$('#iframe_detail').attr('src', '');
				window.location.reload();
			},
			title: '修改資料'
		}).dialog('open');
		
		$('#iframe_detail').attr('src', 'detailcust.php?id=' + id);
  });
	
	$('#btnAdd').click(function(e){
		e.preventDefault();
		
		$('#iframe_detail').attr('src', 'detailcust.php');
		$('#dialog_detail')
		.dialog({
			autoOpen: false,
			modal: true,
			width: 600,
			height: 400,
			buttons:[{
				text:'新增',
				click:function(){
					$('#iframe_detail').contents().find('#action').attr('value', 'addnew');
					$('#iframe_detail')[0].contentWindow.FormSubmit();
				}
			}],
			title:'新增資料',
			close: function(){
				$('#iframe_detail').attr('src', '');
				window.location.reload();
			},
		}).dialog('open');
	});
});