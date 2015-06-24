$(document).ready(function(e) {
	$('#btnAdd')
	.attr('style', 'width:148px')
	.attr('style', 'height:36px')
	.click(function(e){
		e.preventDefault();
		$('#iframe_detail').attr('src', 'detailman.php');
		$('#dialog_detail').attr('style', 'visibility: none')
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
				$('#dialog_detail').attr('style', 'visibility: hidden')
				window.location.reload();
			},
		}).dialog('open');
	});
	
	$('tbody tr').click(function(e) {
		e.preventDefault();
    var id = $(this).find('td:eq(0)').html();
		$('#iframe_detail').attr('src', 'detailman.php?id=' + id);
		$('#dialog_detail').attr('style', 'visibility: none')
		.dialog({
			autoOpen: false,
			modal: true,
			width: 600,
			height: 400,
			buttons:[{
				text:'修改',
				click:function(){
					$('#iframe_detail').contents().find('#user_id').prop('disabled', false);
					$('#iframe_detail').contents().find('#action').attr('value', 'update');
					$('#iframe_detail')[0].contentWindow.FormSubmit();
				}
			},{
				text:'刪除',
				click:function(){
					$('#iframe_detail').contents().find('#user_id').prop('disabled', false);
					$('#iframe_detail').contents().find('#action').attr('value', 'delete');
					$('#iframe_detail')[0].contentWindow.FormSubmit();
				}
			}],
			title:'修改資料',
			close: function(){
				$('#iframe_detail').attr('src', '');
				$('#dialog_detail').attr('style', 'visibility: hidden')
				window.location.reload();
			},
		}).dialog('open');
  });
});