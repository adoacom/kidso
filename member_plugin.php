<?php
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	$result = objectToArray(getMember_plugin());
// 	print_r($result);
?>
<script>
	function setMemberUI(){
		$(".MemberPhoto img").load(function() {
	    	$(this).wrap(function(){
	      return '<span class="image-wrap ' + $(this).attr('class') + '" style="position:relative; display:inline-block; background:url(' + $(this).attr('src') + ') no-repeat center center; width: 80px; height: 80px;" />';
    		});
    		$(this).css("opacity","0");
	  	});
	}
	function memberInfo(id){
		window.location = 'info.php?id='+id;
	}
</script>
<div class="Member">

<table class="memberDiv">
<tr>
	<th><img src="images/popular_line.png"/><img src="images/popular_image.png"/><img src="images/popular_line.png"/></th>
<?php
	for($i=0;$i<count($result);$i++):
	$votemark = objectToArray(getTotalVote($result[$i]['user_id']));
	if(empty($votemark['helpful']))
		$votemark['helpful'] = 0;
	if(empty($votemark['interesting']))
		$votemark['interesting'] = 0;
	if(empty($votemark['notbad']))
		$votemark['notbad'] = 0;
?>
	<td>
	<div class="memberArea content-member">
	<div class="MemberPhoto box circle toLink" onclick="javascript:memberInfo('<?php echo $result[$i]['user_id'];?>');">
		<img src="<?php echo $result[$i]['image'];?>" class="photo-img">
		<p></p><span class="content-gray content-Text2"><?php echo $result[$i]['name'];?></span>
	</div>
		<span class="memberMark content-middle content-center content-Text1"><img src="images/CM_Helpful.png" width="20"/> <?php echo $votemark['helpful'];?> </span>
		<span class="memberMark content-middle content-center content-Text1"><img src="images/CM_Interesting.png" width="20"/> <?php echo $votemark['interesting'];?> </span>
		<span class="memberMark content-middle content-center content-Text1"><img src="images/CM_Notbad.png" width="20"/> <?php echo $votemark['notbad'];?> </span>
	</div>
	</td>
<?php
	endfor;	
	if(count($result)%5!=0){
		for($y=count($result)%5;$y<5;$y++)
		{
			echo "<td></td>";
		}	
	}	
?>
	<th><img src="images/popular_line.png"/></th>
</tr>
</table>

</div>