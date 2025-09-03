<style>
    .title {
        cursor: pointer;
        color:blue;
    }
    .title:hover{
        text-decoration: underline;
        color:green;
    }
</style>
<fieldset>
    <legend  style="margin-bottom: 20px;">
        <div class="nav">
            目前位置: 首頁 > 最新文章區
        </div>
    </legend>
    <table style="width:95%;margin:auto">
        <tr class="ct">
            <td width="20%">標題</td>
            <td width="60%">內容</td>
            <td></td>
        </tr>
        <?php
        $all = $News->count();
        $div = 5;
        $page = ceil($all/$div);
        $now = $_GET['p']??1;
        $start = ($now - 1)*$div;
        $rows = $News->all("limit $start,$div");
        foreach($rows as $row):
        ?>
            <tr class="ct">
            <td width="20%" class="title"><?=$row['title'];?></td>
            <td width="60%">
                <div class="short"><?=mb_substr($row['text'],0,30);?>...</div>
                <div class="all" style="display: none;"><?=nl2br($row['text']);?></div>
            </td>
            <td>
                <?php 
                    if(isset($_SESSION['login'])):
                        $chk = $Log->count(['news'=>$row['id'],'user'=>$_SESSION['login']]);
                ?>
                    <a href="#" onclick="good(<?=$row['id'];?>)"><?=($chk)?'收回讚':'讚';?></a>
                <?php endif;?>
            </td>
        </tr>
        <?php endforeach;?>
    </table>
    <div class="ct">
        <?php if($now - 1 > 0):?>
            <a href="?do=news&p=<?=$now - 1;?>"> < </a>
        <?php endif;?>
        <?php for($i = 1; $i <= $page; $i++): $size = ($now == $i)?'24px':'';?>
            <a href="?do=news&p=<?=$i;?>" style="font-size: <?=$size;?>"><?=$i;?></a>
        <?php endfor;?>
        <?php if($now + 1 <= $page):?>
            <a href="?do=news&p=<?=$now + 1;?>"> > </a>
        <?php endif;?>
    </div>
</fieldset>
<script>
    $(".title").on("click",function(){
        $(this).next().find(".short,.all").toggle();
    })
    // news 是傳送該文章的id
    function good(news) {
        // console.log(news);
        $.post("./api/good.php",{news},function(){
            // console.log(res);
            location.reload();
        })
    }
</script>