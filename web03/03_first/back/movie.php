<style>
    .movie {
        display: flex;
        width:95%;
        margin: auto;
        flex-wrap: wrap;
        /* box-shadow:0px 3px #999; */
        margin-bottom: 20px;
    }

    .movie > div:nth-child(1) {
        width: 15%;
        height:100px;
        display: flex;
        align-items: center;
        justify-content: center;
    } 
    .movie > div:nth-child(2) {
        width: 15%;
        height:100px;
    } 
    .movie > div:nth-child(3) {
        width: 69%;
        height:100px;
    } 

    .movie > div:nth-child(3) > div:nth-child(1){
        display: flex;
        width: 100%;
        justify-content: space-between;
    } 
    .movie > div:nth-child(3) > div:nth-child(2){
        display: flex;
        width: 100%;

    } 
    .movie > div:nth-child(3) > div:nth-child(3){
        display: flex;
        width: 100%;
        justify-content: space-between;

    } 
    .movie > div:nth-child(3) > div{
        width: 33%;
    } 

    a {
        text-decoration: none;
        color: white;
    }
</style>
<button>
    <a href="?do=add_movie">
        新增電影
    </a>
</button>
<hr>
<?php
    $movies = $Movie->all(" order by `rank`");
    // 要做排序所以要給每個資料一個編號
    foreach($movies as $idx => $movie):
    $prev = ($idx - 1 >= 0) ? $movies[$idx - 1]['id'] : $movie['id'];
    $next = ($idx + 1 < count($movies)) ? $movies[$idx + 1]['id'] : $movie['id'];
?>
<div class="movie">
    <div>
        <img src="./image/<?=$movie['poster'];?>" style="width: 60px;height:80px;" alt="">
    </div>
    <div>分級：<img src="./icon/03C0<?= $movie['level'];?>.png" style="width: 20px;"></div>
    <div>
        <div>
            <div>片名：<?=$movie['name'];?></div>
            <div>片長：<?=$movie['length'];?></div>
            <div>上映時間：<?=$movie['ondate'];?></div>
        </div>
        <div>
            <button class="sh-btn" data-id="<?=$movie['id'];?>"> <?=($movie['sh']==1)?'顯示':'隱藏';?></button>
            <button class="sw-btn" onclick="sw(<?= $movie['id'];?>, <?= $prev;?>, 'Movie')">往上</button>
            <button class="sw-btn" onclick="sw(<?= $movie['id'];?>, <?= $next;?>, 'Movie')">往下</button>
            <button onclick="location.href='?do=edit_movie&id=<?=$movie['id'];?>'">編輯電影</button>
            <button class="del-btn" data-id="<?=$movie['id'];?>">刪除電影</button>
        </div>
        <div>劇情介紹：<?=$movie['intro'];?></div>
    </div>
</div>
<?php endforeach;?>
<script>
    // 顯示隱藏功能
    $('.sh-btn').on('click',function(){
        let id = $(this).data('id');
        $.post("./api/sh_movie.php",{id},()=>{
            switch(id) {
                case "顯示":
                    $(this).text('隱藏');
                    break
                case "隱藏":
                    $(this).text('顯示');
                    break
            }
            location.reload();
        })
    })

    $('.del-btn').on('click',function() {
        // console.log('click ok');
        
        let id = $(this).data('id');
        // console.log('id:',id);
        if(confirm("確定刪除這部電影嗎?")) {
            $.post("./api/del.php",{table:'Movie',id},()=>{
                location.reload();
            })
        }
    })

    function sw(id, sw, table) {
        $.post('./api/sw.php',{table, id, sw },()=>location.reload());
    }

</script>