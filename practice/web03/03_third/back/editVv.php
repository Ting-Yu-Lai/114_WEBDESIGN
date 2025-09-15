<style>
    .tmp {
        justify-content: space-around;
    }
</style>
<?php 
    $rows = $Vv->find($_GET['id']);
    $ondate = explode("-",$rows['ondate']);
?>
<h3 class="ct">編輯院線片</h3>
<hr>
<div style="display:flex;width:100%;">
    <div style="width: 10%;">
        影片資料
    </div>
    <div style="width:90%;">
        <form action="./api/saveVv.php" method="post" enctype="multipart/form-data">
            <table style="width:100%;margin:auto;">
                <tr>
                    <td>片名：<input type="text" name="name" id="name" value="<?=$rows['name'];?>"></td>
                </tr>
                <tr>
                    <td>分級：
                        <select name="lv" id="lv">
                            <option value="1" <?=($rows['lv']==1)?'selected':'';?>>普通級</option>
                            <option value="2" <?=($rows['lv']==2)?'selected':'';?>>保護級</option>
                            <option value="3" <?=($rows['lv']==3)?'selected':'';?>>輔導級</option>
                            <option value="4" <?=($rows['lv']==4)?'selected':'';?>>限制級</option>
                        </select>
                        (請選擇分級)
                    </td>
                </tr>
                <tr>
                    <td>片長：<input type="text" name="lenght" id="lenght" value="<?=$rows['lenght'];?>"></td>
                </tr>
                <tr>
                    <td>
                        上映日期：
                        <select name="year" id="year">
                            <option value="2025" <?= ($ondate['0']==2025)?'selected':'';?>>2025</option>
                            <option value="2025" <?= ($ondate['0']==2026)?'selected':'';?>>2026</option>
                        </select>年
                        <select name="month" id="month">
                            <?php 
                            for($i=1;$i<=12;$i++):
                            $select = ($ondate['1'] == $i)?'selected':'';    
                                ?>
                            <option value="<?=$i;?>" <?=$select;?>><?=$i;?></option>
                            <?php endfor;?>
                        </select>月
                        <select name="day" id="day">
                            <?php for($i=1;$i<=31;$i++):
                                $select = ($ondate['2'] == $i)?'selected':''; 
                                ?>
                            <option value="<?=$i;?>" <?=$select;?>><?=$i;?></option>
                            <?php endfor;?>
                        </select>日
                    </td>
                </tr>
                <tr>
                    <td>發行商：<input type="text" name="publish" id="publish" value="<?=$rows['publish'];?>"></td>
                </tr>
                <tr>
                    <td>導演：<input type="text" name="director" id="director" value="<?=$rows['director'];?>"></td>
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
            <textarea style="width: 80%;height:70px;" name="intro" id="intro"><?=$rows['intro'];?></textarea>
        </div>
    </div>
    <input type="hidden" name="id" id="id" value="<?=$rows['id'];?>">
    <div class="ct" style="margin-top: 10px;">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
    </div>
</form>