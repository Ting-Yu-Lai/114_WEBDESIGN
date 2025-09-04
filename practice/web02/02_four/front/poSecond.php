<div class="nav">
    目前位置 > 首頁 > 分類網誌 > <span id="#navType">健康新知</span>
</div>
<fieldset style="width:120px;display:inline-block;vertical-align:top;">
    <legend>分類網誌</legend>
    <div><a class="typeLink" data-type="1">健康新知</a></div>
    <div><a class="typeLink" data-type="2">菸害防治</a></div>
    <div><a class="typeLink" data-type="3">癌症防治</a></div>
    <div><a class="typeLink" data-type="4">慢性病防治</a></div>
</fieldset>
<fieldset style="width: 590px;display:inline-block;vertical-align:top;">
    <legend>文章列表</legend>
    <div id="typeList"></div>
    <div id="Post"></div>
</fieldset>
<script>
    getList(1);

    function getPost(id) {
        $.get("./api/getPost.php", {
            id
        }, function(res) {
            $("#typeList").html("");
            $("#Post").html(res);
        })
    }

    $(".postItem").on("click", function() {
        let postId = $(this).data('post');
        getPost(postId);
    })

    function getList(type) {
        $.get("./api/getTypeList.php", {
            type
        }, function(res) {
            $("#Post").html("");
            $("#typeList").html(res);
            $(".postItem").on("click", function() {
                let postId = $(this).data('post');
                getPost(postId);
            })
        })
    }
</script>