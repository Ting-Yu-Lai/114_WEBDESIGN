<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/admin_que.php" method="post">
        <div>
            <div>
                <label for="subject">問卷名稱</label>
                <input type="text" name="subject" id="subject">
            </div>
            <div class="items">
                <label for="">選項</label>
                <input class="item"  type="text" name="option[]" >
                <button type="button" onclick="more()">
                    更多
                </button>
                <br>
            </div>
            <div>
                <input type="submit" value="新增">
                |
                <input type="reset" value="清空">
            </div>
        </div>
    </form>

</fieldset>
<script>
    function more() {
        let tmpText = `
            <label for="">選項</label>
            <input class="item"  type="text" name="option[]" >
            <br>
        `;
        $('.items').append(tmpText);
    }
</script>