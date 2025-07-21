﻿<?php include_once "./api/db.php";?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>健康促進網</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/js.js"></script>

</head>

<body>

    <div id="all">
        <div id="title">
            <!-- 用程式碼改變時間，去更動電腦系統時間讓他可以做改動 -->
            <?=date("m 月 d 日 l");?> | 今日瀏覽: <?=$Visit->find(['date'=>date("Y-m-d")])['visit'];?> |
            累積瀏覽:<?=$Visit->sum('visit');?>
            <!-- 製作回首頁的功能 -->
            <a href="index.php" style="float:right;">回首頁</a>
        </div>
        <div id="title2">
            <!-- 實際題目需要的是title出現的文字 -->
            <a href="index.php">
                <img src="./icon/02B01.jpg" alt="健康促進網-回首頁" title="健康促進網-回首頁">
            </a>
        </div>
        <div id="mm">
            <div class="hal" id="lef">
                <a class="blo" href="?do=po">分類網誌</a>
                <a class="blo" href="?do=news">最新文章</a>
                <a class="blo" href="?do=pop">人氣文章</a>
                <!-- 講座訊息的網址不需要有檔案 -->
                <a class="blo" href="?do=know">講座訊息</a>
                <a class="blo" href="?do=que">問卷調查</a>
            </div>
            <div class="hal" id="main">
                <div>
                    <!-- 輸入marquee，並且需要限制寬度，因為會員登入還有其他功能標籤要顯示
					寬度80%需要設定div 並且設定flex
					最快的方式設定width:78%，或者把span貼在/marquee後面-->
                    <marquee behavior="" direction="" style="width:78%">
                        請民眾踴躍投稿電子報，讓電子報成為大家相互交流、分享的園地！詳見最新文章
                    </marquee>

                    <span style="width:20%; display:inline-block;">
                        <?php
                            if(isset($_SESSION['login'])) {
                                if($_SESSION['login']=='admin') {   
                                    echo "歡迎" . $_SESSION['login'];
                                    echo "<br>";
                                    echo "<button>管理</button>";
                                    echo "|";
                                    echo "<button onclick=\"location.href='./api/logout.php'\">登出</button>";
                                }else {
                                    echo "歡迎" . $_SESSION['login'];
                                    echo "<button onclick=\"location.href='./api/logout.php'\">登出</button>";
                                }
                            }else {
                                echo "<a href='?do=login'>會員登入</a>";

                            }
                        ?>
                    </span>
                    <!-- 設定一個CSS -->
                    <div class="content">
                        <?php 
							$do = $_GET['do'] ?? 'main';
							$file = "./front/" .$do .".php";
							if(file_exists($file)) {
								include_once $file;
							}else {
								include_once "./front/main.php";
							}
						?>
                    </div>
                </div>
            </div>
        </div>
        <div id="bottom">
            本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2012健康促進網社群平台 All Right Reserved
            <br>
            服務信箱：health@test.labor.gov.tw<img src="./icon/02B02.jpg" width="45">
        </div>
    </div>

</body>

</html>