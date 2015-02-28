<script>
function setButtonUI(){
  	$(".education").click(function() {
  		window.location = 'category.php?cate=education';
	});
  	$(".outdoor").click(function() {
  		window.location = 'category.php?cate=outdoor';
	});
  	$(".medical").click(function() {
  		window.location = 'category.php?cate=medical';
	});
  	$(".party").click(function() {
  		window.location = 'category.php?cate=party';
	});
}
</script>
<div class="mainBtn">
	<table class="education">
	<tr>
		<td class="col1"><img src="images/education_icon01.png"></td>
		<td class="col2"><img src="images/education_line.png"></td>
		<td class="col3"><span class="content-Text4"><?php echo autoLang('教育','EDUCATION');?></span><br><span class="content-Text2"><?php echo autoLang('香港playgroup及幼稚園','Play Group + Nursery');?></span></td>
		<td class="col4"><span class="content-Text2"><?php echo autoLang('>>更多','>>MORE');?></span></td>
	</tr>
	</table>
</div>
<div class="mainBtn">
	<table class="outdoor">
	<tr>
		<td class="col1"><img src="images/outdoor_icon01.png"></td>
		<td class="col2"><img src="images/outdoor_line.png"></td>
		<td class="col3"><span class="content-Text4"><?php echo autoLang('戶外及課外活動','OUTDOOR');?></span><br><span class="content-Text2"><?php echo autoLang('課外活動','Extra Curricular Activities');?></span></td>
		<td class="col4"><span class="content-Text2"><?php echo autoLang('>>更多','>>MORE');?></span></td>
	</tr>
	</table>
</div>
<p></p>
<div class="mainBtn">
	<table class="medical">
	<tr>
		<td class="col1"><img src="images/medical_icon01.png"></td>
		<td class="col2"><img src="images/medical_line.png"></td>
		<td class="col3"><span class="content-Text4"><?php echo autoLang('醫療','MEDICAL');?></span></td>
		<td class="col4"><span class="content-Text2"><?php echo autoLang('>>更多','>>MORE');?></span></td>
	</tr>
	</table>
</div>
<div class="mainBtn">
	<table class="party">
	<tr>
		<td class="col1"><img src="images/party_icon01.png"></td>
		<td class="col2"><img src="images/party_line.png"></td>
		<td class="col3"><span class="content-Text4"><?php echo autoLang('休閒娛樂','PARTY');?></span><br><span class="content-Text2"><?php echo autoLang('記憶力','Memory');?></span></td>
		<td class="col4"><span class="content-Text2"><?php echo autoLang('>>更多','>>MORE');?></span></td>
	</tr>
	</table>
</div>