<div class="di"
	style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
		<?php
		$ads = $Ad->all(['sh' => 1]);
		foreach ($ads as $ad) {
			echo $ad['text'];
			echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		?>
	</marquee>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<h3>更多消息顯示區</h3>
	<hr>
	<?php
	$all = $News->count(['sh' => 1]);
	$div = 5;
	$pages = ceil($all / $div);
	$now = $_GET['p'] ?? 1;
	$start = ($now - 1) * $div;
	$news = $News->all(['sh' => 1], " LIMIT $start,$div");
	?>
	<ol start='<?=$start+1;?>'>
		<?php 
		foreach($news as $new) {
			echo "<li class='sswww'>";
			echo mb_substr($new['text'], 0 , 25);
			echo "<span class='all' style='display:none'> ";
			echo $new['text'];
			echo "</span> ";
			echo "</li ";
		}
	?>
</ol>
</div>
<div id="alt"
	style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
</div>
<script>
	$(".sswww").hover(
		function() {
			$("#alt").html("" + $(this).children(".all").html() + "").css({
				"top": $(this).offset().top - 50
			})
			$("#alt").show()
		}
	)
	$(".sswww").mouseout(
		function() {
			$("#alt").hide()
		}
	)
</script>