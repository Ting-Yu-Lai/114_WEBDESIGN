<fieldset>
    <legend>會員登入</legend>
    <form>
        <table>
            <tr>
                <td>帳號：</td>
                <td><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td>密碼：</td>
                <td><input type="password" name="pw" id="pw"></td>
            </tr>
            <tr>
                <td>
                    <input type="button" value="登入" onclick="login()">
                    <input type="reset" value="重置" onclick="cleanform()">
                </td>
                <td>
                    <a href="?do=forgot">忘記密碼</a>|
                    <a href="?do=reg">註冊帳號</a>
                </td>
            </tr>
        </table>
    </form>
</fieldset>
<script>
    function login() {
        let data = {
            acc:$("#acc").val(),
            pw:$("#pw").val(),
        };

        // 先判斷有沒有這個帳號
        $.get("./api/chkAcc.php",data,(res)=>{
            if(parseInt(res)) {
                // 在比對密碼
                $.get("./api/chkPw.php",data,(res)=>{
                    if(parseInt(res)) {
                        if(data.acc == 'admin') {
                            location.href='back.php';
                        }else {
                            cleanform();
                            locaiton.href='index.php?do=main';
                        }
                    }else {
                        alert("密碼錯誤");
                        cleanform();
                        locaiton.href="index.php?do=login";
                    }
                })
            }else {
                alert("查無此帳號");
                cleanform();
            }
        })
    }

    function cleanform() {
        $("#acc").val("");
        $("#pw").val("");
    }
</script>