<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/delAcc.php" method="post">
        <table style="width: 80%;margin:auto;">
            <tr style="background-color: #ddd;text-align:center">
                <td>帳號</td>
                <td>密碼</td>
                <td width="10%">刪除</td>
            </tr>
            <?php
            $rows = $User->all(); 
            foreach($rows as $row):
            ?>
            <tr style="text-align: center;">
                <td><?=$row['acc'];?></td>
                <td><?=$row['pw'];?></td>
                <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
            </tr>
            <?php endforeach;?>
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
        </div>
    </form>
    <table>
        <tr>
            <td>Step1:帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>Step2:密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td>Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="mail" id="mail"></td>
        </tr>
        <tr>
            <td>
                <input type="button" onclick="reg()" value="註冊">
                <input type="button" onclick="cleanF()" value="清除">
            </td>
        </tr>
    </table>
</fieldset>
<script>
    function cleanF() {
        $("#acc").val("");
        $("#pw").val("");
        $("#pw2").val("");
        $("#mail").val("");
    }

    function reg() {
        let data = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            mail: $("#mail").val(),
        };

        if(data.acc != '' || data.pw != '' || data.pw2 != '' || data.mail != '') {
            if(data.pw != data.pw2) {
                alert("密碼錯誤");
            }else{
                $.post("./api/chkAcc.php",{acc:data.acc},function(res) {
                    if(parseInt(res)) {
                        alert("帳號重複");
                    }else {
                        $.post("./api/reg.php",data,function(res){
                            if(parseInt(res)) {
                                alert("註冊完成，歡迎加入");
                                location.href='?do=login';
                            }
                        })
                    }
                })
            }
        }else{
            alert("不可空白");
        }
    }
</script>