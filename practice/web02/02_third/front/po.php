<div class="nav" style="margin-bottom: 20px;">
    目前位置:首頁 > 分類網址 > <span id="navp">慢性病防治</span>
</div>
<fieldset style="width:110px; display: inline-block;vertical-align:top">
    <legend>分類網址</legend>
    <div class="type-link" data-type="1">健康新知</div>
    <div class="type-link" data-type="2">菸害防制</div>
    <div class="type-link" data-type="3">癌症防治</div>
    <div class="type-link" data-type="4">慢性病防治</div>
</fieldset>
<fieldset style="width:540px;display: inline-block;">
    <legend>文章列表</legend>
    <div id="typeList"></div>
    <div id="post"></div>
</fieldset>
<script>
    getList(1);

    // 先更新navp 拿到class更新navp
    $(".type-link").on("click", function() {
        let type = $(this).text();
        // console.log(type);
        $("#navp").text("");
        $("#navp").text(type);
        let typeId = $(this).data('type');
        getList(typeId);
    });

    function getPost(id) {
        $.get("./api/get_post.php", {
            id
        }, function(post) {
            // 把標體變不見
            $("#typeList").html("");
            // 把文章秀出來
            $("#post").html(post);
        })
    }

    $(".post-item").on("click", function() {
        let postId = $(this).data("post");
        getPost(postId);
    })


    // 再拿到datatype 去列出有的list
    function getList(type) {
        $.get("./api/get_type_list.php", {
            type
        }, function(list) {
            $("#post").html("");
            $('#typeList').html(list);
            // 拿到從get_type_list回來的post id 傳給getPost
            $('.post-item').on("click", function() {
                let postId = $(this).data("post");
                    getPost(postId);
            })
        })
    }
</script>