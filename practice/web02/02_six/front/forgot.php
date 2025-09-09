<fieldset>
    <legend>忘記密碼</legend>
    請輸入信箱以查詢密碼<br>
    <input type="text" name="mail" id="mail"><br>
    <div id="show"></div>
    <button type="button" onclick="forgot()">查詢</button>
</fieldset>
<script>
    function forgot() {
        let mail = $("#mail").val();
        $.post("./api/forgot.php",{mail},function(res) {
            $("#show").append(res);
        })
    }
</script>