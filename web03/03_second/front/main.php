<style>
  .lists {
    width: 200px;
    ;
    height: 240px;
    margin: 0 auto;
    /* background-color: blue; */
    overflow: hidden;
    position: relative;
  }

  .poster {
    text-align: center;
    font-size: 16px;
    margin: 0 auto;
    /* display: none; */
    /* position: absolute; */
    /* background-color: transparent; */
  }

  .poster img {
    width: 200px;
    height: 220px;
  }

  .controls {
    display: flex;
    justify-content: space-around;
    align-items: center;
  }

  .btns {
    width: 280px;
    height: 100px;
    margin: 0 auto;
    display: flex;
    overflow: hidden;
    /* background-color: #fff; */
  }

  .poster-btn {
    width: 80px;
    height: 100px;
    display: inline-block;
    flex-shrink: 0;
    position: relative;
    font-size: 12px;
  }

  .poster-btn img {
    width: 70px;
    height: 90px;
    display: inline-block;

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
</style>

<?php
$rows = $Poster->all(['sh' => 1], ' order by `rank` ');
?>
<div class="half" style="vertical-align:top;">
  <h1>預告片介紹</h1>
  <div class="rb tab" style="width:95%;">
    <div id="abgne-block-20111227">
      <div class="lists">
        <?php foreach ($rows as $idx => $row): ?>
          <div class="poster">
            <img src="./image/<?= $row['img']; ?>" alt="">
            <div><?= $row['name']; ?></div>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="controls">
        <div class="left"></div>
        <div class="btns">
          <?php foreach ($rows as $idx => $row): ?>
            <div class="poster-btn">
              <img src="./image/<?= $row['img']; ?>" alt="">
            </div>
          <?php endforeach; ?>
        </div>
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