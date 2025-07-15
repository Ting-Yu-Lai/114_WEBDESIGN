<div class="nav" style="margin-bottom:20px"> 
    <!-- 我要根據點選的分類網址更新文字內容，所以我要賦予他一個id 或 class -->
    目前位置:首頁 > 分類網誌 > <span id="NavType">慢性病防治</span>
</div>

<fieldset style="width:120px;display:inline-block;vertical-align:top;" >
    <legend>分類網址</legend>
    <!-- 因為要用分類網址去更動上面Nav的文字內容，所以我要給他一個class(type-link)抓取我的text去改變上面的文字 -->
    <!-- 我要透過給予data-type來跟資料庫說我要抓取這個type -->
    <div><a class="type-link" data-type='1'>健康新知</a></div>
    <div><a class="type-link" data-type='2'>菸害防治</a></div>
    <div><a class="type-link" data-type='3'>癌症防治</a></div>
    <div><a class="type-link" data-type='4'>慢性病防治</a></div>
</fieldset>
<fieldset style="width:600px;display:inline-block;" >
    <legend>文章列表</legend>
    <div id="TypeList"></div>
    <div id="Post"></div>
</fieldset>
<script>
    // tpyeId傳進去的值是跟資料庫內的type一樣，所以才會抓取到數值
     getList(1);

    $(".type-link").on("click",function() {
        // 透過抓取typelink的字體去更新上面NavType
        let type = $(this).text();
        $("#NavType").text(type);
        // 給標題賦予id，從get_type_list拿到資料表的同樣id的title
        let typeId = $(this).data("type");
        getList(typeId);

    })

    function getPost(id) {
        $.get("./api/get_post.php",{id},function(post) {
            // 先把title清掉
            $("#TypeList").html("");
            $("#Post").html(post);
        })
    }

    $(".post-item").on("click",function(){
        let postId=$(this).data("post");
        getPost(postId);
    })

    // getList 會有時間緒的問題，如果把post在前面先執行，就會有先呈現在綁定所以可能會有無法顯示的問題
    function getList(type) {
            $.get("./api/get_type_list.php",{type},function(list){
            $("#Post").html("");
            $("#TypeList").html(list);

            $(".post-item").on("click",function(){
                let postId=$(this).data("post");
                
                getPost(postId);
            })
        })
    }
</script>