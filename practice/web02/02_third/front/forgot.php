<fieldset>
    <legend>忘記密碼</legend>
    <form>
        <div>請輸入信箱以查詢密碼：</div>
        <div><input type="text" name="email" id="email"></div>
        <div id="ans">您的密碼為:</div>
        <div>
            <input type="button" value="尋找" onclick="findpw()">
        </div>
    </form>
</fieldset>
<script>
    function findpw() {
        $.get("./api/forgot.php", {email: $("#email").val()}, (res) => {
            $("#ans").html(res);
        })
    }
</script>