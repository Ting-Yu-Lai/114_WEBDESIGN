<style>
    #orderT {
        width: 50%;
        margin:10px auto;
        /* background-color: blue; */
    }
    #orderT td {
        background-color: #ccc;
    }
    #orderT td:nth-child(1) {
        width: 20%;
        text-align: center;
    }
    #orderT td:nth-child(2) {
        width: 100%;
        text-align: center;
    }
    #orderT td:nth-child(2) select {
        width: 100%;
        text-align: center;
    }
</style>
<div id="orderT">
    <h3 class="ct">線上訂票</h3>
    <table style="width: 100%;">
        <tr>
            <td>電影:</td>
            <td><select name="movie" id="movie"></select></td>
        </tr>
        <tr>
            <td>日期:</td>
            <td><select name="date" id="date"></select></td>
        </tr>
        <tr>
            <td>場次:</td>
            <td><select name="session" id="session"></select></td>
        </tr>
    </table>
    <div class="ct">
        <button class="btn-submit">確定</button>
        <button class="btn-reset">重置</button>
    </div>
</div>

<div id="booking" style="display: none;">

</div>

<script>
    const url = new URLSearchParams(location.search);
    const getId = () => url.get("id") || 0;
    getMovie();

    $("#movie").on("change",function() {
        getDays($(this).val());
    });
    
    $("#date").on("change",function() {
        // console.log($(this).val());
        
        getSessions($("#movie").val(),$(this).val());
    });

    $(".btn-submit").on("click",function(){
        $.get("./api/getBooking.php",{
            id: $("#movie").val(),
            date: $("#date").val(),
            session: $("#session").val(),
        }, (res)=>{
            $("#booking").html(res);
            // $('.btn-prev').on("click",function(){})
            $("#orderT").hide();
            $("#booking").show();
        })
    })

    function getMovie() {
        $.get("./api/getMovies.php",{id:getId()},function(res) { 
            // console.log(res);
            $("#movie").html(res);
            // console.log($("#movie").val());
            
            getDays($("#movie").val());
        })
    }

     function getDays(movieId){
        $.get("./api/getDates.php",{movieId},(res)=>{
            $('#date').html(res);
            // console.log(res);
            //再將movie id 跟日期送去找場次
            getSessions(movieId,$('#date').val());
        })
    }

    function getSessions(movieId, date) {
        
        $.get("./api/getSess.php",{movieId,date},function(res) {
            console.log(res);
            $("#session").html(res);
        })
    }
    
    
</script>