<?php include_once 'db.php';?>
<style>
    .booking-box {
        width: 540px;
        height: 370px;
        background: url("./icon/03D04.png") no-repeat center;
        margin:auto;
    }
    #seats {
        display: flex;
        flex-wrap: wrap;
        width: 320px;
        height: 344px;
        margin:0 auto;
        padding-top: 18px;
        /* background-color: #fff; */
    }
    .seat {
        width: 64px;
        height: 86px;
        position:relative;
    }

    .seat input[type="checkbox"] {
        position:absolute;
        right: 2px;
        bottom: 2px;
    }

    .info-box {
        width: 50%;
        background-color: #ccc;
        margin:auto;
    }


    .booked {
        background: url("./icon/03D03.png") no-repeat center;
    }
    .null {
        background: url("./icon/03D02.png") no-repeat center;
    }
</style>
<div class="booking-box">
    <div id="seats">
        <?php
        //處理已被訂位的位置顯示
            $orders = $Order->all(['movie'=>$Vv->find($_GET['id'])['name'],'date'=>$_GET['date'],'session'=>$_GET['session']]);
            $seats = [];
            foreach($orders as $order) {
                //把每一筆座位資訊合併在陣列內部
                $seats = array_merge($seats,unserialize($order['seats']));
            }
        // 已訂位結束
        ?>
        <?php
        //利用迴圈算座位
        for($i=1;$i<=20;$i++):
            $booked = in_array($i,$seats)?'booked':'null';
            ?>
        <div class="seat <?=$booked;?>">
            <div><?= floor($i/5)+1;?>排<?= ($i%5)+1 ;?>號</div>
            <?php if($booked == 'null'):?>
                <input type="checkbox" name="seat" value="<?=$i;?>">
            <?php endif;?>
        </div>
        <?php endfor;?>
    </div>
</div>
<div class="info-box">
    <div class="order-info">
        <div>您選擇的電影是:<?=$Vv->find($_GET['id'])['name'];?></div>
        <div>您選擇的時刻是:<?= $_GET['date'] ;?> &nbsp;&nbsp;&nbsp; <?=$_GET['session'];?></div>
        <div>您已經勾選 <span id="tickets">0</span>張票 最多可選4張 </div>
    </div>
    <div class="ct">
        <button class="btn-prev">上一步</button>
        <button class="btn-order">訂購</button>
    </div>
</div>
<script>
    let selectedSeats = [];
    $(".seat input[type='checkbox']").on("change",function(){
        // console.log($(this).prop("checked"),$(this).val());
        if($(this).prop("checked")) {
            if(selectedSeats.length < 4) {
                selectedSeats.push($(this).val());
            }else{
                alert("最多只能選擇四張");
                $(this).prop("checked",false);
            }
        }else{
            selectedSeats.splice(selectedSeats.indexOf($(this).val()),1);
        }
        $("#tickets").text(selectedSeats.length);
    })

    $(".btn-order").on("click",function(){
        $.post("./api/booking.php",{
            movie: "<?=$Vv->find($_GET['id'])['name'];?>",
            date: "<?=$_GET['date'];?>",
            session: "<?= $_GET['session'];?>",
            seats: selectedSeats
        },(no)=>{
            console.log(no);
            location.href=`?do=result&no=${no}`;
        })
    });
</script>