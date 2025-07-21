<fieldset>
    <legend>問卷調查</legend>
    <form action="./api/admin_que.php" method="post">
        <div style="display: flex;">
            <div style="width: 50%;">問卷名稱
                <input style="width: 50%;" type="text" name="subject">
            </div>
        </div>
        <div>
            <div class="items">
                <div class="item">
                    <label>選項</label>
                    <input type="text" name="option[]">
                    <button type="button" onclick="more()">更多</button>
                </div>
            </div>
        </div>
        <div>
            <input type="submit" value="新增">|
            <input type="reset" value="清空">
        </div>
    </form>
</fieldset>

<script>
function more() {
    let item = `
                <div class="item">
                    <label>選項</label>
                    <input type="text" name="option[]">
                </div>
    `;
    $(".items").append(item);
}
</script>