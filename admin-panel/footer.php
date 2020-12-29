	<footer>
		Icons made by <a href="https://www.flaticon.com/authors/gregor-cresnar" title="Gregor Cresnar">Gregor Cresnar</a> and <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
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
			$('.block-add_button').click(function(event){
					var nameBlock = $('.block-add').children('input').val();
					var pattern =  new RegExp('\[a-z, A-Z, \_, \-]{3,20}');
					if (pattern.test(nameBlock)){
						$.ajax({
							type:'POST',
							data:{method:'blockAdd', nameBlock:nameBlock},
							url:"query.php",
							success: function(data){
								location.reload();
							}
						});
					}
					else {
						alert('Название не валидно');
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
			$('.num').last().prepend("<div class=\"image-info\"><h1>+<?=$n-9?></h1></div>");
		});
	</script>
</body>
</html>