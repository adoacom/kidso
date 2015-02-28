<?php
	include_once('../include/common.php');
 	ini_set('display_errors',1);
 	ini_set('display_startup_errors',1);
 	error_reporting(-1);
	if(!empty($_SESSION['username']))
	{
		$userId = $_SESSION['username'];
	}
	else
	{
		$userId = getIP();
	}

	$limitforPage = 5;
	$page = 0;
	if(!empty($_REQUEST['page']))
		$page = $_REQUEST['page'];
	$limit = " LIMIT ".$page*$limitforPage." , ".$limitforPage." ";	

 	if(strtolower($_REQUEST['type']) == 'all'){
 		$total = abs(getEditorResultTotal() / $limitforPage);
 		$result = getEditorResult($limit);
 	}
 	elseif(strtolower($_REQUEST['type']) == 'marked'){
 		$total = abs(getEditorMarkedResultTotal($_REQUEST['user']) / $limitforPage);
 		$result = getEditorMarkedResult($_REQUEST['user'],$limit);
 	} 	 	
 	$res = getBookmark($userId);
 	$bookmark[0] = 0;
 ?>
 <style>
 .userDiv{
 	width:100%;
 	background-color: rgb(60,189,179); 	
 }
 .userDiv th{
 	width:20%; 	
 	padding:10px;
 }
 .userDiv td{
 	padding:10px;
 }
 
 </style>
 <?php
 	for($i=0;$i<count($res);$i++)
 		$bookmark[$i] = $res[$i]['editor_id'];
 ?>
 <?php
//  	print_r($result[0]);
	for($i=0;$i<count($result);$i++):
?>
	<br>
	<table class="editorCell">
	<tr>
		<th class="content-gray content-Text3 toLink" onclick="javascript:openDiv('cell<?php echo $i;?>');"><?php echo autoLang($result[$i]['title_ch'],$result[$i]['title_en']);?></th>
		<td class="content-gray content-center content-Text3 toLink" onclick="javascript:openDiv('cell<?php echo $i;?>');"><?php echo date("F j, Y, g:i a",strtotime($result[$i]['createdate']));?></td>
		<td class="markImg"><img src="<?php if(in_array($result[$i]['editor_id'], $bookmark)){ echo '../images/editor_marked.png'; }else{ echo '../images/editor_mark.png'; }?>" id="bookmark<?php echo $result[$i]['editor_id'];?>" onclick="javascript:bookmark('<?php echo $result[$i]['editor_id'];?>','bookmark<?php echo $result[$i]['editor_id'];?>');" class="toLink"></td>
	</tr>
	</table>	
	<div id="cell<?php echo $i;?>" class="editorCellDiv content-left content-Text2 content-black">
	<p></p>
	<table class="full-width-img content-left userDiv">
	<tr class="content-gray">
		<th class="content-center"><span id="Photo"><span class="box circle"><img src="<?php echo $result[$i]['user_img'];?>" class="photo-img"></span></span></th>
		<td class="content-left content-middle content-orange content-Text5"><span><?php echo $result[$i]['user'];?></span></td>
	</tr>
	</table>
	<p></p>
	<?php echo autoLang($result[$i]['description_ch'],$result[$i]['description_en']);?>
	<?php
		if(!empty($result[$i]['image'])){
			$img = explode(",",$result[$i]['image']);
			if(count($img)>0):
				for($y=0;$y<count($img);$y++):
	?>
				<a class="example-image-link" href="upload/<?php echo $img[$y];?>" data-lightbox="example-set<?php echo $i;?>" data-title=""><img  class="example-image" src="upload/<?php echo $img[$y];?>" class="quarter-width-img"></a>
	<?php
				endfor;
			endif;
		}
	?>	
	</div>	
<?php
	endfor;
?>
<p></p>
<div class="content-center content-Text1 content-black">
<?php
	for($i=0;$i<$total;$i++):
		$y=$i+1;
?>
	<span <?php if($i==$page){ echo 'class="Bubbleselect"';}else{echo 'class="Bubble toLink" onclick="javascript:getRecord(\''.$_REQUEST['type'].'\','.$i.')"';}?> ><?php echo $y;?></span>
<?
	endfor;
?>
</div>
