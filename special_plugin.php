<?php
// 	ini_set('display_errors',1);
// 	ini_set('display_startup_errors',1);
// 	error_reporting(-1);	
	$result = objectToArray(getSpecial_plugin());
?>

<div id="Special">	
<?php
	if(!empty($result['image'])):
		$img = explode(",",$result['image']);
?>
	<img src="upload/<?php echo $img[0];?>" class="full-width-img"><br>
<?php
	endif;
?>
<div class=" content-Text3 content-left content-black">
<span class="content-left content-black content-bold content-Text4"><?php echo autoLang($result['title_ch'],$result['title_en']);?></span><br>
<?php echo str_replace("</strong>","",str_replace("<strong>","",limit_text(autoLang($result['description_ch'],$result['description_en']),450)));?></div>
</div>