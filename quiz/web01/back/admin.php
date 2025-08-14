<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">管理者帳號管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="40%">帳號</td>
                    <td width="40%">密碼</td>
                    <td width="7%">刪除</td>
                </tr>
                <?php $rows = $db->all();
                foreach($rows as $row):?>
                <tr class="cent">
                    <td width="40%">
                        <input type="text" style="width: 80%;" name="acc[]" value="<?=$row['acc'];?>" id="">
                    </td>
                    <td width="40%">
                        <input type="password" style="width: 80%;" name="pw[]" value="<?=$row['pw'];?>" id="">
                    </td>
                    <td width="7%">
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>"  id="">
                    </td>
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                <?php endforeach;?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="hidden" name="table" value="<?=$do;?>">
                        <input type="button"
                            onclick="op('#cover','#cvr','./modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增管理者帳號">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>