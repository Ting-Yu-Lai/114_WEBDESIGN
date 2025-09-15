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
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <table>
            <tbody>
                <tr></tr>
            </tbody>
        </table>
        <div class="ct"> </div>
    </div>
</div>