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
                    <input type="reset" value="重置">
                </td>
                <td>
                    <a href="?do=forgot">忘記密碼</a>|
                    <a href="?do=reg">註冊帳號</a>
                </td>
            </tr>
        </table>
    </form>
</fieldset>