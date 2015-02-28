<?php	
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);	
	$result = getEditor_plugin();
// 	print_r($result);
?>
<script>
function setEditorUI(){
	$("#Photo img").load(function() {
    	$(this).wrap(function(){
	      return '<span class="image-wrap ' + $(this).attr('class') + '" style="position:relative; display:inline-block; background:url(' + $(this).attr('src') + ') no-repeat center center; width: 70px; height: 70px;" />';
    	});
    	$(this).css("opacity","0");
	});	
	$('.flexslider').flexslider({
		animation: "slide",
	    animationLoop: false,
// 		        itemWidth: 1482,
		itemHeight: 200,
		slideshow: false,
		controlsContainer: ".flex-container",
		controlNav: false,
// 	    directionNav: false,
        start: function(slider) {
			$('body').removeClass('loading');          
            $('.total-slides').text(slider.count);
       },
		after: function(slider) {
			slider.find('.slideIndex').html(slider.currentSlide + 1);
	   }				
	 });	
}
function goDetail(id){
// 	window.location = 'detail.php?pid='+id;
}
</script>
	
	<div class="infobody">
<!-- 	<div class="infoHead">&nbsp;</div>	 -->
<!-- 	<div class="infoMiddle"> -->
<!-- 
	<table class="info">
	<tr class="infoBG">
		<th class="infoTD"><div id="Photo"><div class="box circle">
		<img src="<?php echo $result['user_img'];?>" class="photo-img">
		</div></div>
		</th>
		<td>
			<center>
			<img src="images/editor_pen.png" width="24"><br>
			<span class="content-gray content-Text2"><?php echo $result['user'];?></span><br>
			<span class="content-gray content-Text2"><?php echo $result['createdate'];?></span>
			</center>
		</td>
	</tr>
	</table>
 -->
<!-- 	<div class="infoFooter">&nbsp;</div> -->
<!-- 	</div> -->
<style>
.editorPlugin{
	width:100%;
}
.editorPlugin th{
	width:40%;
	padding: 10px;
}
.editorPlugin td{
	width:60%;
	padding: 10px;	
}
</style>
	<div class="flexslider">
		<ul class="slides">
		<?php
			for($i=0;$i<count($result);$i++):
		?>		
			<li>
			<table class="editorPlugin">
			<tr>
				<th class="content-top">
				<?php
					if(!empty($result[$i]['image']))
					{
						$img = explode(",",$result[$i]['image']);
						if(count($img)>0):
							for($y=0;$y<count($img);$y++):	
				?>
				  	   	    <img src="upload/<?php echo $img[$y];?>" />
				<?php
							endfor;
						endif;
					}
				?>
				</th>
				<td class="content-top">
					<div class=" content-Text3 content-left content-black toLink" onclick="javascript:goDetail(<?php echo $result[$i]['editor_id'];?>);"><?php echo limit_text(autoLang($result[$i]['description_ch'],$result[$i]['description_en']),550);?></div>	
				</td>
			</tr>
			</table>
			</li>		   				
	<?php
		endfor;
	?>
		</ul>
	</div>
</div>