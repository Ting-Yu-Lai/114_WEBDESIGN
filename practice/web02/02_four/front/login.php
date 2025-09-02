<fieldset>
    <legend>會員登入</legend>
    <table>
        <tr>
            <td>帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="text" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>
                <input type="button" onclick="login()" value="登入">
            </td>
            <td>
                <input type="button" onclick="cleanform()" value="清除">
            </td>
            <td>
                <a href="?do=forgot">
                    忘記密碼
                </a>|
                <a href="?do=reg">
                    尚未註冊
                </a>
            </td>
        </tr>
    </table>
</fieldset>
<script>
    function cleanform() {
        $('#acc').val("");
        $('#pw').val("");
    }

    function login() {
        let data = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
        }
        $.get("./api/chkAcc.php",data,(res)=>{
            if(parseInt(res)) {
                $.get("./api/chkPw.php",data,(res)=>{
                    if(parseInt(res)) {
                        if(data.acc == 'admin') {
                            location.href="back.php";
                        }else{
                            location.href = "index.php"
                        }
                    }else{
                        alert("密碼錯誤");
                        location.href = "index.php?do=login"
                    }
                })
            }else {
                alert("查無帳號");
                location.href = "index.php?do=login"
            }
        })
    }
</script>