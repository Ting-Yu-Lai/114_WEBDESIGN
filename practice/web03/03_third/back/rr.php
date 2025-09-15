<style>
    .rrTab {
        width: 97%;
        height: 300px;
        margin: auto;
        overflow: auto;
        /* display: block; */
    }
</style>
<div style="height: 400px;">
    <h3 class="ct" style="margin: auto;">預告片清單</h3>
    <div class="ct" style="height:20px;display: flex;justify-content:space-around;background-color:#ddd;text-align:center;">
        <div>預告片海報</div>
        <div>預告片片名</div>
        <div>預告片排序</div>
        <div>預告片操作</div>
    </div>
    <div class="rrTab">
            <?php
                $rows = $Rr->all(' order by `rank`');
                foreach ($rows as $idx => $row):
                $prev = ($idx-1 >= 0)?$rows[$idx-1]['id']:$row['id'];
                $next = ($idx+1 < count($rows) )?$rows[$idx+1]['id']:$row['id'];
            ?>
            <div class="ct" style="display: flex;justify-content:space-around;text-align:center;">
                <div>
                    <img style="width: 70px;height:90px" src="./image/<?=$row['img'];?>" alt="">
                </div>
                <div><input type="text" name="name" id="name" value="<?=$row['name'];?>"></div>
                <div>
                    <button onclick="sw(<?=$row['id'];?>, <?=$prev?>, 'Rr')" type="button">往上</button>
                    <br>
                    <button onclick="sw(<?=$row['id'];?>, <?=$next?>, 'Rr')" type="button">往下</button>
                </div>
                <div>
                    <input type="checkbox" name="sh[]" id="sh" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>顯示
                    <input type="checkbox" name="del[]" id="del" value="<?=$row['id'];?>">刪除
                    <select name="ani[]" id="ani">
                        <option value="1" <?=($row['ani'] == 1)?'selected':'';?>>淡入淡出</option>
                        <option value="2" <?=($row['ani'] == 2)?'selected':'';?>>縮放</option>
                        <option value="3" <?=($row['ani'] == 3)?'selected':'';?>>滑入滑出</option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="id[]" value="<?=$row['id'];?>">
        <?php endforeach; ?>
    </div>
    <div class="ct" style="height: 20px;">
        <input type="submit" value="確定修改">
        <input type="reset" value="重置">
    </div>
</div>
<hr>
<div style="height: 100px;">
    <h3 class="ct" style="margin: auto;">新增預告片</h3>
    <form action="./api/addRr.php" method="post" enctype="multipart/form-data">
        <table class="ct" style="width: 100%;margin:auto;">
            <tr class="ct">
                <td>
                    <label for="img">預告片海報: </label><input type="file" name="img" id="img">
                </td>
                <td>
                    <label for="name">預告片片名: </label><input type="text" name="name" id="name">
                </td>
            </tr>
        </table>
        <div class="ct">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </form>
</div>

<script>
    function sw(id1, id2 ,table) {
        $.post("./api/sw.php",{id1, id2, table},function(res){
            // console.log(res);
            location.reload();
        })
    }
</script>