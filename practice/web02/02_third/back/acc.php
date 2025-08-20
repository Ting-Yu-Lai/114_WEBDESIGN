<?php
if (isset($_POST['del']) && !empty($_POST['del'])) {
    foreach ($_POST['del'] as $id) { {
            $User->del($id);
        }
    }
}
?>
<fieldset>
    <legend>帳號管理</legend>
    <form action="?do=acc" method="post">
        <table class="ct" style="width: 70%;margin:auto;">
            <tr class="ct">
                <td width=40% style="background-color: #eee;">帳號</td>
                <td width=40% style="background-color: #eee;">密碼</td>
                <td width=10% style="background-color: #eee;">刪除</td>
            </tr>
            <?php
            $accs = $User->all();
            foreach ($accs as $acc):
            ?>
                <tr class="ct">
                    <td width=40%><?= $acc['acc']; ?></td>
                    <td width=40%><?= str_repeat("*", strlen($acc['pw'])); ?></td>
                    <td width=10%><input type="checkbox" name="del[]" value="<?= $acc['id']; ?>"></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>
                    <input type="submit" value="確定刪除">
                </td>
                <td>
                    <input type="reset" value="清空選取">
                </td>
            </tr>
        </table>
    </form>
    <h3>新增會員</h3>
    <p style="color: red;">*請設定您要註冊的帳號及密碼(最長12個字元)</p>
    <form>
        <table>
            <tr>
                <td>Step1：帳號</td>
                <td><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td>Step2：密碼</td>
                <td><input type="password" name="pw" id="pw"></td>
            </tr>
            <tr>
                <td>Step3：再次確認密碼</td>
                <td><input type="password" name="pw2" id="pw2"></td>
            </tr>
            <tr>
                <td>Step4：信箱</td>
                <td><input type="text" name="email" id="email"></td>
            </tr>
            <tr>
                <td>
                    <input type="button" value="新增" onclick="reg()">
                    <input type="reset" value="清除" onclick="cleanform()">
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
    function cleanform() {
        $("#acc").val("");
        $("#pw").val("");
        $("#pw2").val("");
        $("#email").val("");
    };

    function reg() {
        let data = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val(),
        };
        if (data.acc == "" || data.pw == "" || data.pw2 == "" || data.email == "") {
            alert("不可空白");
        } else {
            if (data.pw != data.pw2) {
                alert("密碼錯誤");
            } else {
                $.get("./api/chkAcc.php", {
                    acc: data.acc
                }, (res) => {
                    if (parseInt(res)) {
                        alert("帳號重複");
                    } else {
                        $.post("./api/reg.php", data, (res) => {
                            if (parseInt(res)) {
                                alert("註冊成功");
                                location.href = "?do=acc";
                            } else {
                                alert("註冊失敗請稍後在試");
                            }
                        })
                    }
                })
            }
        }
    }
</script>