<fieldset>
    <table>
        <tr>
            <td>請輸入信箱以查詢密碼</td>
        </tr>
        <tr>
            <td><input type="text" name="eamil" id="email"></td>
        </tr>
        <tr>
            <td id="showpw">
            </td>
        </tr>
        <tr>
            <td>
                <input type="button" onclick="forgot()" value="尋找">
            </td>
        </tr>
    </table>
</fieldset>
<script>
function forgot() {
    // console.log("click ok");
    let email = $("#email").val();

    
    $.get("./api/chkMail.php", {email}, (res) => {
        $("#showpw").html("");
        console.log(res);
        $("#showpw").html(res);
    })
}
</script>