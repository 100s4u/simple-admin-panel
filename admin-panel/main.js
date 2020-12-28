$(document).ready( function(){
	$('.images-add_button').click(function(event){
		let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=500,height=260,left=500,top=200`;
		open('upload.php', 'test', params);
	});
	$('.plus-img').click(function(event){
		let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=500,height=260,left=500,top=200`;
		open('upload.php', 'test', params);
	});
	$('.home').click(function(event){
		open('/');
	});
	$('.logout').click(function(event){
		if (confirm('Вы уверены?')){
			$.ajax({
				type:'POST',
				data:{method:'logout'},
				url:"query.php",
				success: function(data){
					location.reload();
				}
			});
		}
	});
	$('.block-del').click(function(event){
		if (confirm('Вы уверены что хотите удалить этот блок?')){
			var block = $(this).children('input').val();
			$.ajax({
				type:'POST',
				data:{method:'blockDelite', block:block},
				url:"query.php"
			});
			$(this).closest(".block").hide(500);
		}
	});
	$('.post-del').click(function(event){
		if (confirm('Вы уверены что хотите удалить этот пост?')){
			var block = $(this).children('[name=block]').val();
			var id = $(this).children('[name=id]').val();
			$.ajax({
				type:'POST',
				data:{method:'del', block:block, id:id},
				url:"query.php"
			});
			$(this).closest(".article").hide(500);
		}
	});
	$('[value=9]').last().prepend("<div class=\"image-info\"><h1>+<?=$n-9?></h1></div>");
});