<script>
function setSearchUI(){
	$(".search_btn").click(function() {
  		searchSubmit();
	});
	var availableTags = ["ActionScript","AppleScript","Asp","BASIC","C","C++","Clojure","COBOL","ColdFusion","Erlang","Fortran","Groovy","Haskell","Java","JavaScript","Lisp","Perl","PHP","Python","Ruby","Scala","Scheme"];
	
    $("#search_tages").autocomplete({
        source: "ajax/ajax_autocomplete.php",
        minLength: 1,
        select: function(event, ui) {
        },
        html: true,
        // optional
        open: function(event, ui) {
            $(".ui-autocomplete").css("z-index", 1000);
            $(".ui-autocomplete").css("background-color", "white");
        }
    });    
}
function searchSubmit(){
	window.location = 'searchresult.php?cate='+$('#category').val()+'&district='+$('#distirct').val()+'&keyword='+$('#search_tages').val();
}
</script>
<span class="content-center content-Text6 content-bold content-gray"><?php echo autoLang('Search and Learn for Your Little Ones','Search and Learn for Your Little Ones');?></span>
<p></p>
<table class="search_tb">
<tr>
	<td>
		<select id="category" class="category_sel">
<!-- 		<select id="category" class="dropdown"> -->
		<option value="" class="label"><?php echo autoLang('類別','Category');?></option>
		<?php
			ini_set('display_errors',1);
			ini_set('display_startup_errors',1);
			error_reporting(-1);		
			$result = objectToArray(getCategory());
			for($i=0;$i<count($result);$i++):
		?>			
		<option value="<?php echo $result[$i]['cate_en'];?>"><?php echo autoLang($result[$i]['sub_cate_zh'],$result[$i]['sub_cate_en']);?></option>
		<?php
			endfor;
		?>
		</select>
	</td>
	<td>
		<select id="distirct" class="distirct_sel">
		<option value="" class="label"><?php echo autoLang('地區','Distirct');?></option>
		<?php
			$result1 = objectToArray(getDistrict());
			for($i=0;$i<count($result1);$i++):
		?>			
			<option value="<?php echo $result1[$i]['district_en'];?>"><?php echo autoLang($result1[$i]['district_zh'],$result1[$i]['district_en']);?></option>
		<?php
			endfor;
		?>
		</select>		
	</td>
<!-- 	<td><img src="images/search_OR.png"></td> -->
	<td><span class="content-center content-Text5 orText"><?php echo autoLang('或','OR');?></span></td>
	<td><input type="text" id="search_tages" class="search_input"></td>
	<td><button class="search_btn content-Text5 content-bold"/><?php echo autoLang('搜尋','Go');?></button></td>
</tr>
</table>