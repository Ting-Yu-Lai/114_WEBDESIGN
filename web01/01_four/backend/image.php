<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園映像資料管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="70%">校園映像資料圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td width="10%">更換圖片</td>
                </tr>
                <?php
                //count(${ucfirst($do)}->all());
                // 算出image裡面有幾筆資料
                $all = count(${ucfirst($do)}->all());
                // 要顯示的頁數
                $div = 3;
                // 往上取整數 ex:4.5 => 5 
                $page = ceil($all / $div);
                // 定義現在頁數在哪裡
                $now = $_GET['p'] ?? 1;
                // 用all拿出所有的資料
                $start = ($now - 1) * $div;

                $rows = ${ucfirst($do)}->all(" LIMIT $start,$div");
                foreach ($rows as $row):
                ?>
                    <tr class="">
                        <td width="70%">
                            <img style="width:100px;height:68px;" src="./images/<?= $row['img']; ?>" alt="">
                        </td>
                        <td width="10%">
                            <input type="checkbox" name="sh[]" id="sh" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? "checked" : ""; ?>>
                        </td>
                        <td width="10%">
                            <input type="checkbox" name="del[]" id="del" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <input type="button"
                                onclick="op('#cover','#cvr','./modal/update.php?id=<?= $row['id']; ?>&table=<?= $do; ?>')" value="更新動畫">
                        </td>
                    </tr>
                    <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="cent">
            <?php
            if ($now - 1 > 0):
            ?>
                <a href="?do=<?= $do; ?>&p=<?= $now - 1; ?>">
                    < </a>
                    <?php
                endif;
                    ?>
                    <?php for ($i = 1; $i <= $page; $i++):
                    $size = ($now==$i)?'24px':''
                    ?>
                        <a href="?do=<?= $do; ?>&p=<?= $i ?>" style="font-size:<?=$size;?>"><?= $i; ?></a>
                    <?php endfor; ?>
                    <?php
                    if ($now - 1 <= $page):
                    ?>
                        <a href="?do=<?= $do; ?>&p=<?= $now + 1; ?>"> ></a>
                    <?php
                    endif;
                    ?>
        </div>

        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="hidden" name="table" value="<?= $do; ?>">

                        <!-- 我要把table傳送到api讓他知道是哪個table -->
                        <input type="button"
                            onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增校園映像資料圖片">
                    </td>
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>