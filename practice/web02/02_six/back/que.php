<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/que.php" method="post">
        <div>
            問卷名稱 <input type="text" name="text" id="text">
        </div>
        <div class="items">
            <div class="item">
                選項 <input type="text" name="option[]"> <button type="button" onclick="more()">更多</button>
            </div>
        </div>
        <div>
            <input type="submit" value="新增">|<input type="reset" value="清空">
        </div>
    </form>
</fieldset>
<script>
    function more() {
        let tmp = `
        <div class="item">
            選項 <input type="text" name="option[]">
        </div>
        `;
        $(".items").append(tmp);
    }
</script>