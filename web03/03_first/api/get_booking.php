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
        <input type="checkbox" name="seat" value="<?= $i;?>">
    </div>
    <?php endfor;?>

<div class="info-box">
</div>
<div class="order-info">
    <div>您選擇的電影是：</div>
    <div>您選擇的時刻是：</div>
    <div>您已經勾選 <span id="tickets">0</span>張票，最多可以選四張。</div>
</div>
<button class="btn-prev">上一步</button>
<button class="btn-order">訂購</button>