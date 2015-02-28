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
	$str = "SELECT comment.* from ".TABLE_EDITOR_PLUGIN." as comment WHERE comment.status<>0 AND comment.shop_id = '".$_REQUEST['pid']."' Order by comment.createdate DESC";
	$res = $db->fetchAllBySQL($str,true);	
	$total = abs(count($res) / $limitforPage);
	$str = "SELECT comment.* from ".TABLE_EDITOR_PLUGIN." as comment WHERE comment.status<>0 AND comment.shop_id = '".$_REQUEST['pid']."' Order by comment.createdate DESC".$limit;	
	$res = $db->fetchAllBySQL($str,true);
?>
<?php
for($i=0;$i<count($res);$i++):
$time = strtotime($res[$i]['createdate']);
$today = date("F j, Y, g:i a",$time);
$vote = objectToArray(getVote($res[$i]['vote_id']));
if(empty($vote['helpful']))
	$vote['helpful'] = 0;
if(empty($vote['interesting']))
	$vote['interesting'] = 0;
if(empty($vote['notbad']))
	$vote['notbad'] = 0;
?>
<div class="commentDiv">
	<table class="commentTable">
	<tr>
		<?php 
			if(!empty($res[$i]['user_id'])):
				$str = "SELECT user.user_id as userid, user.name as user, user.image as user_img from ".TABLE_USER." as user WHERE user.user_id = '".$res[$i]['user_id']."'";
				$user_res = objectToArray($db->fetchBySQL($str));
		?>
			<th>
				<div class="MemberPhoto box circle toLink" onclick="javascript:goUser('<?php echo $user_res['userid'];?>');">
					<img src="<?php echo $user_res['user_img'];?>" class="photo-img">
				</div>
			</th>
			<td><span class="content-gray content-Text2"><?php echo $user_res['user'];?><br><?php echo $today;?></span></td>
		<?php 
			else:
		?>
			<td colspan="2"><span class="content-gray content-Text2">Unknown User (<?php echo $res[$i]['username'];?>)<br><?php echo $today;?></span></td>				
		<?php
			endif;
		?>
	</tr>
	<tr>
		<td colspan="2">
			<span class="content-black content-Text1"><?php echo $res[$i]['comment'];?></span>
			<?php			
// 				if($i == 1)
// 					echo '<img src="../images/pic04.jpg" class="full-width-img" />';
// 				elseif($i == 4)
// 					echo '<img src="../images/pic03.jpg" class="full-width-img" />';
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2" class="content-right"></span>
		<span class="content-Text1 content-gray content-middle content-center"><img src="images/CM_Helpful.png" alt="Helpful" width="20" class="toLink" onclick="javascript:vote('<?php echo $res[$i]['vote_id'];?>','helpful');" />&nbsp;<?php echo $vote['helpful'];?>&nbsp;</span>
		<span class="content-Text1 content-gray content-middle content-center"><img src="images/CM_Interesting.png" alt="Interesting" width="20" class="toLink" onclick="javascript:vote('<?php echo $res[$i]['vote_id'];?>','interesting');" />&nbsp;<?php echo $vote['interesting'];?>&nbsp;</span>
		<span class="content-Text1 content-gray content-middle content-center"><img src="images/CM_Notbad.png" alt="Not Bad" width="20" class="toLink" onclick="javascript:vote('<?php echo $res[$i]['vote_id'];?>','notbad');" />&nbsp;<?php echo $vote['notbad'];?>&nbsp;</span>
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
