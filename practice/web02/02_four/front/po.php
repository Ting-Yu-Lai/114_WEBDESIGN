<div class="nav" style="margin-bottom: 20px;">
    目前位置: 首頁 > 分類網誌 > <span id="navType">健康新知</span>
</div>
<fieldset style="width: 120px;display:inline-block;vertical-align:top">
    <legend>分類網誌</legend>
    <div><a class="typeLink" data-type="1">健康新知</a></div>
    <div><a class="typeLink" data-type="2">菸害防治</a></div>
    <div><a class="typeLink" data-type="3">癌症防治</a></div>
    <div><a class="typeLink" data-type="4">慢性病防治</a></div>
</fieldset>
<fieldset style="width: 590px;display:inline-block;vertical-align:top">
    <legend>文章列表</legend>
    <!-- 要拿出哪個type -->
    <div id="typeList"></div>
    <!-- 從哪個type確認要拿出哪邊文章 -->
    <div id="Post"></div>
</fieldset>

<script>
    // 預先執行拿到第一則文章
    getList(1);

    $(".typeLink").on("click",function(){
        let type = $(this).text();
        $("#navType").text(type);
        // 拿到當前type到後端撈資料 顯示type的文章放到typeList
        let typeId = $(this).data("type");
        // funciton
        getList(typeId);
    })

    function getPost(id) {
        $.get("./api/getPost.php",{id},function(res){
            $("#typeList").html("");
            console.log(res);
            
            $('#Post').html(res);
        })
    }

    $(".postItem").on("click",function(){
        let postId = $(this).data("post");
        // console.log(postId);
        getPost(postId);
    })

    function getList(type) {
        $.get("./api/getTypeList.php",{type},function(res){
            // 先清空當前文章
            $("#Post").html("");
            $("#typeList").html(res);
            $(".postItem").on("click",function(){
                let postId = $(this).data("post");
                // console.log(postId);
                getPost(postId);
            })
        })
    }
</script>
