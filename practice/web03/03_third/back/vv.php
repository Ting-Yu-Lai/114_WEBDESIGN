<style>
    .container {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 440px;
        overflow: auto;
        background-color: #ddd;
    }

    .row {
        display: flex;
        width: 100%;
        height: 120px;
        /* background-color: lightblue; */
    }

    .col1 {
        width: 10%;
        height: 100%;
    }
    .col1 img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .col2 {
        width: 10%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .col3 {
        width: 80%;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .col31 {width: 100%;height: 20%;display: flex;justify-content: space-between;}
    .col32 {width: 100%;height: 20%;display: flex;justify-content: flex-end;}
    .col33 {width: 100%;height: 60%;display: flex;}
</style>
<?php
    if(isset($_GET['id'])) {
        $Vv->del($_GET['id']);
    }
?>
<button onclick="location.href='?do=addVv'">新增電影</button>
<hr>
<div class="container">
    <?php 
    $rows = $Vv->all(' order by `rank`');
    foreach($rows as $idx => $row):
        $prev = ($idx - 1 >= 0)?$rows[$idx-1]['id']:$row['id'];
        $next = ($idx + 1 < count($rows))?$rows[$idx+1]['id']:$row['id'];
    ?>
    <div class="row">
        <div class="col1">
            <img src="./image/<?=$row['img'];?>" alt="">
        </div>
        <div class="col2">分級:
            <img src="./icon/03C0<?=$row['lv'];?>.png" style="width: 18px;height:18px;" alt="">
        </div>
        <div class="col3">
            <div class="col31">
                <div>片名:<?=$row['name'];?></div>
                <div>片長:<?=$row['lenght'];?></div>
                <div>上架時間:<?=$row['ondate'];?></div>
            </div>
            <div class="col32">
                <div><button class="showBtn" onclick="show(<?=$row['id'];?>)"><?=($row['sh']==1)?'顯示':'隱藏';?></button></div>
                <div><button onclick="sw(<?=$row['id'];?>,<?=$prev;?>,'Vv')">往上</button></div>
                <div><button onclick="sw(<?=$row['id'];?>,<?=$next;?>,'Vv')">往下</button></div>
                <div><button onclick="location.href='?do=editVv&id=<?=$row['id'];?>'">編輯</button></div>
                <div><button onclick="del(<?=$row['id'];?>)">刪除</button></div>
            </div>
            <div class="col33"><?=$row['intro'];?></div>
        </div>
    </div>
    <?php endforeach;?>
</div>
<script>
    function show(id) {
        $.post("./api/show.php",{id},function(){
            // let btn = $(`.showBtn[onclick="show(${id})"]`);
            location.reload();
            // console.log(res)
            // btn.text(res == 1?'顯示':'隱藏');
        })
    }

    function del(delid) {
        if(confirm("確定要刪除這部電影嗎?")) {
            let id = delid;
            location.href=`?do=vv&id=${id}`;
        }
    }

    function sw(id1, id2, table) {
        $.post("./api/sw.php",{id1,id2,table},function(res){
            // console.log(res);
            location.reload();
        })
    }
</script>