<h3>新增標題區圖片</h3>
<hr>
<form action="./api/insert_title.php" method="post" enctype="multipart/form-data">
    <label for="text">標題區圖片：</label>
    <input type="file" name="title" id="title">
    <div class="div">
        <label for="text">標題區替代文字：</label>
        <input type="text" name="text" id="text">
    </div>
    <div class="div">
        <button type="submit">新增</button>
        <button type="reset">重置</button>
    </div>
</form>