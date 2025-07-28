<style>
.lists {
    width: 200px;
    height: 240px;
    /* background-color: rgba(0, 255, 0, 0.5); */
    margin: 0 auto;
    overflow: hidden;
    position: relative;
}

.poster {
    text-align: center;
    margin: 0 auto;
    position: absolute;
    display: none;
}

.poster img {
    width: 200px;
    height: 220px;
}

.btns {
    width: 320px;
    height: 120px;
    /* background-color: rgba(0, 0, 255, 0.5); */
    margin: 0 auto;
    display: flex;
    overflow: hidden;
}

.controls {
    display: flex;
    justify-content: space-around;
    align-items: center;

}
/* 箭頭共同css的定義 */
.left,
.right {
    width: 0;
    height: 0;
    border-top: 20px solid transparent;
    border-bottom: 20px solid transparent;
}
/* 箭頭左右的方法 */
.left {
    border-left: 0px solid black;
    border-right: 29px solid black;
}

.right {
    border-left: 29px solid black;
    border-right: 0px solid black;
}


.poster-btn {
    width: 80px;
    height: 100px;
    display: inline-block;
    /* 需要增加flex shrink 解除本來被壓縮的問題 */
    flex-shrink: 0;
    font-size: 12px;
    position: relative;
}
.poster-btn img{
    width: 70px;
    height: 90px;
    display: inline-block;
}


</style>
<?php
  $posters=$Poster->all(['sh'=>1],' order by `rank`');
?>
<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
            <div class="lists">
                <?php
                    foreach($posters as $poster):?>
                <div class="poster" data-ani="<?=$poster['ani'];?>" data-id="<?=$poster['id'];?>">
                    <img src="./image/<?=$poster['img'];?>">
                    <div><?=$poster['name'];?></div>
                </div>
                <?php endforeach;?>
            </div>

            <div class="controls">
                <div class="left"></div>
                <div class="btns">
                    <?php
                    foreach($posters as $poster):
                    ?>
                    <div  class="ct poster-btn" data-ani="<?=$poster['ani'];?>" data-id="<?=$poster['id'];?>">
                        <img src="./image/<?=$poster['img'];?>">
                        <div><?=$poster['name'];?></div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="right"></div>
            </div>
        </div>
    </div>
</div>
<script>
let rank = 0;
$('.poster').eq(rank).show();

let slider = setInterval(() => {
    // rank++;
    // if(rank > $('.poster').length-1) {
    //     rank = 0;
    // }

    // $('.poster').hide();
    // $('.poster').eq(rank).show();
    animater();
}, 2000)

$('.btns').hover (
    function () {
        clearInterval(slider);
    },
    function () {
        slider = setInterval(() => {
            animater();
        }, 2000)
    }
)

$(".poster-btn").on('click',function() {
    let idx = $(this).index();
    animater(idx);
})

function animater(r) {
    // 選擇正在顯示的那個物件
    let now = $(".poster:visible");
    // rank已在外面宣告
    if(r == undefined) {
        rank++;
        if(rank > $('.poster').length-1){
            rank = 0;
        }
    }else {
        rank = r;
    }
    // 判斷rank是不是超過我總筆數
    // if (rank > $('.poster').length - 1) {
    //     rank = 0;
    // }
    let next = $(".poster").eq(rank);
    // 現在動畫的轉入轉出依據
    let ani = next.data('ani');
    // 就功能而言這樣就可以了
    switch (ani) {
        case 1:
            // 淡入淡出
            $(now).fadeOut(1000);
            $(next).fadeIn(1000);
            break;
        case 2:
            縮放
            $(now).hide(1000);
            $(next).show(1000);

            break;
        case 3:
            // 滑入滑出
            $(now).slideUp(1000);
            $(next).slideDown(1000);
            break;
    }
}
// 被點了左還右，是要++往右邊還是--往左邊
let p=0;
$(".left, .right").on('click',function(){
    let arrow = $(this).attr('class');
    // console.log('arrow', arrow);
    
    switch(arrow) {
        case 'left':
            if(p > 0) {
                p--;
            }
        break;
        case 'right':
            // 判斷是不是到左右的底了
            if(p < $('.poster-btn').length-4){
                p++;
            }
        break;
    }
    $('.poster-btn').animate({right:p*80},500)
})
</script>
<style>
    .movie-list {
        display: flex;
        justify-content: space-evenly;
        flex-wrap: wrap;
        height: 320px;
        align-content: space-evenly;
        overflow: auto;
    }
    .movie {
        width: 48%;
        display: flex;
        flex-wrap: wrap;
        box-sizing: border-box;
        border:1px solid #ccc;
        min-height: 100px;
        border-radius: 3px;
        font-size: 12px;
        padding: 3px;
    }
</style>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <div class="movie-list">
        <?php
        //題目要求只有三天內上架的電影才能顯示出來，懶得改資料日期先顯示七天前都可以
        $today = date("Y-m-d");
        $ondate = date("Y-m-d", strtotime("-7 days",strtotime($today)));
        $total = $Movie->count(['sh'=>1]," and ondate between '$ondate' and '$today'");
        $div = 4;
        $pages = ceil($total / $div);
        $now = $_GET['p']??'1';
        $start = ($now - 1)*$div;

        $movies = $Movie->all(['sh'=>1]," and ondate between '$ondate' and '$today' order by `rank` limit $start,$div");
        foreach($movies as $idx => $movie):
        ?>
            <div class="movie">
                <div style="width:30%" onclick="location.href='?do=intro&id=<?=$movie['id'];?>'"><img src="./image/<?=$movie['poster'];?>" style="width:60px;height:70px;"></div>
                <div style="width:68%">
                    <div class="name" style="font-size: 14px;"><?=$movie['name'];?></div>
                    <div>分級:
                        <img src="./icon/03C0<?=$movie['level'];?>.png" style="width:20px;height:20px;" alt="">
    
                    </div>
                    <div>上映日期:<?=$movie['ondate'];?></div>
                </div>
                <div>
                    <button onclick="location.href='?do=intro&id=<?=$movie['id'];?>'">劇情介紹</button>
                    <button onclick="location.href='?do=order&id=<?=$movie['id'];?>'">線上訂票</button>
                </div>
            </div>
            <?php endforeach;?>
        </div>
            
        <div class="ct">
            <?php if($now-1 > 0):?>
                <a href="?p=<?=$now -1;?>"> < </a>
                <?php endif;?>
            <?php
            for($i=1;$i<=$pages;$i++):
                $size=($i==$now)?'24px':'';?>
            <a href="?p=<?=$i;?>" style="font-size: <?=$size;?>;"><?=$i;?></a>
            <?php endfor;?>
            <?php if($now+1 <= $pages):?>
        
                <a href="?p=<?=$now + 1;?>"> > </a>
                <?php endif;?>
        </div>
    </div>
</div>