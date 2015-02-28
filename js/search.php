function setSearchUI(){
	$(".search_btn").click(function() {
  		searchSubmit();
	});
	var availableTags = ["ActionScript","AppleScript","Asp","BASIC","C","C++","Clojure","COBOL","ColdFusion","Erlang","Fortran","Groovy","Haskell","Java","JavaScript","Lisp","Perl","PHP","Python","Ruby","Scala","Scheme"];
	
    $("#search_tages").autocomplete({
      source: availableTags
    });	
}
function searchSubmit(){
	alert("Submit!!");
}
</script>
<span class="content-center content-gray">CHOOSE THE BEST FOR THEM!</span>
<table class="search_tb">
<tr>
	<td>
		<select id="category" class="category_sel">
		<option> 18 per page</option>
        <option> 10 per page</option>
        <option> 5 per page</option>
		</select>
	</td>
	<td>
		<select id="distirct" class="distirct_sel">
		<option> Islands </option>
		<option> Kwai Tsing </option>
		<option> Sai Kung </option>
		<option> Sha Tin </option>
		<option> Tai Po </option>
		<option> Tsuen Wan </option>
		<option> Tuen Mun </option>
		<option> Yuen Long </option>
		<option> Sham Shui Po </option>
		<option> Kowloon City </option>
		<option> Kwun Tong </option>
		<option> Wong Tai Sin </option>
		<option> Yau Tsim Mong </option>
		<option> Central and Western </option>
		<option> Eastern </option>
		<option> Southern </option>
		<option> Wan Chai </option>
		</select>		
	</td>
	<td><img src="images/search_OR.png"></td>
	<td><input type="text" id="search_tages" class="search_input"></td>
	<td><button src="images/search_btn.png" class="search_btn"/></td>
</tr>
</table>