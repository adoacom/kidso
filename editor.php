<?php
	include_once('include/common.php');
	if(!empty($_SESSION['username']))
	{
		$userId = $_SESSION['username'];
	}
	else
	{
		$userId = getIP();
	}
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
	
	<link rel="stylesheet" href="css/smoothproducts.css">
	
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>	
	<script src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
 	<link rel="stylesheet" href="../css/screen.css">
	<link rel="stylesheet" href="../css/common.css">
	<link rel="stylesheet" href="../css/lightbox.css">
		
	<script src="js/lightbox.js"></script>
	<style>
		.symbol {
			display: inline-block;
			border-radius: 50%;
			border: 0px double black;
			width: 20px;
			height: 20px;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			setHeaderUI();
			getRecord('all');
		});
		function openDiv(id){
		    if($('#'+id).is(':visible'))
			    $('#'+id).fadeOut();
			else
			    $('#'+id).fadeIn();		
		}
	    function bookmark(id,bid){
			$.post( "ajax/addBookmark.php", { user: "<?php echo $userId;?>", editor_id: id })
			  .done(function( data ) {
			  	var json = $.parseJSON(data);
			    $('#'+bid).attr("src", json.img);
			});		    
	    }
		function getRecord(type,page){
			if(type == 'all'){
				$('#editorAll').removeClass( "content-gray" ).addClass( "content-orange" );
				$('#editorMarked').removeClass( "content-orange" ).addClass( "content-gray" );
			}
			else{
				$('#editorMarked').removeClass( "content-gray" ).addClass( "content-orange" );
				$('#editorAll').removeClass( "content-orange" ).addClass( "content-gray" );			
			}
			$.post( "ajax/ajaxEditor.php", { user: "<?php echo $userId;?>",type: type, page: page })
			  .done(function( data ) {
			    $('#ResultDiv').html(data);
			    $(".editorCellDiv").hide();
				$("#Photo img").load(function() {
    				$(this).wrap(function(){
				      return '<span class="image-wrap ' + $(this).attr('class') + '" style="position:relative; display:inline-block; background:url(' + $(this).attr('src') + ') no-repeat center center; width: 100px; height: 100px;" />';
    				});
	    			$(this).css("opacity","0");
				});			    
			});		    			
		}
	</script>
</head>
<body>
<div class="header_bar"></div>
<div class="header"><?php include_once('header.php');?></div>
<div class="color_bar"></div>
<div class="banner">
<img src="images/editor_banner.png" class="full-width-img" />
</div>
<div class="mainbody">
<br>
<div class="editorSelect">
	<style>
	.editorTB{
		width:100%;
		border: 1px dashed rgb(255,220,75);
	}
	.editorTB th{
		width: 80%;
		padding: 5px;
	}
	.editorTB td{
		border-left: 1px dashed rgb(255,220,75);
		width: 10%;
		padding: 5px;		
	}
	.editorCell{
		width:100%;
		border: 1px dashed rgb(255,220,75);		
	}
	.editorCellDiv{
		width:100%;
		padding: 10px;
		border-left: 1px dashed rgb(255,220,75);	
		border-right: 1px dashed rgb(255,220,75);	
		border-bottom: 1px dashed rgb(255,220,75);	
	}
	.editorCell th{
		width: 70%;
		padding: 5px;
	}
	.markImg{
		width: 5%;
		vertical-align: top;
		text-align: center;	
	}
	</style>
	<table class="editorTB">
	<tr>
		<th></th>
		<td class="content-center toLink" onclick="javascript:getRecord('all','0');" id="editorAll">All</td>
		<td class="content-center toLink" onclick="javascript:getRecord('Marked','0');" id="editorMarked">Marked</td>
	</tr>
	</table>
	<div id="ResultDiv"></div>
</div>
</div>
<br>
</body>