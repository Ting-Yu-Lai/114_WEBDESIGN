<style>
    .box1 {
        width: 99%;
        display: flex;
    }
</style>

<h3 class="ct">新增院線片</h2>
    <form action="./api/add_movie.php" method="post" enctype="multipart/form-data">
        <div class="box1">
            <div class="col1" style="width: 20%;">
                <h3>影片資料</h3>
            </div>
            <div class="col2" style="width: 70%;">
                <table class="">
                    <tr>
                        <td>片名：</td>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td>分級：</td>
                        <td><select name="level" id="">
                                <option value="1">普通級</option>
                                <option value="2">保護級</option>
                                <option value="3">輔導級</option>
                                <option value="4">限制級</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>片長：</td>
                        <td><input type="text" name="lenght" id=""></td>
                    </tr>
                    <tr>
                        <td>上映日期：</td>
                        <td>
                            <select name="year" id="">
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>年
                            <select name="month" id="">
                                <?php
                                for ($i = 1; $i <= 12; $i++):
                                ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php endfor; ?>
                            </select>月
                            <select name="day" id="">
                                <?php
                                for ($i = 1; $i <= 31; $i++):
                                ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php endfor; ?>
                            </select>日
                        </td>
                    </tr>
                    <tr>
                        <td>發行商：</td>
                        <td><input type="text" name="publish" id=""></td>
                    </tr>
                    <tr>
                        <td>導演：</td>
                        <td><input type="text" name="director" id=""></td>
                    </tr>
                    <tr>
                        <td>預告影片：</td>
                        <td><input type="file" name="img" id=""></td>
                    </tr>
                    <tr>
                        <td>電影海報：</td>
                        <td><input type="file" name="trailer" id=""></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="box1">
            <h3 style="width: 20%;">劇情簡介</h3>
            <textarea name="intro" id="" style="width: 30%;" class="ct"></textarea>
        </div>
        <div class="ct">
            <input type="submit" value="新增"><input type="reset" value="重置">
        </div>
    </form>