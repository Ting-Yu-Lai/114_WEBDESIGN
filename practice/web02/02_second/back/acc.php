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
            foreach ($rows as $row):
            ?>
                <tr class="ct">
                    <td><?= $row['acc']; ?></td>
                    <!-- 這邊密碼要用暗碼遮住 -->
                    <td>
                        <?= str_repeat("*", strlen($row['pw'])); ?>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
        </div>
    </form>
    <h3>會員註冊</h3>
    <div class="ct" style="color: red;">*請設定您要註冊的帳號及密碼(最長12個字元)</div>
    <div style="display: flex;flex-wrap:wrap;">
        <div style="width: 100%;">
            <label for="acc">Step1:登入帳號</label>
            <input type="text" name="acc" id="acc">
        </div>
        <div style="width: 100%;">
            <label for="pw">Step2:登入密碼</label>
            <input type="password" name="pw" id="pw">
        </div>
        <div style="width: 100%;">
            <label for="pw2">Step3:再次確認密碼</label>
            <input type="password" name="pw2" id="pw2">
        </div>
        <div style="width: 100%;">
            <label for="email">Step4:信箱(忘記密碼時使用)</label>
            <input type="email" name="email" id="email">
        </div style="width: 100%;">
        <!-- 綁定註冊事件 -->
        <input type="button" value="註冊" onclick="reg()">
        <input type="reset" value="清除" onclick="clean()">
    </div>
</fieldset>
<script>
    function reg() {
        let data = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val(),
        }

        if (data.acc == '' || data.pw == '' || data.pw2 == '' || data.email == '') {
            alert("不可空白");
        } else if (data.pw != data.pw2) {
            alert('密碼錯誤')
        } else {
            // 這邊要使用ajax去比對
            $.get("./api/chk_acc.php", data, (res) => {
                if (parseInt(res)) {
                    alert('帳號重複');
                } else {
                    $.post("./api/reg.php", data, (res) => {
                        if (parseInt(res)) {
                            alert('註冊成功，歡迎加入');
                            location.href = "?do=acc";
                        }
                    })
                }
            })
        }
    }

    function clean() {
        $("#acc").val("");
        $("#pw").val("");
        $("#pw2").val("");
        $("#email").val("");
    }
</script>