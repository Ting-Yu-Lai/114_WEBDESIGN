<fieldset>
    <legend>新增問卷</legend>
    <div>
        <div>
            問卷名稱 <input type="text" name="text" id="">
        </div>
    </div>
    <div class="options" style="width: 90%; background-color:#eee">
        <div class="option">
            選項 <input type="text" name="option[]" id=""> <button onclick="more()" type="button">更多</button>
        </div>
    </div>
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