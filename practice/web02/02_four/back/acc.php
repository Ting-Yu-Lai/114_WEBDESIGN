<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/delAcc.php" method="post">
        <table class="ct" style="width: 80%;margin:10px auto">
            <tr class="ct" style="background-color: #eee;">
                <td>帳號</td>
                <td>密碼</td>
                <td>刪除</td>
            </tr>
            <?php
                $users = $User->all();
            foreach ($users as $user): ?>
            <tr class="ct">
                <td><?php echo $user['acc'];?></td>
                <td><?php echo str_repeat("*", strlen($user['pw']));?></td>
                <td><input type="checkbox" name="del[]" value="<?=$user['id'];?>" id=""></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
        </div>
    </form>
    <h2>新增會員</h2><span style="color: red;">請設定您要註冊的帳號及密碼(最長12個字元)</span>
    <table style="width: 90%;">
        <tr>
            <td style="background-color: #eee;;font-weight:bold">Step1:登入帳號</td>
            <td><input style="width:80%;" type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td style="background-color: #eee;;font-weight:bold">Step2:登入密碼</td>
            <td><input style="width:80%;" type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td style="background-color: #eee;;font-weight:bold">Step3:再次確認密碼</td>
            <td><input style="width:80%;" type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td style="background-color: #eee;;font-weight:bold">Step4:信箱(忘記密碼時使用)</td>
            <td><input style="width:80%;" type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <input type="button" onclick="reg()" value="新增">
                <input type="button" onclick="cleanform()" value="清除">
            </td>
        </tr>
    </table>

</fieldset>
<script>
    function cleanform() {
        $('#acc').val("");
        $('#pw').val("");
        $('#pw2').val("");
        $('#email').val("");
    }

    function login() {
        let data = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            email: $("#email").val(),
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

    function reg() {
        let data = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val(),
        }

        if(data.acc == '' || data.pw == '' || data.email == '' || data.pw2 == '') {
            alert("不可出現空白");
        } else if(data.pw != data.pw2) {
            alert("密碼錯誤");
        }else {
            $.get("./api/chkAcc.php",data,(res)=>{
                if(parseInt(res)) {
                    alert("帳號重複");
                } else {
                    $.post("./api/reg.php",data,(res)=>{
                        if(parseInt(res)) {
                            alert("註冊完成，歡迎加入");
                            location.href="?do=acc";
                        }else{
                            alert("註冊失敗請稍後在試");
                        }
                    })
                }
            })
        }
    }
</script>
