

<div class="nav" style="margin-top: 20px;">
    目前位置：首頁  > 分類網址 > <span id="NavType">健康新知</span>
</div>

<fieldset style="display: inline-block; width: 120px; vertical-align:top;">
    <legend>分類網址</legend>
    <div><a class="type-link" data-type="1">健康新知</a></div>
    <div><a class="type-link" data-type="2">菸害防治</a></div>
    <div><a class="type-link" data-type="3">癌症防治</a></div>
    <div><a class="type-link" data-type="4">慢性病防治</a></div>
</fieldset>
<fieldset style="width: 590px;display:inline-block">
    <legend>文章列表</legend>
    <div id="TypeList"></div>
    <div id="Post"></div>
</fieldset>


<script>
    $('.type-link').on('click', function(){
        let type = $(this).text();
        $('#NavType').text(type);
        // 抓取data-type的數值
        let typeId = $(this).data('type');
        // 把datatype傳去資料庫跟資料庫的定義好的type配對
        getList(typeId)
    })

    function getList(type) {
        $.get("")
    }
</script>