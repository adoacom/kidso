<?php
	include_once('../include/common.php');
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	
	$limitforPage = 5;
	$page = 0;
	if(!empty($_REQUEST['page']))
		$page = $_REQUEST['page'];
	
	$limit = " LIMIT ".$page*$limitforPage." , ".$limitforPage." ";
	$db = new DB();
	$str = "SELECT comment.* from ".TABLE_EDITOR_PLUGIN." as comment Left Join ".TABLE_USER." as user on comment.user_id = user.user_id WHERE comment.status<>0 AND comment.user_id = '".$_REQUEST['uid']."' Order by comment.createdate DESC";
	$res = $db->fetchAllBySQL($str,true);
	$total = abs(count($res) / $limitforPage);
	$str = "SELECT comment.*, user.name as user, user.image as user_img from ".TABLE_EDITOR_PLUGIN." as comment Left Join ".TABLE_USER." as user on comment.user_id = user.user_id WHERE comment.status<>0 AND comment.user_id = '".$_REQUEST['uid']."' Order by comment.createdate DESC".$limit;
	$res = $db->fetchAllBySQL($str,true);
	for($i=0;$i<count($res);$i++):
		$time = strtotime($res[$i]['createdate']);
		$today = date("F j, Y, g:i a",$time);
?>
<div class="commentDiv toLink" onclick="javascript:goShop('<?php echo $res[$i]['shop_id'];?>');">
	<table class="commentTable">
	<tr>
		<td colspan="2">
			<span class="content-black content-Text1"><?php echo $res[$i]['comment'];?></span>
		</td>
	</tr>
	<tr>
		<td colspan="2" class="content-right">
			<span class="content-gray content-Text2"><?php echo $today;?></span>
		</td>
	</tr>	
	</table>
</div>
<p></p>
<?php
	endfor;
?>
<p></p>
<div class="content-center content-Text1 content-black">
<?php
	for($i=0;$i<$total;$i++):
		$y=$i+1;
?>
	<span <?php if($i==$page){ echo 'class="Bubbleselect"';}else{echo 'class="Bubble toLink" onclick="javascript:clickPage('.$i.');"';}?> ><?php echo $y;?></span>
<?
	endfor;
?>
</div>
<br>
