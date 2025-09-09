<fieldset>
    <legend>會員登入</legend>
    <table>
        <tr>
            <td>帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>
                <input type="button" onclick="login()" value="登入">
                <input type="button" onclick="cleanF()" value="清除">
            </td>
            <td>
                <a href="?do=forgot">忘記密碼</a>|
                <a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</fieldset>
<script>
    function cleanF() {
        $("#acc").val("");
        $("#pw").val("");
    }
    function login() {
        let data = {
            acc: $("#acc").val(),
            pw: $("#pw").val()
        };

        $.post("./api/chkAcc.php",{acc:data.acc},function(res) {
            if(parseInt(res)) {
                $.post("./api/chkPw.php",data,function(res) {
                    if(parseInt(res)) {
                        if(data.acc == 'admin') {
                            location.href="back.php";
                        }else{
                            location.href="index.php";
                        }
                    }else{
                        
                        alert("密碼錯誤");
                        cleanF();
                    }
                })
            }else{
                alert("查無帳號");
                cleanF();
            }
        })
    }
</script>
