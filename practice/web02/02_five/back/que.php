
<fieldset>
        <form action="./api/backQue.php" method="post">
        <legend>新增問卷</legend>
        <div class="queName" style="display: flex;">
                問卷名稱
            <input type="text" name="subject" id="subject">
        </div>
        <div class="optionItem">
            <div class="optionRow">
                選項 <input type="text" name="option[]" class="option"><button type="button" id="moreBtn">更多</button>
            </div>
        </div>
        <div class="ct">
            <input type="submit" value="新增">|
            <input type="reset" value="清空">
        </div>
    </form>
    </fieldset>
<script>
    $("#moreBtn").on("click",function(){
        // console.log("click ok");
        
        let tmpText = `
        <div  class="optionRow">
        選項 <input type="text" name="option[]" class="option">
        </div>
        `;
        $(".optionItem").append(tmpText);
    })


</script>