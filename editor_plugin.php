<?php	
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);	
	$lang = getLang();
	$result = getEditor_plugin();
 	
?>

<div class="list_editor">
	<?php
		foreach($result as $key => $item):
	
			$title = $item['title_'.$lang];
			$description = $item['description_'.$lang];
			$description_arr = explode("</p>",$description);
			$summary = $description_arr[0]."</p>" . $description_arr[1]."</p>";
			$date = date("F j, Y",strtotime($item['createdate']));
			$num_views = $item['view_numbers'];
			$img = explode(",",$item['image']);
			$user = $item['user'];
			$editor_id = $item['editor_id'];
	?>
	<div class="item">
		<div class="col_left">
			<div class="img_border">
				<img src="upload/<?php echo $img[0];?>" />
			</div>
		</div>
		<div class="col_right">
			<h2 class="title"><?php echo $title ?></h2>
			<span class="date"><i class="fa fa-calendar"></i> <?php echo $date?></span>
			<div class="meta_info">
				<div class="fb-share-button" data-href="/editor_detail.php?id=<?php echo $editor_id;?>" data-layout="button_count"></div>
				<span>/</span>
				<span class="num_views"><?php echo $num_views?> <i class="fa fa-eye"></i></span>
			</div>
			<div class="summary">
				<?php echo $summary;?>
			</div>
		</div>
	</div>
	<?php 
		endforeach;
	?>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=121393444718847&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
