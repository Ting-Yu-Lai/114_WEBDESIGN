<fieldset>
    <legend>
        新增問卷
    </legend>
    <form action="./api/add_que.php" method="post">
        <div style="display: flex;">
            <div>問卷名稱</div>
            <div style="width: 80%;"><input type="text" name="text" id="text"></div>
        </div>
        <div id="items" style="display: flex;flex-direction: column;">
            <div class="item">
                <label for="subject">選項</label>
                <input type="text" name="option[]" class="option">
                <button type="button" onclick="more()">更多</button>
            </div>
        </div>
        <div>
            <button>新增</button>|
            <button type="button" onclick="clean()">清空</button>
        </div>
    </form>
</fieldset>
<script>
    function more() {
        let item = `
            <div class="item">
                <label for="subject">選項</label>
                <input type="text" name="option[]" class="option">
            </div>
        `;
        $("#items").append(item);
    }
    function clean() {
        $('.option').val("");
        $('#text').val("");
    }
</script>