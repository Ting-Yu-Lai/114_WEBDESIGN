<fieldset>
    <legend>會員登入
    </legend>
    <table style="width: 50%;margin:auto">
        <tr>
            <td style="background-color: #ddd;">帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td style="background-color: #ddd;">密碼</td>
            <td><input type="text" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>
                <button onclick="login()">登入</button>
                <button onclick="cleanForm()">清除</button>
            </td>
            <td>
                <a href="?do=forgot">忘記密碼</a>|
                <a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</fieldset>
<script>
    function cleanForm() {
        $("#acc").val("");
        $("#pw").val("");
    }

    function login() {
        let data = {
            acc: $("#acc").val(),
            pw: $("#pw").val()
        };
        // console.log(data);
        $.post("./api/chkAcc.php", data, function(res) {
            if (parseInt(res)) {
                $.post("./api/chkPw.php",data,function(res) {
                    if(parseInt(res)) {
                        if(data.acc == 'admin') {
                            location.href="back.php";
                        }else{
                            location.href="index.php";
                        }
                    }else{
                        alert("密碼錯誤");
                        cleanForm();
                    }
                });
            } else {
                alert("查無帳號");
                cleanForm();
            }
        })
    }
</script>