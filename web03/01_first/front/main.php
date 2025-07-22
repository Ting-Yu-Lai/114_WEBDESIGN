<style>
.lists {
  width: 200px;
  height: 240px;
  background-color: rgba(0, 255, 0, 0.5);
  margin: 0 auto;
  overflow: hidden;
  position: relative;
}

.btns {
    width: 320px;
    height: 120px;
    background-color: rgba(0, 0, 255, 0.5);
    margin: 0 auto;
}

.controls {
    display: flex;
    justify-content: space-around;
    align-items: center;

}

.left,
.right {
    width: 0;
    height: 0;
    border-top: 20px solid transparent;
    border-bottom: 20px solid transparent;
}

.left {
    border-left: 0px solid black;
    border-right: 29px solid black;
}

.right {
    border-left: 29px solid black;
    border-right: 0px solid black;
}

.poster {
  text-align: center;
  margin: 0  auto;
  position: absolute;
  
}

.poster img{
  width: 200px;
  height: 220px;
}
</style>
<?php
  $posters=$Poster->all(['sh'=>1],' order by `rank`');
?>
<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">

            <div class="lists">
                <?php
            foreach($posters as $poster):?>
                <div class="poster">
                    <img src="./image/<?=$poster['img'];?>" >
                    <div><?=$poster['name'];?></div>
                </div>
            <?php endforeach;?>
            </div>

            <div class="controls">
                <div class="left"></div>
                <div class="btns"></div>
                <div class="right"></div>
            </div>
        </div>
    </div>
</div>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <table>
            <tbody>
                <tr> </tr>
            </tbody>
        </table>
        <div class="ct"> </div>
    </div>
</div>