<fieldset>
    <legend>會員註冊</legend>
    <div class="ct" style="color: red;">*請設定您要註冊的帳號及密碼</div>
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
            <label for="email">Step4:信箱(忘記密碼使用)</label>
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
                            location.href = "?do=login";
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