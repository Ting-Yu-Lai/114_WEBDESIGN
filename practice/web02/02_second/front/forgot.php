<fieldset>
    <legend>請輸入信箱以查詢密碼</legend>
    <input type="email" name="email" id="email">
    <div class="ans">

    </div>
    <input type="button" value="尋找" onclick="search()">
</fieldset>
<script>
    function search() {
        $.get("./api/chk_email.php",{email:$("#email").val()},(res)=>{
            // 直接把結果塞入ans
            $('.ans').html(res);
        })
    }
</script>