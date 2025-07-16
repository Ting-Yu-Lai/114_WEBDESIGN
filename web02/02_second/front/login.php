<fieldset>
    <legend>會員登入</legend>
    <div class="ct">
        <div>
            <label for="acc">帳號</label>
            <input type="text" name="acc" id="acc" >
        </div>
        <div>
            <label for="pw">密碼</label>
            <input type="password" name="pw" id="pw" >
        </div>
        <div>
            <div style="display: inline-block;">
                <input type="button" value="登入" onclick="login()">
                <input type="reset" value="清除">
            </div>
            <div style="display: inline-block;">
                <a href="?do=forgot">忘記密碼</a>
                |
                <a href="?do=reg">尚未註冊</a>
            </div>
        </div>
    </div>
</fieldset>

<script>
    // 不能把它放在外面一開始就會是空的
    // let data = {
    //     acc:$("#acc").val(),
    //     pw:$("#pw").val(),
    // }
    function login() {
        let data = {
            acc:$("#acc").val(),
            pw:$("#pw").val(),
        }
        $.get("./api/chk_acc.php",data,(res)=>{
            if(parseInt(res)) {
                $.get("./api/chk_pw.php",data,(res)=>{
                    if(parseInt(res)) {
                        // 判斷是不是管理來決定要不要跳轉頁面
                        if(data.acc == 'admin') {
                            location.href="back.php";
                        }else{
                            location.href="index.php";
                        }
                    }else{
                        alert("密碼錯誤");
                            location.href="index.php?do=login";
                    }
                })
            }else{
                alert("查無帳號")
            }
        })
    }
</script>