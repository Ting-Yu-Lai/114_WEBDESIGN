<style>
.lists {
    width: 200px;
    height: 240px;
    /* background-color: rgba(0, 255, 0, 0.5); */
    margin: 0 auto;
    overflow: hidden;
    position: relative;
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

function animater() {
    // 選擇正在顯示的那個物件
    let now = $(".poster:visible");
    // rank已在外面宣告
    rank++;
    // 判斷rank是不是超過我總筆數
    if (rank > $('.poster').length - 1) {
        rank = 0;
    }
    let next = $(".poster").eq(rank);
    // 現在動畫的轉入轉出依據
    let ani = $(now).date('ani');
    // 就功能而言這樣就可以了
    switch (ani) {
        case 1:
            // 淡入淡出
            $(now).fadeIn(1000);
            $(next).fadeOut(1000);
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
        $('.poster-btn').animate({right:p*80},500)
    }
})
</script>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <table>
            <tbody>
                <tr> </tr>
            </tbody>
        </table>
        <div class="ct"> </div>
    </div>
</div>