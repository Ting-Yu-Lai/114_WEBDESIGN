<div class="nav">
    目前位置: 首頁 > 分類網誌 > <span id="navType">健康新知</span>
</div>
<fieldset style="width: 100px;vertical-align:top;display:inline-block">
    <legend>分類網誌</legend>
    <div class="typeLink" data-type="1">健康新知</div>
    <div class="typeLink" data-type="2">菸害防治</div>
    <div class="typeLink" data-type="3">癌症防治</div>
    <div class="typeLink" data-type="4">慢性病防治</div>
</fieldset>
<fieldset style="width: 590px;vertical-align:top;display:inline-block">
    <legend>分類網誌</legend>
    <div class="typeList"></div>
    <div class="post"></div>
</fieldset>
<script>
getList(1);

$(".typeLink").on("click", function() {
    let tmp = $(this).text();
    $("#navType").text(tmp);
    let type = $(this).data("type");
    getList(type);
});

function getPost(post) {
    $.get("./api/getPost.php", {
        post
    }, function(res) {
        // console.log(res);
        $(".typeList").html("");
        $(".post").html(res);
    })
}

function getList(type) {
    $.get("./api/getTypeList.php", {
        type
    }, function(res) {
        $('.post').html("");
        $('.typeList').html(res);
        // console.log(res);
        $(".post-item").on("click", function() {
            let post = $(this).data("post");
            // console.log(post);
            getPost(post);
        })
    })
}
</script>