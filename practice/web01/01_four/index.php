<?php include_once "./api/db.php"; ?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>卓越科技大學校園資訊系統</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-3.4.1.min.js"></script>
	<script src="./js/js.js"></script>
</head>

<body>
	<div id="cover" style="display:none; ">
		<div id="coverr">
			<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
			<div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
		</div>
	</div>
	<div id="main">
		<a title="<?= $Title->find(['sh' => 1])['text']; ?>" href="index.php">
			<div class="ti" style="background:url('images/<?= $Title->find(['sh' => 1])['img']; ?>'); background-size:cover;"></div>
			<!--標題-->
		</a>
		<div id="ms">
			<div id="lf" style="float:left;">
				<div id="menuput" class="dbor">
					<!--主選單放此-->
					<span class="t botli">主選單區</span>
					<!-- 我要把主選單拿出來 所以是main_id=>0 -->
					<?php $mains = $Menu->all(['main_id' => 0]);
					foreach ($mains as $main) {
						// 記得加上主選單的class mainmu
						echo "<div class='mainmu'>";
						echo "<a href='{$main['href']}'>";
						echo $main['text'];
						echo "</a>";
						// 之後要把次選單拿出來 要去判斷main_id 跟 id 一樣的東西 還要判斷有沒有才顯示 
						if ($Menu->all(['main_id' => $main['id']]) > 0) {
							$subs = $Menu->all(['main_id' => $main['id']]);
							// 記得自己弄出css:mw display:none
							echo "<div class='mw'>";
							foreach ($subs as $sub) {
								// 然後再套上屬於次選單的css
								echo "<div class='mainmu2'>";
								echo "<a href='{$sub['href']}'>";
								echo $sub['text'];
								echo "</div>";
								echo "</a>";
							}
							echo "</div>";
						}
						echo "</div>";
					}
					?>
				</div>
				<div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
					<span class="t">進站總人數 :
						<?php $t = $Total->find(1)['total'];
						echo $t;
						?>
					</span>
				</div>
			</div>
			<?php

			$do = $_GET['do'] ?? 'main';
			$file = "./front/" . $do . ".php";
			if (file_exists($file)) {
				include_once $file;
			} else {
				include_once "./front/main.php";
			}
			?>

			<div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
				<!--右邊-->

				<?php
				if (!isset($_SESSION['login'])): ?>
					<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;"
						onclick="lo('?do=login')">
						管理登入
					</button>
				<?php else: ?>
					<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;"
						onclick="lo('backend.php?do=title')">
						返回管理頁面
					</button>
				<?php endif; ?>
				<div style="width:89%; height:480px;" class="dbor">
					<span class="t botli">校園映象區</span>
					<div class="cent" onclick="pp(1)">
						<img src="./icon/up.jpg" alt="">
					</div>
					<div class="cent">
						<?php
						$images = $Image->all(['sh' => 1]);
						// 需要把每一張圖片加上一個獨特的 id 名稱，像是：
						// <div class="cent im" id="ssaa0">
						// <div class="cent im" id="ssaa1">
						// <div class="cent im" id="ssaa2">
						foreach ($images as $key => $image):
						?>
						<!-- 為什麼需要im 因為下面im會把其他內容hide起來 -->
							<div class="cent im" id="ssaa<?= $key;?>">
								<img src="./images/<?= $image['img']; ?>" style="width:150px;height:103px;border:3px solid orange;margin:2px;" alt="">
							</div>
						<?php endforeach; ?>
						<div class="cent" onclick="pp(2)">
							<img src="./icon/dn.jpg" alt="">
						</div>
					</div>
					<script>
						var nowpage = 0,
							num = <?= $Image->count(['sh' => 1]); ?>;

						function pp(x) {
							var s, t;
							if (x == 1 && nowpage - 1 >= 0) {
								nowpage--;
							}
							if (x == 2 && (nowpage + 1) * 3 <= num * 1 + 3) {
								nowpage++;
							}
							$(".im").hide()
							for (s = 0; s <= 2; s++) {
								t = s * 1 + nowpage * 1;
								$("#ssaa" + t).show()
							}
						}
						pp(1)
					</script>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div
			style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
			<span class="t" style="line-height:123px;">
				<?= $Bottom->find(1)['bottom'];?>
			</span>
		</div>
	</div>

</body>

</html>