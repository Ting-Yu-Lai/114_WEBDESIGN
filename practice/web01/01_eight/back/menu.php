<div style="
              width: 99%;
              height: 87%;
              margin: auto;
              overflow: auto;
              border: #666 1px solid;
            ">
    <p class="t cent botli">選單管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="30%">主選單名稱</td>
                    <td width="30%">選單連結網址</td>
                    <td width="7%">次選單數</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php 
                $row = $db->all(['main_id'=>0]);
                foreach($row as $r):?>
                <tr class="">
                    <td width="30%">
                        <input type="text" name="text[]" value="<?=$r['text'];?>" id="">
                    </td>
                    <td width="30%">
                        <input type="text" name="href[]" value="<?=$r['href'];?>" id="">
                    </td>
                    <td>
                        <?=$Menu->count(['main_id'=>$r['id']]);?>
                    </td>
                    <td width="7%">
                        <input type="checkbox" name="sh[]" id="" value="<?=$r['id'];?>" <?=($r['sh']==1)?'checked':'';?>>
                    </td>
                    <td width="7%">
                        <input type="checkbox" name="del[]" value="<?=$r['id'];?>" id="">
                    </td>
                    <td>
                        <input type="button" onclick="op('#cover','#cvr','./modal/submenu.php?table=<?=$do;?>&id=<?=$r['id'];?>')" value="編輯次選單" />
                    </td>
                </tr>
                <input type="hidden" name="table" value="<?=$do;?>">
                <input type="hidden" name="id[]" value="<?=$r['id'];?>">
                <?php endforeach;?>
            </tbody>
        </table>
        <table style="margin-top: 40px; width: 70%">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增主選單" />
                    </td>
                    <td class="cent">
                        <input type="submit" value="修改確定" /><input type="reset" value="重置" />
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>