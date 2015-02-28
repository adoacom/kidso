<?php	
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);	
	$result = objectToArray(getEditor_plugin());
?>
<script>
function setEditorUI(){
	$("#Photo img").load(function() {
    	$(this).wrap(function(){
	      return '<span class="image-wrap ' + $(this).attr('class') + '" style="position:relative; display:inline-block; background:url(' + $(this).attr('src') + ') no-repeat center center; width: 70px; height: 70px;" />';
    	});
    	$(this).css("opacity","0");
	});
}
</script>
	<div id="Photo">
	<center>
	<div class="infoHead">&nbsp;</div>	
	<table class="info">
	<tr class="infoBG">
		<th class="infoTD"><div class="box circle">
		<img src="<?php echo $result['user_img'];?>" class="photo-img">
		</div>
		</th>
		<td>
			<center>
			<img src="images/editor_pen.png" width="24"><br>
			<span class="content-gray largeText"><?php echo $result['user'];?></span><br>
			<span class="content-gray smallText"><?php echo $result['createdate'];?></span>
			</center>
		</td>
	</tr>
	</table>
	<div class="infoFooter">&nbsp;</div>
	</center>
	<br>
	<p class="middleText content-left content-black"><?php echo limit_text(autoLang($result['comment'],$result['comment']),100);?></p>
</div>