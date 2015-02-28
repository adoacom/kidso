$.fn.scrollView = function () {
  return this.each(function () {
    $('html, body').animate({
      scrollTop: $(this).offset().top
    }, 1000);
  });
}
jQuery.fn.getPos = function(){
    var o = this[0];
    var left = 0, top = 0, parentNode = null, offsetParent = null;
    offsetParent = o.offsetParent;
    var original = o;
    var el = o;
    while (el.parentNode != null) {
        el = el.parentNode;
        if (el.offsetParent != null) {
            var considerScroll = true;
            if (window.opera) {
                if (el == original.parentNode || el.nodeName == "TR") {
                    considerScroll = false;
                }
            }
            if (considerScroll) {
                if (el.scrollTop && el.scrollTop > 0) {
                    top -= el.scrollTop;
                }
                if (el.scrollLeft && el.scrollLeft > 0) {
                    left -= el.scrollLeft;
                }
            }
        }            
        if (el == offsetParent) {
            left += o.offsetLeft;
            if (el.clientLeft && el.nodeName != "TABLE") {
                left += el.clientLeft;
            }
            top += o.offsetTop;
            if (el.clientTop && el.nodeName != "TABLE") {
                top += el.clientTop;
            }
            o = el;
            if (o.offsetParent == null) {
                if (o.offsetLeft) {
                    left += o.offsetLeft;
                }
                if (o.offsetTop) {
                    top += o.offsetTop;
                }
            }
            offsetParent = o.offsetParent;
        }
    }
    return {
        left: left,
        top: top
    };
};

function banner(){
	var fadetime = 2000;
	$("#maindiv").hide();	

	$( "#banner" ).fadeOut( fadetime, function() {
    	$( "#banner" ).fadeIn(fadetime);
		$( "#banner1" ).fadeOut( fadetime, function() {
		    $( "#banner1" ).fadeIn(fadetime);
			$( "#banner2" ).fadeOut( fadetime, function() {
		    	$( "#banner2" ).fadeIn(fadetime);
				$( "#banner3" ).fadeOut( fadetime, function() {
			    	$( "#banner3" ).fadeIn(fadetime);
			    	$( "#banner4" ).fadeOut( fadetime, function() {
			    		$( "#banner4" ).fadeIn(fadetime);
						$( "#banner5" ).fadeOut( fadetime, function() {
					    	$( "#banner5" ).fadeIn(fadetime);
							$( "#banner6" ).fadeOut( fadetime, function() {
						    	$( "#banner6" ).fadeIn(fadetime);
								$( "#banner7" ).fadeOut( fadetime, function() {
							    	$( "#banner7" ).fadeIn(fadetime,function(){
									    $( "#banner" ).fadeOut(fadetime);
									    $( "#banner1" ).fadeOut(fadetime);
									    $( "#banner2" ).fadeOut(fadetime);
									    $( "#banner3" ).fadeOut(fadetime);
									    $( "#banner4" ).fadeOut(fadetime);
									    $( "#banner5" ).fadeOut(fadetime);
									    $( "#banner6" ).fadeOut(fadetime);
									    $( "#banner7" ).fadeOut(fadetime);
										setmain(fadetime*3);
									});
		    					});			    		
			    			});					    	
		    			});			    		
			    	});
		    	});
			});
  		});
	});

}

function setmain(fadetime){
	$("#maindiv").fadeIn(fadetime);
	$("#maindiv").niceScroll("#mdiv-inner",{cursorcolor:"blue",cursorwidth:"1px",boxzoom:false});
// 	getRecord($("#ldiv"),$("#simple-inner"));
// 	getRecord($("#rdiv"),$("#custom-inner"));
	$("#ldiv").niceScroll("#simple-inner",{cursorcolor:"gray",cursorwidth:"1px",boxzoom:false});
	$("#rdiv").niceScroll("#custom-inner",{cursorcolor:"gray",cursorwidth:"1px",boxzoom:false});				    
}

function getRecord(path,dataObj){
	var request = $.ajax({
					url: path + ".php",
					type: "POST",
					dataType: "html"
					});
	request.done(function( html ) {
		dataObj.append(html);
		$("#ldiv").niceScroll("#simple-inner",{cursorcolor:"gray",cursorwidth:"1px",boxzoom:false});
		$("#rdiv").niceScroll("#custom-inner",{cursorcolor:"blue",cursorwidth:"1px",boxzoom:false});				    
	});
	request.fail(function( jqXHR, textStatus ) {
		alert( "Request failed: " + textStatus );
	});	
}
