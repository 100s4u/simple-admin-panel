<?php
	require_once "check.php";
	//Output all files that match the image type
	$dir="../images/";
	$n = count(preg_grep("/^.{1,}\..{1,}/", array_diff(scandir($dir), [".", ".."])));
	$images = array_reverse(preg_grep("/^.{1,}\..{1,}/", array_diff(scandir($dir), [".", ".."])));
	natcasesort($images);
	$images = array_reverse($images);

	//Condition for missing images
	if($n == 0){
		foreach ($images as $i) {
			echo "<div class=\"image-view\">
					<div class=\"image-view_container\">
					<img class=\"image-view_img\" src=\"".$dir.$i."\">
				</div>
			</div>";
		}
	}

	//Condition for 8 or fewer images
	else if ($n>=9){
		$num = 0;
		if($n>9){
			foreach ($images as $i) {
				$num += 1;
				echo "<div class=\"image-view num\">
						<div class=\"image-view_container\">
							<img class=\"image-view_img\" src=\"".$dir.$i."\">
						</div>
					</div>";
				if($num>=9){
					break;
				}
			}
		}

		//If there are all 9 images, the second add button disappears
		else if ($n == 9){
			foreach ($images as $i) {
				$num += 1;
				echo "<div class=\"image-view\">
						<div class=\"image-view_container\">
							<img class=\"image-view_img\" src=\"".$dir.$i."\">
						</div>
					</div>";
				if($num>=9){
					break;
				}
			}
		}
	}

	//If there are more than 9 images, then the number of images in addition to those already displayed is shown instead of the 9-th image
	else{
		foreach ($images as $i) {
			echo "<div class=\"image-view\">
					<div class=\"image-view_container\">
						<img class=\"image-view_img\" src=\"".$dir.$i."\">
					</div>
				</div>";
		}
		echo "<div id=\"window\" class=\"plus-img\">
				<div class=\"plus-img_container\">
					<img class=\"plus\" src=\"126466-multimedia-collection/svg/plus.svg\">
				</div>
			</div>";
	}