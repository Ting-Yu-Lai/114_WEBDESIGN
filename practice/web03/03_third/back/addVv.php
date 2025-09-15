<style>
    .tmp {
        justify-content: space-around;
    }
</style>
<h3 class="ct">新增院線片</h3>
<hr>
<div style="display:flex;width:100%;">
    <div style="width: 10%;">
        影片資料
    </div>
    <div style="width:90%;">
        <form action="./api/saveVv.php" method="post" enctype="multipart/form-data">
            <table style="width:100%;margin:auto;">
                <tr>
                    <td>片名：<input type="text" name="name" id="name"></td>
                </tr>
                <tr>
                    <td>分級：
                        <select name="lv" id="lv">
                            <option value="1">普通級</option>
                            <option value="2">保護級</option>
                            <option value="3">輔導級</option>
                            <option value="4">限制級</option>
                        </select>
                        (請選擇分級)
                    </td>
                </tr>
                <tr>
                    <td>片長：<input type="text" name="lenght" id="lenght"></td>
                </tr>
                <tr>
                    <td>
                        上映日期：
                        <select name="year" id="year">
                            <option value="2025">2025</option>
                            <option value="2025">2026</option>
                        </select>年
                        <select name="month" id="month">
                            <?php for($i=1;$i<=12;$i++):?>
                            <option value="<?=$i;?>"><?=$i;?></option>
                            <?php endfor;?>
                        </select>月
                        <select name="day" id="day">
                            <?php for($i=1;$i<=31;$i++):?>
                            <option value="<?=$i;?>"><?=$i;?></option>
                            <?php endfor;?>
                        </select>日
                    </td>
                </tr>
                <tr>
                    <td>發行商：<input type="text" name="publish" id="publish"></td>
                </tr>
                <tr>
                    <td>導演：<input type="text" name="director" id="director"></td>
                </tr>
                <tr>
                    <td>預告影片：<input type="file" name="trailer" id="trailer"></td>
                </tr>
                <tr>
                    <td>電影海報：<input type="file" name="img" id="img"></td>
                </tr>
            </table>
        </div>
    </div>
    <div style="display: flex;width:100%;">
        <div>劇情簡介</div>
        <div style="width: 80%;">
            <textarea style="width: 80%;height:70px;" name="intro" id="intro"></textarea>
        </div>
    </div>
    <div class="ct" style="margin-top: 10px;">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>