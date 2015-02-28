<?php
	include_once('../include/common.php');
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);	
	$db = new DB();
	$db->table = TABLE_SPECIAL;
	$where = " special_id=".$_REQUEST['id']." ";
	$order = " createdate DESC ";
	$result = objectToArray($db->fetchRow($where));
?>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Karla%7CMontserrat">
<div class="specialbody content-left content-black content-Text4">
	<span class="content-bold"><?php echo autoLang($result['title_ch'],$result['title_en']);?></span>
	<br><br>
	<span class="content-Text3"><?php echo str_replace("</strong>","",str_replace("<strong>","",autoLang($result['description_ch'],$result['description_en'])));?></span>
	<br>
	<?php
		if(!empty($result['image'])){
			$img = explode(",",$result['image']);
	?>
			<div class="image-row">
				<div class="image-set">	
	<?php	
				for($y=0;$y<count($img);$y++):
	?>
				<a class="example-image-link" href="upload/<?php echo $img[$y];?>" data-lightbox="example-set1" data-title=""><img  class="example-image" src="upload/<?php echo $img[$y];?>" class="quarter-width-img"></a>
	<?php
				endfor;
		}
	?>	
	<div class="content-Text2 content-gray content-right">
	<?php 
		echo date("F j, Y, g:i a",strtotime($result['createdate']));
	?>
	</div>
</div>
