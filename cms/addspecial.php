<?php
	include_once('../include/common.php');
	if(count($_REQUEST) > 0)
	{
	    $output_dir = "../upload/";
	    $image="";
	    for($i=0;$i<count($_FILES['files']['name']);$i++)
    	{
    		$temp = $_FILES['files']['name'][$i]; 
	     	if(copy($_FILES['files']['tmp_name'][$i],$output_dir.$temp))
    	 	{
 				chmod($output_dir.$temp,0777);
	 			$image .= $temp.",";
 			}
	    }
		$result['title_ch'] = $_REQUEST['title_zh'];
		$result['title_en'] = $_REQUEST['title_en'];
		$result['description_ch'] = $_REQUEST['editor1'];
		$result['description_en'] = $_REQUEST['editor2'];
		$result['image'] = substr($image,0,-1);
		$result['user_id'] = 1;			
		$db = new DB();
		$db->insert(TABLE_SPECIAL,$result);
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add new Special</title>
        <script src="../ckeditor/ckeditor.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="/resources/demos/style.css"> 
	<!--Stylesheets-->
	<link href="../css/jquery.filer.css" type="text/css" rel="stylesheet" />
	<link href="../css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />

	<!--jQuery-->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	
	<script type="text/javascript" src="../js/jquery.filer.min.js"></script>

    
    <style>
        .file_input{
            display: inline-block;
            padding: 10px 16px;
            outline: none;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            white-space: nowrap;
            font-family: sans-serif;
            font-size: 11px;
            font-weight: bold;
            border-radius: 3px;
            color: #008BFF;
            border: 1px solid #008BFF;
            vertical-align: middle;
            background-color: #fff;
            margin-bottom: 10px;
            box-shadow: 0px 1px 5px rgba(0,0,0,0.05);
            -webkit-transition: all 0.2s;
            -moz-transition: all 0.2s;
            transition: all 0.2s;
        }
        .file_input:hover,
        .file_input:active {
            background: #008BFF;
            color: #fff;
        }
    </style>
    
	<!--[if IE]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->		       
    </head>
    <body>        
	<script type="text/javascript">
	$(document).ready(function() {
        $('.file_input').filer({
            showThumbs: true,
            templates: {
                box: '<ul class="jFiler-item-list"></ul>',
                item: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <li><span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span></li>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            </div>\
                        </li>',
                itemAppend: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            </div>\
                        </li>',
                progressBar: '<div class="bar"></div>',
                itemAppendToEnd: true,
                removeConfirmation: true,
                _selectors: {
                    list: '.jFiler-item-list',
                    item: '.jFiler-item',
                    progressBar: '.bar',
                    remove: '.jFiler-item-trash-action',
                }
            },
            addMore: true
        });
        
		$( "#tabs" ).tabs();
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
        
	});
	</script>
        <form action="" method="post" enctype="multipart/form-data">
		<div id="tabs">
		<ul>
			<li><a href="#tabs-1">ZH</a></li>
			<li><a href="#tabs-2">EN</a></li>
		</ul>
		<div id="tabs-1">
			<p>Title:<input type="text" name="title_zh"></p>
			<textarea name="editor1"></textarea>
		</div>
		<div id="tabs-2">
			<p>Title:<input type="text" name="title_en"></p>
			<textarea name="editor2"></textarea>
		</div>
		</div>
		<p>
        <a class="file_input" data-jfiler-name="files" data-jfiler-extensions="jpg, jpeg, png, gif"><i class="icon-jfi-paperclip"></i> Attach a file</a>        
        </p>
		<input type="submit">
		</form>
    </body>
</html>