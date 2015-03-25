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

    $limitforPage = 5;
    $page = 0;
    if(!empty($_REQUEST['page']))
        $page = $_REQUEST['page'];
    $limit = " LIMIT ".$page*$limitforPage." , ".$limitforPage." ";

    if(isset($_REQUEST['type'])) {
        $type = $_REQUEST['type'];
        if(strtolower($type) == 'all'){
            $total = abs(getEditorResultTotal() / $limitforPage);
            $result = getEditorResult($limit);
        }
        elseif(strtolower($type) == 'marked'){
            $total = abs(getEditorMarkedResultTotal($_REQUEST['user']) / $limitforPage);
            $result = getEditorMarkedResult($_REQUEST['user'],$limit);
        }
    } else {
        $type = 'all';
        $total = abs(getEditorResultTotal() / $limitforPage);
        $result = getEditorResult($limit);
    }

    $res = getBookmark($userId);
    $bookmark[0] = 0;
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
    <!--    Tin tuc hep-->
    <link href="fonts/stylesheet.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/bootstrap-rating.css" rel="stylesheet">
	
	<link rel="stylesheet" href="css/smoothproducts.css">

    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-ui.js"></script>

    <!-- FlexSlider -->
    <script defer src="js/jquery.flexslider.js"></script>

<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
 	<link rel="stylesheet" href="../css/screen.css">
	<link rel="stylesheet" href="../css/common.css">
	<link rel="stylesheet" href="../css/lightbox.css">
		
	<script src="js/lightbox.js"></script>

    <!-- Optional FlexSlider Additions -->
    <script src="js/jquery.easing.js"></script>
    <script src="js/jquery.mousewheel.js"></script>

	<style>
		.symbol {
			display: inline-block;
			border-radius: 50%;
			border: 0px double black;
			width: 20px;
			height: 20px;
		}
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
	<script type="text/javascript">
		$(document).ready(function(){
			setHeaderUI();
			changeTypeStyle('all');
            $('.flexslider').flexslider({
                animation: "slide",
                animationLoop: false,
                slideshow: false,
                controlNav: false
            });

            $(".flexslider .slides").on("click", "img", function() {
                return false;
            });
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
        function changeTypeStyle(type) {
            if(type == 'all'){
                $('#editorAll').removeClass( "content-gray" ).addClass( "content-orange" );
                $('#editorMarked').removeClass( "content-orange" ).addClass( "content-gray" );
            }
            else{
                $('#editorMarked').removeClass( "content-gray" ).addClass( "content-orange" );
                $('#editorAll').removeClass( "content-orange" ).addClass( "content-gray" );
            }
        }
		function getRecord(type,page){
            var link = "<?php echo $_SERVER['PATH_INFO']; ?>";
            var user = "<?php echo $userId; ?>";
            window.location = link + '?type=' + type + '&page=' + page + '&user=' + user;
//			$.post( "ajax/ajaxEditor.php", { user: "<?php //echo $userId;?>//",type: type, page: page })
//			  .done(function( data ) {
//			    $('#ResultDiv').html(data);
//			    $(".editorCellDiv").hide();
//			});
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
    .flexslider {
        margin: 0 !important;
    }
    .flexslider ul li{
        margin-bottom: 0;
    }
    .flexslider .slides img {
        /*width: 780px !important;*/
        height: 520px;
    }
    .editor_content h1 {
        font-family: "uvn_tin_tuc_hepregular";
        color: #333;
        margin: 0 0 19px;
        font-size: 29px;
        font-weight: bold;
        line-height: 35px;
        padding: 0;
        height: auto;
        word-wrap: break-word;
    }
	</style>
	<table class="editorTB">
	<tr>
		<th></th>
		<td class="content-center toLink" onclick="javascript:getRecord('all','0');" id="editorAll">All</td>
		<td class="content-center toLink" onclick="javascript:getRecord('marked','0');" id="editorMarked">Marked</td>
	</tr>
	</table>
	<div id="ResultDiv">
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
            <div id="cell<?php echo $i;?>" class="editorCellDiv content-left content-Text2 content-black editor_content">
                <p></p>
                <!--	<table class="full-width-img content-left userDiv">-->
                <!--	<tr class="content-gray">-->
                <!--		<th class="content-center"><span id="Photo"><span class="box circle"><img src="--><?php //echo $result[$i]['user_img'];?><!--" class="photo-img"></span></span></th>-->
                <!--		<td class="content-left content-middle content-orange content-Text5"><span>--><?php //echo $result[$i]['user'];?><!--</span></td>-->
                <!--	</tr>-->
                <!--	</table>-->
                <div class="flexslider">
                    <ul class="slides" id="slide_<?php echo $i; ?>">
                        <?php
                        if(!empty($result[$i]['image'])){
                            $img = explode(",",$result[$i]['image']);
                            if(count($img)>0):
                                for($y=0;$y<count($img);$y++):
                                    ?>
                                    <li data-thumb="upload/<?php echo $img[$y];?>">
                                        <a class="example-image-link" href="upload/<?php echo $img[$y];?>">
                                            <img  class="example-image" src="upload/<?php echo $img[$y];?>" class="quarter-width-img">
                                        </a>
                                    </li>
                                <?php
                                endfor;
                            endif;
                        }
                        ?>
                    </ul>
                </div>
                <h1><?php echo autoLang($result[$i]['title_ch'],$result[$i]['title_en']);?></h1>
                <div class="social-shares">
                    <div class="stats">
                        <div class="share-container">
                            <div class="share-count">0</div>
                            <div class="share">Shares</div>
                        </div>
                    </div>
                    <a class="facebook-share"
                       href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fhypebeast.com%2F2015%2F2%2Fmoscow-apartment-by-architects-m17"
                       target="_blank"><i class="fa fa-facebook"></i><span>Share on Facebook</span></a><a
                        class="twitter-retweet"
                        href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fhypebeast.com%2F2015%2F2%2Fmoscow-apartment-by-architects-m17&amp;text=Spacious+Japanese-Inspired+Moscow+Apartment+by+Architects+M1..."
                        target="_blank"><i class="fa fa-twitter"></i><span>Tweet</span></a><a class="google-share"
                                                                                              href="https://plus.google.com/share?url=http%3A%2F%2Fhypebeast.com%2F2015%2F2%2Fmoscow-apartment-by-architects-m17"><i
                            class="fa fa-google-plus"></i><span>Share</span></a><a class="pinterest-pin"
                                                                                   href="http://www.pinterest.com/pin/create/button/?url=http%3A%2F%2Fhypebeast.com%2F2015%2F2%2Fmoscow-apartment-by-architects-m17&amp;media=http://hypebeast.com/image/2015/02/moscow-apartment-by-architects-m11-11.jpg&amp;description=Spacious Japanese-Inspired Moscow Apartment by Architects M17"><img
                            class="social"
                            src="http://store.hypebeast.com/bundles/hypebeasteditorial/images/icons/pinterest-icon.png?1693c59"><span>Pin It</span></a>
                </div>
                <div class="editor_description"><?php echo autoLang($result[$i]['description_ch'],$result[$i]['description_en']);?></div>
                <div class="editor_info"><strong class="date">Date:</strong>&nbsp;
                    <time>Feb 26, 2015</time>
                    <span class="divider">/</span><strong
                        class="author">Author:</strong>&nbsp;<span><?php echo $result[$i]['user'];?></span>
                    <span class="divider">/</span><strong class="tags">Tags:</strong>&nbsp;
                    <a href="http://hypebeast.com/tags/architecture" class="tag"
                       title="Architecture">Architecture</a><span>, </span><a
                        href="http://hypebeast.com/tags/apartments" class="tag" title="Apartments">Apartments</a><span
                        class="divider">/</span><strong class="views">Views:</strong>&nbsp;<span>28</span>
                </div>
                <div class="editory_comment">
                    <!-- this part will likely contain individual post data -->
                    <a class="editor_show_comment"
                       onclick="loadDisqus(jQuery(this), '<?php echo $result[$i]['editor_id']; ?>', '<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]?editor_id=".$result[$i]['editor_id']; ?>');">
                        Show comments
                    </a>
                </div>
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
                <span <?php if($i==$page){ echo 'class="Bubbleselect"';}else{echo 'class="Bubble toLink" onclick="javascript:getRecord(\''.$type.'\','.$i.')"';}?> ><?php echo $y;?></span>
            <?
            endfor;
            ?>
        </div>
    </div>
</div>
</div>
<br>
<script type="text/javascript">
    var disqus_shortname = 'kidso';
    var disqus_identifier; //made of post id and guid
    var disqus_url; //post permalink

    function loadDisqus(source, identifier, url) {
//        $(source).css("display", "none");
        if (window.DISQUS) {

            jQuery('#disqus_thread').insertAfter(source); //append the HTML after the link

            //if Disqus exists, call it's reset method with new parameters
            DISQUS.reset({
                reload: true,
                config: function () {
                    this.page.identifier = identifier;
                    this.page.url = url;
                }
            });

        } else {

            //insert a wrapper in HTML after the relevant "show comments" link
            jQuery('<div id="disqus_thread"></div>').insertAfter(source);
            disqus_identifier = identifier; //set the identifier argument
            disqus_url = url; //set the permalink argument

            //append the Disqus embed script to HTML
            var dsq = document.createElement('script');
            dsq.type = 'text/javascript';
            dsq.async = true;
            dsq.src = 'js/embed.js';
            jQuery('head').append(dsq);

        }
    }
</script>
</body>