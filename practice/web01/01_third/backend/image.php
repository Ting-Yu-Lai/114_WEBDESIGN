<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園映像資料管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="80%">校園映像資料圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
            </tbody>
            <?php
            // 取得資料表的資料總筆數
            $all = count(${ucfirst($do)}->all());
            // 每頁顯示的比數
            $div = 3;
            // ceil()向上取整，取得總頁數
            $page = ceil($all / $div);
            // 取得目前頁數，預設為1
            $now = $_GET['p'] ?? 1;
            // 取得目前頁數的起始位置
            $start = ($now - 1) * $div;
            $rows = ${ucfirst($do)}->all(" LIMIT $start,$div");
            foreach ($rows as $row):
            ?>
                <tbody>
                    <tr>
                        <td width="80%">
                            <img src="./images/<?= $row['img']; ?>" style="width:150px;height:68px;" alt="">
                        </td>
                        <td width="10%">
                            <input type="checkbox" name="sh[]" id="" value="<?= $row['id'];?>" <?=($row['sh']==1)?"checked":"";?>>
                        </td>
                        <td width="10%">
                            <input type="checkbox" name="del[]" id="" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <input type="button" value="更新動畫圖片" onclick="op('#cover','#cvr','./modal/update.php?id=<?=  $row['id']; ?>&table=<?= $do; ?>')">
                        </td>
                    </tr>
                    <!-- 我們要把input id 傳送給edit去做資料表讀取匯入 -->
                    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                </tbody>
            <?php
                endforeach;
            ?>
        </table>
        <div class="cent">
            <?php if($now-1 > 0): ?>
                <a href="?do=<?=$do;?>&p=<?=$now-1;?>"><</a>
            <?php endif;?>

            <?php for($i=1; $i<=$page; $i++):
                $size=($now==$i)?'32px':'';
            ?>
                <a href="?do=<?=$do;?>&p=<?=$i;?> "style="font-size:<?=$size;?>;"><?=$i;?></a>
            <?php endfor;?>

            <?php if($now+1 <= $page): ?>
                <a href="?do=<?=$do;?>&p=<?=$now+1;?>">></a>
            <?php endif;?>     
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <!-- 我們要把input table 傳送給edit去做ucfirst()資料表讀取匯入 -->

                    <input type="hidden" name="table" value="<?=$do;?>">
                    <td width="200px">
                        <input type="button"
                            <?php
                            // op開啟的位置除了傳數值，還有需要傳入table讓modal的form可以POST table到api執行DB class
                            ?>
                            onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增校園映像圖片">
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