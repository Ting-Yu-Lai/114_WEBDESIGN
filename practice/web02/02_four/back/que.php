<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/backQue.php" method="post">
        <div>
            <div>
                問卷名稱 <input type="text" name="subject" id="subject">
            </div>
        </div>
        <div class="options" style="width: 90%; background-color:#eee">
            <div class="option">
                選項 <input type="text" name="option[]" id=""> <button onclick="more()" type="button">更多</button>
            </div>
        </div>
    <div >
        <input type="submit" value="新增">|<input type="reset" value="清空">
    </div>
    </form>
</fieldset>
<script>
    function more() {
        let tmpText = `
        <div class="option">
            選項 <input type="text" name="option[]" id="">
        </div>
        `;
        $(".options").append(tmpText)
    }
</script>