<style>
.categoryHeader {
  height: 1px; 
  border-top: 1px dashed <?php echo $search_color;?>;
  text-align: center; 
  position: relative;     
} 

.categoryHeader span{ 
    color: <?php echo $search_color;?>; 
	position: relative; 
	top: -.7em; 
	background: white; 
	display: inline-block; 
	padding-left: 10px;
	padding-right: 10px;   
}
.search_tb{
	width:60%;
}
.search_tb td{
/* 	width:40%; */
	text-align: center;
	padding:0px 5px;
}
.search_tb th{
/* 	width:5%; */
	text-align: center;
}

.cateTable{
	width:97%;
	border-collapse: collapse;
	border: 1px dashed <?php echo $search_color;?>;
}
.cateTable td{
	width:25%;
	text-align: center;
	color: <?php echo $search_color;?>;
	border: 1px dashed <?php echo $search_color;?>;
	padding: 5px;	
}

.cateRecordTable{
	width:97%;
	background-color: rgb(241,241,244);
	text-align: center;
}

.cateRecordTable td{
	width:25%;
	text-align: center;
	color: black;
	padding: 5px;
}


.cateRecord{
	width:22%;
	display: inline-block;
	text-align: center;
/* 	background-color: rgb(71,184,171); */
	padding: 5px;
}
.cateRecordVote{
	width:100%;
	height: 200px;
}

.voteTable{
	width:100%;
}
.voteTable td{
	color: black;
	text-align: left;
}



.search_input{
	background: url('<?php echo $search_bar?>') repeat-x;
	background-size: 100%;
	width:300px;
	height:48px;
	padding-left:70px;
	border: 0;
	background-color: rgba(255,255,255,0.0);
	color: <?php echo $search_color;?>;
}
.search_btn{
	width:123px;
	height:46px;
	border: 0;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;			
	background-color: <?php echo $search_color;?>;
}

.distirct_sel{
      border: 0 !important;  /*Removes border*/
      -webkit-appearance: none;  /*Removes default chrome and safari style*/
      -moz-appearance: none; /* Removes Default Firefox style*/
      background: url('<?php echo $search_distirct?>') repeat-x;  /*Adds background-image*/
      background-size: 100%;
      width: 180px; /*Width of select dropdown to give space for arrow image*/
      height: 48px;
      text-indent: 0.01px; /* Removes default arrow from firefox*/
      text-overflow: "";  /*Removes default arrow from firefox*/
      /*My custom style for fonts*/
      color: <?php echo $search_color;?>;
      padding-left:70px;
      font-size:	1.0em;
}

.top3info{
	background-image: url('<?php echo $search_box?>');
	background-size: 100%;
}

.orText{
	color: <?php echo $search_color;?>;
	font-weight: bold;
}
</style>
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
	window.location = 'searchresult.php?cate=<?php echo $category;?>&district='+$('#distirct').val()+'&keyword='+$('#search_tages').val();
}
</script>
<table class="search_tb">
<tr>
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
<!-- 	<td><img src="<?php echo $search_or;?>"></td> -->
	<th><span class="content-center content-Text5 orText"><?php echo autoLang('或','OR');?></span></th>
	<td><input type="text" id="search_tages" class="search_input"></td>
	<td><button class="search_btn content-Text5 content-bold"/><?php echo autoLang('搜尋','Go');?></button></td>
</tr>
</table>