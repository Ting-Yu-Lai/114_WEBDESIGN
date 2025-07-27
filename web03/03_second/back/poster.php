<style>
    .full {
        /* max-height: 490px; */
        width: 100%;
        /* background-color: #ccc; */
        margin: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    .posterlist {
        width: 100%;
        height: 70%;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        flex-wrap: wrap;
    }

    .poster-item {
        width: 100%;
        max-height: 230px;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        flex-wrap: wrap;
        margin-top: 1px;
        overflow: auto;
    }

    .poster-item form {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        flex-wrap: wrap;
        margin-top: 1px;
    }

    .newposter {
        width: 100%;
        height: 30%;
    }

    .newtable {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .newtable tr {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<div class="full">
    <div class="posterlist">
        <h3 class="ct" style="width: 100%;">預告片清單</h3>
        <div style="background-color: #ccc;width:25%;text-align:center">預告片海報</div>
        <div style="background-color: #ccc;width:25%;text-align:center">預告片片名</div>
        <div style="background-color: #ccc;width:15%;text-align:center">預告片排序</div>
        <div style="background-color: #ccc;width:30%;text-align:center">操作</div>
        <div class="poster-item">
            <form action="./api/edit_poster.php" method="post">
                <?php
                $rows = $Poster->all(" order by `rank`");
                foreach ($rows as $idx => $row):
                    $prev = ($idx - 1 >= 0) ? $rows[$idx - 1]['id'] : $row['id'];
                    $next = ($idx + 1 < count($rows)) ? $rows[$idx + 1]['id'] : $row['id'];
                ?>
                    <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                    <div style="width:24%;text-align:center">
                        <img src="./image/<?= $row['img']; ?>" style="width: 70px;height:90px;">
                    </div>
                    <div style="width:24%;text-align:center">
                        <input type="text" name="name[]" value="<?= $row['name']; ?>">
                    </div>
                    <div style="width:13%;text-align:center">
                        <button class="swBtn" onclick="sw(<?= $row['id']; ?>, <?= $prev; ?>, 'Poster')">往上</button>
                        <br>
                        <button class="swBtn" onclick="sw(<?= $row['id']; ?>, <?= $next; ?>, 'Poster')">往下</button>
                    </div>
                    <div style="width:28%;text-align:center">
                        <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>顯示
                        <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">刪除
                        <select name="ani[]" id="">
                            <option value="1" <?= ($row['ani'] == 1) ? 'selected' : ''; ?>>淡入淡出</option>
                            <option value="2" <?= ($row['ani'] == 2) ? 'selected' : ''; ?>>滑入滑出</option>
                            <option value="3" <?= ($row['ani'] == 3) ? 'selected' : ''; ?>>縮放</option>
                        </select>
                    </div>
                <?php endforeach; ?>
        </div>
        <div style="margin: 5px;">
            <input type="submit" value="編輯確定">
            <input type="reset" value="重置">
        </div>
        </form>
    </div>
    <hr>
    <div class="newposter">
        <h3 class="ct">新增預告片海報</h3>
        <form action="./api/add_poster.php" method="post" enctype="multipart/form-data">
            <table class="newtable">
                <tr>
                    <td>預告片海報：</td>
                    <td><input type="file" name="img" id="img"></td>
                    <td>預告片片名：</td>
                    <td><input type="text" name="name" id="name"></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="新增">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>
<script>
function sw(id1, id2){
    $.post('./api/sw.php', {id1, id2}, () => location.reload());
}
</script>
