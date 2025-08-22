<fieldset>
    <legend>
        新增問卷
    </legend>
    <form action="?do=que" method="post">
        <div style="display: flex;">
            <div style="width: 20%;">問卷名稱</div>
            <div style="width: 80%;"><input type="text" name="text" id="text" style="width: 79%;"></div>
        </div>
        <div id="item">
            <label for="subject">選項</label>
            <input type="text" name="option[]" id="" style="width:70%;">
            <button onclick="more()">更多</button>
        </div>
    </form>
</fieldset>
<script>
    function more() {
        let item = `<input type="text" name="option[]" id="" style="width:70%;">`;
    }
</script>