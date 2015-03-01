<script type="text/javascript" charset="utf-8" src="js/jquery.leanModal.min.js"></script>
<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
<script>
	function setHeaderUI(){
		$('#loginbtn').click(function(e){
			$.ajax({
				type: "POST", 
				url: "ajax/ajaxLogin.php", 
				data : {username:$('#username').val(),password:$('#password').val()},
				dataType: "json",
				success: function(response){					
					if(response.username)
					{
						$(location).attr('href', '<?php echo curPageURL();?>');
					}
				},
				error: function(){
					alert("Unexpected error, Please try again");
				}
			});
		});  
		$('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
// 		$( "#lang_sel" ).change(function() {		
// 			$.get( "ajax/ajaxLang.php?lang="+$('#lang_sel').val())
// 				.done(function( data ) {
// 			    	$(location).attr('href', '<?php echo curPageURL();?>');
// 			  	});
// 		});
	}
	function Lang(lang){
		$.get( "ajax/ajaxLang.php?lang="+lang)
			.done(function( data ) {
		    	$(location).attr('href', '<?php echo curPageURL();?>');
		  	});		
	}

	var isShow = true;
	function show_hide_icons(){
		if(isShow==true){
			$("#navcontainer .list_icons").hide();
			isShow = false;
		}else{
			$("#navcontainer .list_icons").show();
			isShow = true;
		}
	}
	
</script>
<div class="headerbody">
	<div id="header_content">
		<div class="logo"><a href="index_t.php"><img src="images/web_logo.jpg" style="width: 100%;"></a></div>
		<div id="navcontainer">
			<ul>
				<li class="content-Text1"><a href="index_t.php"><?php echo autoLang('首頁','HOME');?></a></li>
				<li class="content-Text1"><a href="aboutus.php"><?php echo autoLang('關於我們','ABOUT US');?></a></li>
				<li class="content-Text1"><a href="contactus.php"><?php echo autoLang('聯繫我們','CONTACT US');?></a></li>
				<!-- <li><a href="#">SIGN UP</a></li> -->
				<?php 
					if (!isset($_SESSION['username']) || !isset($_SESSION['pwd']) || !isset($_SESSION['type'])):
				?>
						<li class="content-Text1"><a href="#loginmodal" id="modaltrigger"><?php echo autoLang('登入','LOGIN');?></a></li>
				<?php 
					else:
				?>
						<li class="content-Text1"><a href="info.php"><?php echo autoLang('我的頁面','MY PAGE');?></a></li>
						<li class="content-Text1"><a href="logout.php"><?php echo autoLang('登出','LOG OUT');?></a></li>
				<?php
					endif;
				?>

				<li class="content-Text1"><a href="javascript:show_hide_icons()"><img src="images/right_arrow.png" width="30"></a></li>
				<li class="content-Text1 list_icons"><a href="category.php?cate=education" ><img src="images/education_icon01.png"></a></li>
				<li class="content-Text1 list_icons"><a href="category.php?cate=outdoor" ><img src="images/outdoor_icon01.png"></a></li>
				<li class="content-Text1 list_icons"><a href="category.php?cate=medical" ><img src="images/medical_icon01.png"></a></li>
				<li class="content-Text1 list_icons"><a href="category.php?cate=party" ><img src="images/party_icon01.png"></a></li>
			</ul>
		</div>
		<span class="content-right">
		<!-- 
			<select id="lang_sel" name="lang_sel" class="icon-menu">
				<option value="zh" <?php if($_SESSION["lang"] == "zh"){ echo "selected";} ?>>zh</option>
				<option value="en" <?php if($_SESSION["lang"] == "en"){ echo "selected";} ?>>en</option>
			</select>
		 -->
		      <span id="lang_sel" name="lang_sel" class="dropdown">
		        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
		        <?php
		//         	echo getLang();
		        	if($_SESSION['lang'] == "zh")
		        		echo '<img src="images/CN.png" />';
		        	else if($_SESSION['lang'] == "en")
			        	echo '<img src="images/EN.png" />';
		        ?>
		        <span class="caret"></span></button>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:Lang('zh');"><img src="images/CN.png" /> 繁體中文</a></li>
		          <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:Lang('en');"><img src="images/EN.png" /> English</a></li>
		        </ul>
		      </span>
			
			
		</span>
		<div id="loginmodal" style="display:none;">
			<h1 class="content-gray content-Text4"><?php echo autoLang('用戶登錄','User Login');?></h1>
			<label for="username" class="content-gray content-Text3"><?php echo autoLang('用戶名:','Username:');?></label>
			<input type="text" name="username" id="username" class="txtfield" tabindex="1">      
			<label for="password" class="content-gray content-Text3"><?php echo autoLang('密碼:','Password:');?></label>
			<input type="password" name="password" id="password" class="txtfield" tabindex="2">      
			<div class="center"><button name="loginbtn" id="loginbtn" class="flatbtn-blu content-Text3 hidemodal"><?php echo autoLang('登入','Log In');?></button></div>
			<p></p><p></p>
			<div class="content-left content-gray content-Text1">
				<p><a href="forgetpwd.php"><?php echo autoLang('忘記密碼?','Forget password?');?></a></p>
				<p><a href="register.php" target="_self"><?php echo autoLang('註册 KIDS O','Sign up for KIDS O?');?></a></p>
		</div>
	</div>

</div>
<div class="color_bar"></div>
</div>