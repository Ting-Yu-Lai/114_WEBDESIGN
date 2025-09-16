<style>
    .lists {
        width: 210px;
        height: 240px;
        margin: 0 auto;
        overflow: hidden;
        position: relative;
        /* background-color: blue; */
    }

    .poster {
        position: absolute;
        width: 210px;
        height: 240px;
        display: none;
    }

    .poster img {
        width: 200px;
        height: 220px;
    }

    .controls {
        display: flex;
        align-items: center;
        justify-content: space-around;
    }

    .btns {
        width: 320px;
        height: 120px;
        /* background-color: lightblue; */
        display: flex;
        overflow: hidden;
    }

    .poster-btn {
        width: 80px;
        height: 100px;
        flex-shrink: 0;
        position: relative;
    }

    .poster-btn img {
        width: 70px;
        height: 90px;
    }
</style>
<?php
$rows = $Rr->all(['sh' => 1], " order by `rank` ");
?>
<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
            <div class="lists">
                <?php
                foreach ($rows as $row):
                ?>
                    <div class="poster" data-ani="<?= $row['ani']; ?>" data-id="<?= $row['id']; ?>">
                        <img src="./image/<?= $row['img']; ?>" alt="">
                        <div style="text-align: center;"><?= $row['name']; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="controls">
                <div class="left" style="width: 18px;"><img src="./icon/left.jpg" alt=""></div>
                <div class="btns">
                    <?php
                    foreach ($rows as $key => $row): ?>
                        <div class="ct poster-btn" data-ani="<?= $row['ani']; ?>" data-id="<?= $row['id']; ?>">
                            <img src="./image/<?= $row['img']; ?>" alt="">
                            <div style="text-align: center;"><?= $row['name']; ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="right" style="width: 18px;"><img src="./icon/right.jpg" alt=""></div>
            </div>
        </div>
    </div>
</div>
<script>
    //秀出當前第一張圖片
    // $('.poster').eq(0).show()
    let rank = 0;
    $('.poster').eq(rank).show();

    let slider = setInterval(() => {
        animater();
    }, 2000);

    $(".btns").hover(
        function() {
            clearInterval(slider);
        },
        function() {
            slider = setInterval(() => {
                animater();
            }, 2000);
        }
    )

    $(".poster-btn").on("click",function(){
        let idx = $(this).index();
        // console.log(idx);
        animater(idx);  
    })


    function animater(r) {
        //拿到當前顯示
        let now = $('.poster:visible');
        rank++;
        if(r == undefined) {
            if (rank > $(".poster").length - 1) {
                rank = 0;
            }
        }else{
            rank=r;
        }

        let next = $('.poster').eq(rank);

        let ani = $(now).data("ani");
        switch (ani) {
            case 1:
                $(now).fadeOut(1000);
                $(next).fadeIn(1000);
                break;
            case 2:
                $(now).hide(1000);
                $(next).show(1000);
                break;
            case 3:
                $(now).slideUp(1000);
                $(next).slideDown(1000);
                break;
        }
    }

    let p = 0;
    $(".left,.right").on("click",function(){
        let arrow = $(this).attr("class");
        switch(arrow) {
            case 'left':
                if(p>0) {
                    p-- ;
                }
                break;
            case 'right':
                if(p < $('.poster-btn').length-4) {
                    p++;
                }
                break;
        }
        $(".poster-btn").animate({right:p*80},500);
    })

</script>

<style>
    .movie-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
        align-content: space-evenly;
        height: 320px;
        
    }
    .movie {
        width: 48%;
        display: flex;
        min-height: 130px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        font-size: 12px;
        flex-wrap: wrap;
    }
</style>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <div class="movie-list">
            <?php
                $today = date("Y-m-d");
                $ondate = date("Y-m-d", strtotime("-2 days",strtotime($today)));
                
                $div = 4;
                $all = count($Vv->all(['sh'=>1]," and ondate between '$ondate' and '$today'"));
                $page = ceil($all/$div);
                $now = $_GET['p']??'1';
                $start = ($now - 1)*$div;
                $rows = $Vv->all(['sh'=>1]," and ondate between '$ondate' and '$today' limit $start,$div");
                foreach($rows as $row):
            ?>
            <div class="movie">
                <div style="display: flex;width:100%;">
                    <div style="width: 28%;display:flex;align-items:center;justify-content:center;" >
                        <img style="width: 100%;height:80%;border:1px solid white" src="./image/<?=$row['img'];?>" alt="">
                    </div>
                    <div style="width: 70%;display:flex;flex-direction:column;font-size:12px;margin:auto">
                        <div><?=$row['name'];?></div>
                        <div>
                            分級: <img src="./icon/03C0<?=$row['lv'];?>.png" style="width: 18px;height:18px" alt="">
                            <?= $vvLv[$row['lv']];?>
                        </div>
                        <div>上映日期:<?= str_replace("-","/",$row['ondate']);?></div>
                        <div>
                            <button type="button" onclick="location.href='?do=intro&id=<?=$row['id'];?>'">劇情介紹</button>
                            <button type="button" onclick="location.href='?do=order&id=<?=$row['id'];?>'">線上訂票</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div class="ct">
            <?php if($now - 1 > 0):?>
                <a href="index.php?p=<?=($now - 1);?>"> < </a>
            <?php endif;?>
            <?php
                for($i=1;$i<=$page;$i++):
                    $size = ($now == $i)?'24px':'';
            ?>
                <a href="index.php?p=<?=$i;?>" style="font-size: <?=$size;?>;"><?=$i;?></a>
            <?php endfor;?>
            <?php if($now + 1 <= $page):?>
                <a href="index.php?p=<?=($now + 1);?>"> > </a>
            <?php endif;?>
        </div>
    </div>
</div>