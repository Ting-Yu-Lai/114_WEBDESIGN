<h3 class="ct">訂單管理</h3>
<div class="quick-del">
    快速刪除:
    <input type="radio" name="type" value="date">
    <input type="text" name="date" id="date">
    <input type="radio" name="type" value="movie">
    <select name="movie" id="movie">
        <!-- GROUP BY 可以選擇不重複的方法 -->
        <?php 
        $movies = q("select `movie` from `orders` group by `movie`");
        foreach($movies as $movie):?>
        <option value="<?=$movie['movie'];?>"><?=$movie['movie'];?></option>
        <?php endforeach;?>
    </select>
    <button class="quick-del">刪除</button>
</div>
<style>
    .list-col {
        display: flex;
        justify-content: space-between;
    }
    .list-data div{
        display: flex;
        justify-content: space-between;
    }
    .items {
        overflow: auto;

    }
</style>
<div class="list-col ct">
    <div>訂單編號</div>
    <div>電影名稱</div>
    <div>日期</div>
    <div>場次時間</div>
    <div>訂購數量</div>
    <div>訂購位置</div>
    <div>操作</div>
</div>
    <div id="items">
        <?php 
        $orders = $Order->all(" order by `no` desc ");
        foreach($orders as $order):
        ?>
        <div class="list-data ct">
            <div><?=$order['no'];?></div>
            <div><?=$order['movie'];?></div>
            <div><?=$order['date'];?></div>
            <div><?=$order['session'];?></div>
            <div><?=$order['tickets'];?></div>
            <div>
               <?php
               $seats = unserialize($order['seats']);
               sort($seats);
               foreach($seats as $seat) {
                echo floor($seat/5)+1 ."排".($seat%5)+1 ."號";
               }
               ?>
            </div>
            <div>
                <button class="btn-del" data-id="<?=$order['id'];?>">刪除</button>
            </div>
        </div>
        <hr>
        <?php endforeach;?>
    </div>
<script>
        $('.btn-del').on('click',function() {
        // console.log('click ok');
        
        let id = $(this).data('id');
        // console.log('id:',id);
        if(confirm("確定刪除訂單嗎?")) {
            $.post("./api/del.php",{table:'Order',id},()=>{
                location.reload();
            })
        }
    })

    $('.quick-del').on('click',function(){
        let type = $("input[name='type]:checked").val();
        switch(type) {
            case 'date':
                data = $('#date').val();
                break;
            case 'movie':
                data = $('#movie').val();
                break;
        }
        if(confirm(`確定要刪除${data}的訂單嗎?`)) {
            $.post("./api/qdel.php",{type,data},()=>{
                location.reload();
            })
        }
    })
</script>