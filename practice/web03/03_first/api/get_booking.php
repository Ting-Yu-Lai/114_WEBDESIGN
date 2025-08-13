<?php include_once 'db.php';?>
<style>
.booking-box {
    width: 540px;
    height: 370px;
    background: url("./icon/03D04.png");
    margin: 0 auto;
}

.info-box {
    background: #ddd;
    width: 540px;
    margin: 10px auto;
    padding: 5px 70px;
    box-sizing: border-box;
}

#seats {
    display: flex;
    flex-wrap: wrap;
    width: 320px;
    height: 344px;
    margin: 0 auto;
    padding-top: 18px;
    position: relative;
}

.seat {
    width: 64px;
    height: 86px;
    box-sizing: border-box;
    /* background: #ddd; */
    text-align: center;
    padding: 2px;
}

.seat input[type="checkbox"] {
    position:absolute;
    bottom:0;
    right:0;
}

.seat:nth-child(odd) {
    width: 64px;
    height: 86px;
    box-sizing: border-box;
}
</style>

<div class="booking-box"></div>
<div id="seats">
    <?php for($i=0;$i<20;$i++):?>
    <div class="seat">
        <?=floor($i/5)+1;?>排<?=($i%5)+1;?>號</div>
        <!-- 點選之後勾選要+1 取消之後勾選要-1 -->
        <input type="checkbox" name="seat" value="<?= $i;?>">
    </div>
    <?php endfor;?>

<div class="info-box">
</div>
<div class="order-info">
    <div>您選擇的電影是：<?=$Movie->find($_GET['id'])['name'];?></div>
    <div>您選擇的時刻是：<?=$_GET['date'];?> <?=$_GET['session'];?></div>
    <div>您已經勾選 <span id="tickets">0</span>張票，最多可以選四張。</div>
</div>
<button class="btn-prev">上一步</button>
<button class="btn-order" >訂購</button>

<script>
    let selectedSeats =[];
    $(".seat input[type='checkbox']").on('change',function() {
        
        if($(this).prop("checked")) {
            if(selectedSeats.length < 4) {
                selectedSeats.push($(this).val());
                $(this).parent().removeClass('null').addClass('booked');
            }else{
                alert('最多只能選擇四張票');
                $(this).prop("checked",false);
                $(this).parent().removeClass('booked').addClass('null');
            }
        }else{
            selectedSeats.splice(selectedSeats,indexof($(this).val()),1);
        }
        $("#tickets").text(selectedSeats.length);
    })

    $('.btn-order').on('click',function(){
        $.post("./api/booking.php",{
            movie:"<?=$Movie->find($_GET['id'])['name'];?>";
            date="<?=$_GET['date'];?>";
            session="<?=$_GET['session'];?>";
            seats:selectedSeats
        },(no)=>{
            location.href = `?do=result&no=${no}`;
        })
    })
</script>