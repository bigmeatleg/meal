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
				window.location.reload();
			},
		}).dialog('open');
	
	});
});