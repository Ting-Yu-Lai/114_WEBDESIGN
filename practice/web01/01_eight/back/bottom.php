<div style="
              width: 99%;
              height: 87%;
              margin: auto;
              overflow: auto;
              border: #666 1px solid;
            ">
    <p class="t cent botli">頁尾版權資料管理</p>
    <form method="post" action="./api/edit_column.php">
        <table width="100%">
            <tbody>
                <?php
                $row = $db->find(1);
                ?>
                <tr class="yel">
                    <td width="50%">頁尾版權資料</td>
                    <td>
                        <input style="width: 90%;" type="text" name="bottom" id="" value="<?=$row['bottom'];?>">
                    </td>
                </tr>
                
                <input type="hidden" name="table" value="<?=$do;?>">
                <input type="hidden" name="id" value="<?=$row['id'];?>">
            </tbody>
        </table>
        <table style="margin-top: 40px; width: 70%">
            <tbody>
                <tr>
                    <td width="200px">
                        <!-- <input type="button" onclick="op('#cover','#cvr','./modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增校園映像資料圖片" /> -->
                    </td>
                    <td class="cent">
                        <input type="submit" value="修改確定" /><input type="reset" value="重置" />
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>