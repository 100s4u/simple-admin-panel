<?php
	require_once "./check.php";
	require_once "./header.php";
	$connect = mysqli_connect($SERVER, $USER, $PASSWORD, $DB);
?>
	<main>
		<div class="row">
		<div>
			<?php
			//Taking data from DB
			$sql_table = "SHOW TABLES FROM ".$DB."";
			$result_table = mysqli_query($connect, $sql_table);
			if (!$result_table) {
				echo "Database error, failed to get a list of tables\n";
				echo 'MySQL error: ' . mysqli_error();
				exit;
			}
			//Output of all blocks
			while ($rowDB = mysqli_fetch_row($result_table)){
				echo"<div class=\"block\">
					<div class=\"block-name\">
						<h1>Block: ".$rowDB[0]."</h1>
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
				//Output of all posts with interaction elements
				$sql = "SELECT * FROM ".$rowDB[0]."";
				$result = mysqli_query($connect, $sql) or die("Error " . mysqli_error($connect)); 
				while($row = mysqli_fetch_array($result)){
					$id=$row['id'];
					$title=$row['title'];
					$content=$row['content'];
					echo"<div class=\"article\">
							<div class=\"article-content\">
								<h2>".strip_tags(mb_strimwidth($title, 0, 250, "..."))."</h2>
								<p>".strip_tags(mb_strimwidth($content, 0, 250, "..."))."</p>
									<form class=\"post-edit\" action=\"post-edit.php\" method=\"POST\">
										<input hidden name=\"block\" value=\"{$rowDB[0]}\">
										<input hidden name=\"id\" value=\"{$id}\">
										<button name=\"method\" value=\"edit\"><h2>Edit</h2></button>
									</form>
							</div>
								<div class=\"post-del\">
									<input hidden name=\"block\" value=\"{$rowDB[0]}\">
									<input hidden name=\"id\" value=\"{$id}\">
									<button name=\"method\" value=\"del\"></button>
								</div>
							</div>";
						}
						echo "
						</div>";
					}
				?>
				<div class="block-add">
					<h1>Add block</h1>
					<input name="nameBlock" placeholder="Block name" type="text">
					<button class="block-add_button" name="method" value="blockAdd"></button>
				</div>
			</div>
			<div class="image-add">
				<h2>Images in the root folder</h2>
				<div class="images">
					<?php
						//A block with the ability to add and view multiple images
						require_once "pictures-view.php";
					?>
				</div>
				<a class="images-add_button"><b>Add</b></a><br>
			</div>
		</div>
	</main>
<?php
	require_once "footer.php";
?>