<?php
$movies = $Movie->find($_GET['id']);
// print_r($movies);
?>

  <div id="mm">
    <div class="tab rb" style="width:87%;">
      <div style="background:#FFF; width:100%; color:#333; text-align:left">
        <video src="./image/<?=$movies['trailer'];?>" width="300px" height="250px" controls="" style="float:right;"></video>
        <font style="font-size:24px"> <img src="./image/<?=$movies['poster'];?>" width="200px" height="250px" style="margin:10px; float:left">
        <p style="margin:3px">影片名稱 ：<?=$movies['name'];?>
          <input type="button" value="線上訂票" onclick="lof('?do=ord&amp;id=4')" style="margin-left:50px; padding:2px 4px" class="b2_btu">
        </p>
        <p style="margin:3px">影片分級 ： <img src="./icon/03C0<?=$movies['level'];?>.png" style="display:inline-block;"><?=$levelStr[$movies['level']];?></p>
        <p style="margin:3px">影片片長 ： <?=$movies['lenght'];?>分</p>
        <p style="margin:3px">上映日期 <?=$movies['ondate'];?></p>
        <p style="margin:3px">發行商 ：<?=$movies['publish'];?> </p>
        <p style="margin:3px">導演 ：<?=$movies['director'];?> </p>
        <br>
        <br>
        <p style="margin:10px 3px 3px 3px; word-break:break-all"> 劇情簡介：<?=$movies['intro'];?><br>
        </p>
        </font>
        <table width="100%" border="0">
          <tbody>
            <tr>
              <td align="center"><input type="button" value="院線片清單" onclick="location.href='./index.php'"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>