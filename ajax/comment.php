<script>
	function commentUI(){
		clickPage(0);
	}
	function clickPage(page)
	{
		$.post( "ajax/ajaxCommentResult.php", { page: page, pid: "<?php echo $_REQUEST['pid'];?>"})
			.done(function( data ) {
			    $("#commentBody").html(data);
				$(".MemberPhoto img").load(function() {
	    			$(this).wrap(function(){
				      return '<span class="image-wrap ' + $(this).attr('class') + '" style="position:relative; display:inline-block; background:url(' + $(this).attr('src') + ') no-repeat center center; width: 80px; height: 80px;" />';
    				});
	    			$(this).css("opacity","0");
			  	});			    
		});		    
	}
	function goShop(id){
		window.location = 'detail.php?pid='+id;
	}
	function goUser(id){
		window.location = 'info.php?id='+id;
	}
	function vote(cid,type){
// 		alert(cid+','+type);
		$.post( "ajax/addvote.php", { cid: cid, type: type})
			.done(function( data ) {
// 				alert(data);
			    clickPage(0);
		});		    		
	}
</script>
<div id="commentBody">
</div>

