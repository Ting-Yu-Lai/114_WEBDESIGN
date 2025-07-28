<style>
    .movie {
        width: 1000px;
        max-height: 500px;
        background-color: #ccc;
        display: flex;

        flex-wrap: wrap;
        overflow-x: auto;
    }

    .content {
        width: 100%;
        height: auto;
        display: flex;
        margin-bottom: 10px;
    }

    .box3 {
        width: 74%;
        height: 150px;
        /* background-color: blue; */
        display: flex;
        /* justify-content: center; */
        flex-wrap: wrap;
    }

    .col1 {
        width: 100%;
    }

    .col2 {
        width: 100%;
    }

    .col3 {
        width: 100%;
    }

    a {
        text-decoration: none;
        color: white;
    }
</style>

<div class="movie">
    <div class="btn-box" style="width: 100%;height:40px;margin-top:10px;margin-left:3px;">
        <button type="button">
            <a href="?do=add_movie">
                新增電影
            </a>
        </button>
    </div>
    <?php
    $movies = $Movie->all(' order by `rank`');
    foreach ($movies as $idx => $movie):
    $prev = ($idx - 1 >= 0)?$movies[$idx - 1]['id']:$movie['id'];
    $next = ($idx + 1 < count($movies))?$movies[$idx + 1]['id']:$movie['id'];
    ?>
        <div class="content" style="width: 100%;">
            <div class="poster ct" style="width: 15%;">
                <img src="./image/<?= $movie['poster'] ?>" style="width: 100px;height120px;" alt="">
            </div>
            <div class="level ct" style="width: 8%;">
                分級:<img src="./icon/03C0<?=$movie['level'];?>.png" style="width: 20px;height:20px;" alt="">
            </div>
            <div class="box3">
                <div class="col1" style="display: flex;justify-content: space-between;">
                    <div>片名:<?=$movie['name'];?></div>
                    <div>片長:<?=$movie['lenght'];?></div>
                    <div>上映時間:<?=$movie['ondate'];?></div>
                </div>
                <div class="col2" style="display: flex;justify-content: start;">
                    <button class="sh-btn" data-id="<?=$movie['id'];?>"><?=($movie['sh']==1)?'顯示':'隱藏';?></button>
                    <button onclick="sw(<?=$movie['id'];?>, <?=$prev;?>, 'Movie')">往上</button>
                    <button onclick="sw(<?=$movie['id'];?>, <?=$next;?>, 'Movie')">往下</button>
                    <button onclick="location.href='?do=edit_movie&id=<?=$movie['id'];?>'">編輯電影</button>
                    <button class="del-btn" data-id="<?=$movie['id'];?>">刪除電影</button>
                </div>
                <div class="col3" style="display: flex;justify-content: start;">
                    劇情介紹:<?=$movie['intro'];?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<script>
    function sw(id, sw, table) {
        $.post('./api/sw.php',{table, id, sw}, ()=> location.reload());
    }

    $('.edit-btn').on('click',function(){
        let id = $(this).data('id');

    })

    $('.sh-btn').on('click',function(){
        // console.log('click ok');
        
        let id = $(this).data('id');
        // console.log(id);
        $.post("./api/sh.php",{id},()=>{
            switch(id) {
                case '顯示':
                    $(this).text('隱藏');
                    break
                case '隱藏':
                    $(this).text('顯示');
                    break
            }
            location.reload();
        })
    })
</script>