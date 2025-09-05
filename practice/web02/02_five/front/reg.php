<fieldset>
    <legend style="margin-bottom:10px;">會員註冊</legend>
    <div style="color:red">*請設定您要註冊的帳號及密碼(最常12個字元)</div>
    <table>
        <tr>
        <td style="background-color: #ddd;">Step1:登入帳號</td>
        <td width="60%"><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
        <td style="background-color: #ddd;">Step2:登入密碼</td>
        <td width="60%"><input type="text" name="pw" id="pw"></td>
        </tr>
        <tr>
        <td style="background-color: #ddd;">Step3:再次確認密碼</td>
        <td width="60%"><input type="text" name="pw2" id="pw2"></td>
        </tr>
        <tr>
        <td style="background-color: #ddd;">Step4:登入信箱(忘記密碼時使用)</td>
        <td width="60%"><input type="text" name="mail" id="mail"></td>
        </tr>
        <tr>
            <td>
                <button type="button" onclick="reg()">註冊</button>
                <button type="button" onclick="cleanForm()">清除</button>
            </td>
        </tr>
    </table>
</fieldset>
<script>
    function cleanForm() {
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
            mail: $("#mail").val()
        };

        if(data.acc != "" || data.pw != "" || data.pw2 != "" || data.mail != "") {
            if(data.pw == data.pw2) {
                $.post("./api/chkAcc.php",{acc:data.acc},function(res){
                    // console.log("res",res);
                    if(parseInt(res)){
                        alert("帳號重複");
                        cleanForm();
                    }else{
                        $.post("./api/reg.php",data,function(res){
                            if(parseInt(res)){
                                alert("註冊完成，歡迎加入");
                                location.href="?do=login";
                            }else{
                                alert("請稍後再試");
                            }
                        })
                    }
                })
            }else{
                alert("密碼錯誤");
                cleanForm();
            }
        } else {
            alert("不可空白");
            cleanForm();
        }
    }
</script>