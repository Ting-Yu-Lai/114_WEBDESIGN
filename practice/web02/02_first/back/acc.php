<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/del_acc.php" method="post">
        <table style="width: 70%;margin:auto;">
            <tr class="ct">
                <td>帳號</td>
                <td>密碼</td>
                <td>刪除</td>
            </tr>
            <?php
            $rows = $User->all();
            foreach($rows as $row):
                // if($row['acc'] != 'admin'): 題目沒有提到可以不用做
            ?>
            <tr class="ct">
                <td><?=$row['acc'];?></td>
                <td><?=str_repeat("*",strlen($row['pw']));?></td>
                <td>
                    <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                </td>
            </tr>
            <?php
            // endif;
            endforeach;
            ?>
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
        </div>
    </form>

    <h1>新增會員</h1>
    <div class="ct" style="color: red;">*請設定您要註冊的帳號及密碼（最長12個字元）</div>
    <form>
        <table>
            <tr>
                <td>Step1:登入帳號</td>
                <td><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td>Step2:登入密碼</td>
                <td><input type="password" name="pw" id="pw"></td>
            </tr>
            <tr>
                <td>Step3:再次確認密碼</td>
                <td>
                    <input type="password" name="pw2" id="pw2">
                </td>
            </tr>
            <tr>
                <td>Step4:信箱(忘記密碼時使用)</td>
                <td>
                    <input type="text" name="email" id="email">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="button" value="註冊" onclick="reg()">
                </td>
                <td>
                    <input type="reset" value="清除">
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
<script>
    function reg() {
        let data={
            acc:$("#acc").val(),
            pw:$("#pw").val(),
            pw2:$("#pw2").val(),
            email:$("#email").val()
        }

         if(data.acc == '' || data.pw == '' || data.pw2 == '' || data.email=='') {
            alert("不可空白");
        } else if(data.pw != data.pw2) {
            alert("密碼錯誤");
        } else {
            // CRUD 中 CUD才會更改資料表，我們只要Read讀取帳號可以用get就好
            $.get("./api/chk_acc.php",data,(res)=>{
                if(parseInt(res)){
                    alert("帳號重複");
                }else{
                    // 帳號沒有重複所以要去建立資料，所以這邊用POST
                    $.post("./api/reg.php",data,(res)=>{
                        // if(parseInt(res)) {
                        //     alert("註冊成功，歡迎加入");
                        //     location.href="?do=login";
                        // }  else {
                        //     // 題目沒有要求做失敗
                        //     alert("註冊失敗，請洽管理員");
                        // }
                    })
                }   
            })
        }
    }
</script>
</fieldset>