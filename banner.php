<?php
	include_once('include/common.php');
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);	
	$result = objectToArray(getBanner_plugin());
?>
<script>
function setBannerUI(){
// 	$('.banner').blueberry();
}
</script>
<div class="banner">
<img src="<?php echo $result['banner_url'];?>" class="banner-fix-height" />
</div>

<div class="search"><?php include_once('search.php');?></div>