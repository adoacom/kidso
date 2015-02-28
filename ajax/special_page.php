<?php
	include_once('../include/common.php');
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
// 	print_r($_REQUEST);
	$db = new DB();
	$db->table = TABLE_SPECIAL;
	$where = " createdate like '".$_REQUEST['pyear']."%' ";
	$order = " createdate DESC ";
	$result = objectToArray($db->fetchAll($where,$order));
	$year = intval($_REQUEST['pyear']) - 2;
?>
<?php
	if(count($result)>0):
?>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Karla%7CMontserrat">

<div class="speciallayout" id="specialbody">
	<div class="specialbody content-left content-black content-Text4">
		<span class="content-bold"><?php echo autoLang($result[0]['title_ch'],$result[0]['title_en']);?></span>
		<br><br>
		<span class="content-Text3"><?php echo str_replace("</strong>","",str_replace("<strong>","",autoLang($result[0]['description_ch'],$result[0]['description_en'])));?></span>
		<?php
			if(!empty($result[0]['image'])){
			$img = explode(",",$result[0]['image']);
			for($y=0;$y<count($img);$y++):
		?>
				<a class="example-image-link" href="upload/<?php echo $img[$y];?>" data-lightbox="example-set1" data-title=""><img  class="example-image" src="upload/<?php echo $img[$y];?>" class="quarter-width-img"></a>
		<?php
			endfor;
			}
		?>
		<br>		
		<div class="content-Text2 content-gray content-right">
		<?php 
			echo date("F j, Y, g:i a",strtotime($result[0]['createdate']));
		?>
		</div>
	</div>
</div>
<?php
	endif;
?>
<br><br><br>
<div class="underline"></div>
<br>
<div class="content-left">
<?php
	for($i=intval($_REQUEST['pyear'])-1;$i<=intval($_REQUEST['pyear'])+1;$i++):
?>
<span <?php if($i==intval($_REQUEST['pyear'])){ echo 'class="yearBubbleSelect content-Text2"';}else{ echo 'class="yearBubble content-Text2 toLink" onclick="javascript:getYear('.$i.');"';}?>><?php echo $i;?></span>
<?php
	endfor;
?>
</div>
<br>
<table class="specialPage">
<tr>
<?php 
	for($i=0;$i<count($result);$i++):
	if($i%3 == 0 && $i!=0)
		echo"</tr><tr>";	
?>
<td>
	<div class="specialcell toLink" onclick="javascript:getPage('<?php echo $result[$i]['special_id'];?>');">
	<div class="speciallayout-small">
		<div class="specialbody-small content-left content-black">
			<table class="specialTB-small content-Text4 content-black">
			<tr>
				<td colspan="2" class="content-bold content-Text4"><?php echo autoLang($result[$i]['title_ch'],$result[$i]['title_en']);?></td>
			</tr>
			<tr>
				<td>
				<?php
					if(!empty($result[$i]['image'])){
					$img = explode(",",$result[$i]['image']);
					if(count($img)>0):
				?>
						<img src="upload/<?php echo $img[0];?>" class="full-width-img">				
				<?php
					endif;
					}
				?>
				</td>
				<td class="content-Text1"><?php echo limit_text(autoLang($result[$i]['description_ch'],$result[$i]['description_en']),100);?></td>				
			</tr>
			</table>
		</div>
	</div>
</div>
</td>
<?php
	endfor;
	if(count($result)%3!=0){
		for($y=count($result)%3;$y<3;$y++)
		{
			echo "<td></td>";
		}	
	}
?>
</tr>
</table>
<p></p>
<div class="content-center content-Text1 content-black">
<?php
	$x = count($result) / 6;
	$num = abs($x);
	$page = 1;
	$limit = count($result) % 6;
	if($limit > 0)
		$num++;
	for($i=1;$i<$num;$i++):
?>
<span <?php if($page==$i){ echo 'class="Bubbleselect"';}else{echo 'class="Bubble"';}?>><?php echo $i;?></span>
<?php
	endfor;
?>
</div>
