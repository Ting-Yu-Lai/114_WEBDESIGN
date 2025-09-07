<div class="nav">
    目前位置 : 首頁 > 分類網誌 > <span id="navSpan">慢性病防治</span>
</div>
<fieldset style="vertical-align: top;display:inline-block;width:100px;">
    <legend>分類網誌</legend>
    <div><a class="typeLink" data-type="1">健康新知</a></div>
    <div> <a class="typeLink" data-type="2">菸害防治</a></div>
    <div> <a class="typeLink" data-type="3">癌症防治</a></div>
    <div>
        <a class="typeLink" data-type="4">慢性病防治</a>
    </div>
</fieldset>
<fieldset style="vertical-align: top;display:inline-block;width:590px;">
    <legend>文章列表</legend>
    <div class="typeList"></div>
    <div class="Post"></div>
</fieldset>
<script>
    getList(1);

    $(".typeLink").on("click", function() {
        let typeId = $(this).data("type");
        $(".typeList").html("");
        $(".Post").html("");
        getList(typeId);
    })

    $(".postItem").on("click", function() {
        let postId = $(this).data("post");
        $(".typeList").html("");
        getPost(postId);
    })

    function getPost(postId) {
        $.get("./api/getPost.php", {
            postId
        }, function(res) {
            $(".typeList").html("");
            $(".Post").html(res);
        })
    }

    function getList(type) {
        $.get("./api/getList.php", {
            type
        }, function(res) {
            console.log(res);
            $("#Post").html("");
            $(".typeList").html(res);
            $(".postItem").on("click", function() {
                let postId = $(this).data("post");
                $(".typeList").html("");
                getPost(postId);
            })
        })
    }
</script>