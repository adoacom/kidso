<?php
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	
	$mover = array("128","293","121","78","61");
	$mout  = array("Babington Education Centre","Junior Master Playschool","Cockoo Arts","Autism Partnership School","Master Playschool");
	
	$cate = $_REQUEST['cate'];
?>
<script>
	function setRecommendUI(){
		<?php
			for($i=0;$i<5;$i++):
		?>	
			$( "#recommend<?php echo $i;?>" ).hover(
				function() {
					$( "#recommend<?php echo $i;?>" ).addClass( "<?php echo strtolower($cate);?>_recommend_BGselected" );
					$("#hbody<?php echo $i;?>").show();
					$("#rbody<?php echo $i;?>").hide();
				}, 
				function() {
					$( "#recommend<?php echo $i;?>" ).removeClass( "<?php echo strtolower($cate);?>_recommend_BGselected" );
					$("#hbody<?php echo $i;?>").hide();
					$("#rbody<?php echo $i;?>").show();
				}
			);			
		<?php
			endfor;
		?>
	}
	function hoverHandler(event)
	{
// 		printObject(event);	
		alert(event.target.id);
    	switch(event.type)
	    {
    	    // When mouse comes over
        	case 'mouseover':
            	$(this)
                	// Stop animation where it is
	                .stop(true)
    	            // Start fading up
        	        .animate({backgroundColor:'#fd8'}, 'fast');
            	break;
	        // When mouse goes out
    	    case 'mouseout':
        	    $(this)
            	    // Jump to end of animation
                	.stop(true, true)
	                // Start fading down
    	            .animate({backgroundColor:'transparent'}, 'slow');
        	    break;
	    }
	}
	function printObject(o) {
	  var out = '';
	  for (var p in o) {
	    out += p + ': ' + o[p] + '\n';
	  }
	  alert(out);
	}
</script>

<?php 
	
	for($i=0;$i<5;$i++):
?>
<div class="<?php echo strtolower($cate);?>_recommend_BG" id="recommend<?php echo $i;?>">
	<div style="display:inline;" id="rbody<?php echo $i;?>">
		<table class="recommendation"><tr><th><img src="../images/<?php echo strtolower($cate);?>_icon02.png" class="full-width-img"></th><td class="content-Text2"><?php echo $mout[$i];?></td><td class="content-right content-Text2">></td></tr></table>
	</div>
	<div style="display:none;" id="hbody<?php echo $i;?>">
		<table class="recommendation"><tr><th><img src="../images/heart_icon01.png" class="full-width-img"></th><td class="content-Text2"><span class="content-Text3"><?php echo $mover[$i];?></span> Users Link This</td><td class="content-right content-Text2">></td></tr></table>
	</div>
</div>
<p></p>
<?php
	endfor;
?>