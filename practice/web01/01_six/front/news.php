<div class="di"
    style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
        <?php $row = $Ad->all(['sh'=>1]);
        foreach($row as $r){
            echo $r['text'];
            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        ?>
    </marquee>
    <div style="height:32px; display:block;">
        <h3>更多消息顯示區</h3>
    </div>
    <hr>
    <?php 
    $all = $News->count(['sh'=>1]);
    $div=5;
    $now = $_GET['p']??1;
    $page = ceil($all/ $div);
    $start = ($now - 1)*$div;
    $news = $News->all(['sh'=>1], " limit $start,$div");
    ?>
    <ol start='<?=$start+1;?>'>
        <?php foreach($news as $n):?>
            <li class="sswww">
                <?= mb_substr($n['text'],0,25);?>
                <span class="all" style="display: none;">
                    <?=$n['text'];?>
                </span>
            </li>
        <?php endforeach;?>
    </ol>
    <!--正中央-->
    <div style="text-align:center;">
        <?php if($now - 1 > 0):?>
            <a href="?do=news&p=<?=$now -1;?>"> < </a>
            <?php endif;?>
            <?php for($i=1;$i<=$page;$i++): $size=($now == $i)?'48px':'';?>
            <a href="?do=news&p=<?=$i;?>" style="font-size: <?=$size;?>;"><?=$i;?></a>
                <?php endfor;?>
        <?php if($now + 1 <= $page):?>
            <a href="?do=news&p=<?=$now + 1;?>"> > </a>
            <?php endif;?>
    </div>
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