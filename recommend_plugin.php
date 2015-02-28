<?php
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	
	$mover = array("128","293","121","78","61");
	$mout  = array("Babington Education Centre","Junior Master Playschool","Cockoo Arts","Autism Partnership School","Master Playschool");
?>
<script>
	function setRecommendUI(){
		<?php
			for($i=0;$i<5;$i++):
		?>	
// 			$( "#recommend<?php echo $i;?>" ).mouseover(function() {
// 				$( "#recommend<?php echo $i;?>" ).addClass( "education_recommend_BGselected" );
// 				$( "#rbody<?php echo $i;?>" ).html('<table class="recommendation"><tr><th><img src="../images/heart_icon03.png" class="full-width-img"></th><td class="content-Text1"><span class="content-Text2"><?php echo $mover[$i];?></span> Users Link This</td><td class="content-right content-Text1">></td></tr></table>');
// 			});
// 			$( "#recommend<?php echo $i;?>" ).mouseout(function() {
// 				$( "#recommend<?php echo $i;?>" ).removeClass( "education_recommend_BGselected" );
// 				$( "#rbody<?php echo $i;?>" ).html('<table class="recommendation"><tr><th><img src="../images/education_icon02.png" class="full-width-img"></th><td class="content-Text1"><?php echo $mout[$i];?></td><td class="content-right content-Text2">></td></tr></table>');
// 			});	
			
			$( "#recommend<?php echo $i;?>" ).hover(
				function() {
					$( "#recommend<?php echo $i;?>" ).addClass( "education_recommend_BGselected" );
					$( "#rbody<?php echo $i;?>" ).html('<table class="recommendation"><tr><th><img src="../images/heart_icon03.png" class="full-width-img"></th><td class="content-Text1"><span class="content-Text2"><?php echo $mover[$i];?></span> Users Link This</td><td class="content-right content-Text1">></td></tr></table>');
				}, 
				function() {
					$( "#recommend<?php echo $i;?>" ).removeClass( "education_recommend_BGselected" );
					$( "#rbody<?php echo $i;?>" ).html('<table class="recommendation"><tr><th><img src="../images/education_icon02.png" class="full-width-img"></th><td class="content-Text1"><?php echo $mout[$i];?></td><td class="content-right content-Text2">></td></tr></table>');
				}
			);			
			
			
					
		<?php
			endfor;
		?>
	}
</script>

<?php 
	
	for($i=0;$i<5;$i++):
?>
<div class="education_recommend_BG" id="recommend<?php echo $i;?>">
	<div id="rbody<?php echo $i;?>"><table class="recommendation"><tr><th><img src="../images/education_icon02.png" class="full-width-img"></th><td class="content-Text1"><?php echo $mout[$i];?></td><td class="content-right content-Text1">></td></tr></table></div>
</div>
<p></p>
<?php
	endfor;
?>