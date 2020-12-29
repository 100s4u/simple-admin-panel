<?php
	$dir="../images/";
	$n = count(preg_grep("/^.{1,}\..{1,}/", array_diff(scandir($dir), [".", ".."])));
	$images = array_reverse(preg_grep("/^.{1,}\..{1,}/", array_diff(scandir($dir), [".", ".."])));
	natcasesort($images);
	$images = array_reverse($images);
	if($n == 0){
		foreach ($images as $i) {
			echo "<div class=\"image-view\">
					<div class=\"image-view_container\">
					<img class=\"image-view_img\" src=\"".$dir.$i."\">
				</div>
			</div>";
		}
	}
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