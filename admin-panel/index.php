<?php
	require_once "check.php";
	require_once "header.php";
	$connect = mysqli_connect($SERVER, $USER, $PASSWORD, $DB);
?>

		<div class="row">
		<div>
			<?php
			$sql_table = "SHOW TABLES FROM ".$DB."";
			$result_table = mysqli_query($connect, $sql_table);
			if (!$result_table) {
				echo "Ошибка базы, не удалось получить список таблиц\n";
				echo 'Ошибка MySQL: ' . mysqli_error();
				exit;
			}
			while ($rowDB = mysqli_fetch_row($result_table)){
				echo"<div class=\"block\">
					<div class=\"block-name\">
						<h1>Блок: ".$rowDB[0]."</h1>
						<div class=\"block-buttons\">
							<form class=\"post-add\" action=\"post-edit.php\" method=\"POST\">
								<input hidden name=\"block\" value=\"$rowDB[0]\">
								<button name=\"method\" value=\"add\"></button><br>
							</form>
							<div class=\"block-del\">
								<input hidden name=\"block\" value=\"$rowDB[0]\">
								<button name=\"method\" value=\"blockDelite\"></button><br>
							</div>
						</div>
					</div>";
				$sql = "SELECT * FROM ".$rowDB[0]."";
				$result = mysqli_query($connect, $sql) or die("Ошибка " . mysqli_error($connect)); 
				while($row = mysqli_fetch_array($result)){
					$id=$row['id'];
					$title=$row['title'];
					$content=$row['content'];
					echo"<div class=\"article\">
							<div class=\"article-content\">
								<h2>$title</h2>
								<p>".strip_tags(mb_strimwidth($content, 0, 250, "..."))."</p>
									<form class=\"post-edit\" action=\"post-edit.php\" method=\"POST\">
										<input hidden name=\"block\" value=\"$rowDB[0]\">
										<input hidden name=\"id\" value=\"$id\">
										<button name=\"method\" value=\"edit\"><h2>Редактировать</h2></button>
									</form>
							</div>
								<div class=\"post-del\">
									<input hidden name=\"block\" value=\"$rowDB[0]\">
									<input hidden name=\"id\" value=\"$id\">
									<button name=\"method\" value=\"del\"></button>
								</div>
							</div>";
						}
						echo "
						</div>";
					}
				?>
				<form class="block-add" action="query.php" method="POST">
					<h1>Добавить блок</h1>
					<input name="nameBlock" placeholder="Название блока" type="text">
					<button class="block-add_button" name="method" value="blockAdd"></button>
				</form>
			</div>
			<div class="image-add">
				<h2>Изображения</h2>
				<div class="images">
					<?php
						require_once "pictures-view.php";
					?>
				</div>
				<a class="images-add_button"><b>Добавить</b></a><br>
			</div>
		</div>
<?php
	require_once "footer.php";
?>