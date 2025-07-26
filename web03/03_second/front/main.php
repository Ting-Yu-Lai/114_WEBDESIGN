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
    display: none;
    position: absolute;
    /* background-color: transparent; */
    width:200px;
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
    height: 120px;
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
          <div class="poster"  data-id="<?= $row['id']; ?>" data-ani="<?= $row['ani'];?>">
            <img src="./image/<?= $row['img']; ?>">
            <div><?= $row['name']; ?></div>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="controls">
        <div class="left"></div>
        <div class="btns">
          <?php foreach ($rows as $idx => $row): ?>
            <div class="poster-btn"  data-id="<?= $row['id']; ?>" data-ani="<?= $row['ani'];?>">
              <img src="./image/<?= $row['img']; ?>">
              <div><?= $row['name']; ?></div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="right"></div>
      </div>
    </div>
  </div>
</div>
<script>
  let rank = 0;
  let p = 0;
  // eq選取第一個索引，選擇整個.poster然後秀出來
  $('.poster').eq(rank).show();

  let slider = setInterval(() => {
    animater();
  }, 2000);

    // 如果我手移動到bts上就停止Interval繼續運行
  $('.btns').hover(
    function () {
      clearInterval(slider);
    },
    function () {
      slider = setInterval(()=>{
        animater();
      },2000)
    }
  )

  $('.poster-btn').on('click',function() {
    let idx = $(this).index();
    animater(idx);
  })
  

  //為什麼要傳入參數r，等後面使用btn點選要顯示的預告片就可以傳入
  function animater(r) {
    let now = $('.poster:visible');
    if (r == undefined) {
      rank++;
      //rank 大於 他所有筆數-1 rank歸0
      if (rank > $('.poster').length - 1) {
        rank = 0;
      }
    } else {
      rank = r;
    }

    let next = $('.poster').eq(rank);
    let ani = next.data('ani');
    switch (ani) {
      case 1:
        $(now).fadeOut(1000);
        $(next).fadeIn(1000);
        break;
      case 2:
        $(now).hide(1000);
        $(next).show(1000);
        break;
      case 3:
        $(now).slideUp(1000);
        $(next).slideDown(1000);
        break;
    }
  }

  $('.left, .right').on('click',function () {
    //
    let arrow = $(this).attr('class');
  })

</script>


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