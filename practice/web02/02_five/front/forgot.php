<fieldset>
    <div>
        請輸入信箱以查詢密碼
    </div>
    <div>
        <input type="text" name="mail" id="mail">
    </div>
    <div id="show">
    </div>
    <button onclick="forgot()">尋找</button>
</fieldset>

<script>
    function forgot() {
        let mail = $("#mail").val();
        $.post("./api/forgot.php",{mail},function(res){
            $("#show").html("");
            $("#show").append(res);
        })
    }
</script>