<?php
	include_once('include/common.php');
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	$result = objectToArray(getEditor($_REQUEST['id']));	
	$votemark = objectToArray(getTotalVote($_REQUEST['id']));
	if(empty($votemark['helpful']))
		$votemark['helpful'] = 0;
	if(empty($votemark['interesting']))
		$votemark['interesting'] = 0;
	if(empty($votemark['notbad']))
		$votemark['notbad'] = 0;

?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Firebean Limited">  
	<title>Kids O</title>
	<link rel="stylesheet" type="text/css" href="css/common.css" media="screen"> 
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- Font Awesome CSS -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/bootstrap-rating.css" rel="stylesheet">
		
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>	
	<script src="js/bootstrap.min.js"></script>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
	
	<style>
		.symbol {
			display: inline-block;
			border-radius: 50%;
			border: 0px double black;
			width: 20px;
			height: 20px;
		}
		.mainbody {
		    text-align:center;
		    background-color: #fff;
			padding: 0 10;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			setHeaderUI();
			$("#Photo img").load(function() {
    			$(this).wrap(function(){
			      return '<span class="image-wrap ' + $(this).attr('class') + '" style="position:relative; display:inline-block; background:url(' + $(this).attr('src') + ') no-repeat center center; width: 150px; height: 150px;" />';
    			});
	    		$(this).css("opacity","0");
			});
			$("#friend img").load(function() {
    			$(this).wrap(function(){
			      return '<span class="image-wrap ' + $(this).attr('class') + '" style="position:relative; display:inline-block; background:url(' + $(this).attr('src') + ') no-repeat center center; width: 80px; height: 80px;" />';
    			});
	    		$(this).css("opacity","0");
			});
	        $.get( "ajax/usercomment.php?userid=<?php echo $_REQUEST['id'];?>")
			  .done(function( data ) {
			    $("#comment").html(data);
			    commentUI();    
			  });
		});
	</script>
</head>
<body>
<div class="header_bar"></div>
<div class="header"><?php include_once('header.php');?></div>
<div class="color_bar"></div>
<div class="banner">
<img src="images/mypage_banner.png" class="full-width-img" />
</div>
<div class="mainbody">
<!-- Left Side -->
<div class="leftInfoArea">
<div class="garyArea">
	<div id="Photo">
		<div class="box circle">
			<img src="<?php echo $result['user_img'];?>" class="photo-img">
		</div>
	</div>
	<div class="content-Text4 content-black"><?php echo $result['user'];?></div>
	<div class="infoMiddle">
	<table class="info">
	<tr class="infoBG">
		<th class="infoTD1 content-center">
			<img src="images/CM_Helpful.png" width="26"/>
		</th>
		<td class="content-center content-Text4 content-gray">Helpful<td>
		<td class="content-center content-Text4 content-gray"><?php echo $votemark['helpful'];?></td>
	</tr>
	<tr class="infoBG">
		<th class="infoTD1 content-center">
			<img src="images/CM_Interesting.png" width="26"/>
		</th>
		<td class="content-center content-Text4 content-gray">Interesting<td>
		<td class="content-center content-Text4 content-gray"><?php echo $votemark['interesting'];?></td>
	</tr>
	<tr class="infoBG">
		<th class="infoTD1 content-center">
			<img src="images/CM_Notbad.png" width="26"/>
		</th>
		<td class="content-center content-Text4 content-gray">Not Bad<td>
		<td class="content-center content-Text4 content-gray"><?php echo $votemark['notbad'];?></td>
	</tr>
	</table>
	</div>
<!-- 	<div class="infoFooter">&nbsp;</div> -->
	<br>
</div>
<br>
<div class="spaceArea"></div>
<br>
<div class="friendArea">
<table class="friendTable">
<tr>
<?php
	$fr_res = getFriend($_REQUEST['id']);
	$total = count($fr_res);
	for($i=0;$i<$total;$i++):
	if($i%3 == 0 && $i!=0)
		echo"</tr><tr>";	
?>
	<td>
	<div class="friendDiv">
	<div id="friend">
		<div class="box circle toLink" onclick="javascript:goUser('<?php echo $fr_res[$i]['userid'];?>');">
			<img src="<?php echo $fr_res[$i]['user_img'];?>" class="photo-img">
		</div>
	</div>	
	</div>
	</td>
<?php
	endfor;
	if($total%3!=0){
		for($y=$total%3;$y<3;$y++)
		{
			echo "<td></td>";
		}	
	}
?>
</tr>
</table>
</div>
</div>
<!-- Right Side -->
<div class="rightInfoArea">
	<div><img src="images/pic03.jpg" class="full-width-img" /></div>
	<p></p>
	<div class="underline"></div>
	<p></p>
	<div id="comment"></div>
</div>
</div>
</body>