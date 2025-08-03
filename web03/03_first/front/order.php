<!-- 訂票系統有可能是從intro來帶著id有可能是從前台來沒有id -->
<!-- 線上訂票其實可以不用做 -->
<style>
    #orderForm {
        width:60%;
        margin: 10px auto;
        padding: 20px;
        border: 1px solid #ccc;
        background: #aaa;
    }

    #orderForm td {
        background: #ccc;

    }

    #orderForm td:nth-child(1) {
        width:20%;
        text-align: center;
    }
    #orderForm td:nth-child(2) select{
        width:98%;
        text-align: center;
    }
</style>
<h2>線上訂票</h2>

<table id="orderForm">
    <tr>
        <td>電影：</td>
        <td>
            <select name="movie" id="movie">

            </select>
        </td>
    </tr>
    <tr>
        <td>日期：
        </td>
        <td>
            <select name="date" id="date">

            </select>
        </td>
    </tr>
    <tr>
        <td>場次：</td>
        <td>
            <select name="session" id="session"></select>
        </td>
    </tr>
</table>
<div class="ct">
    <button>確定</button>
    <button>重置</button>
</div>

<script>
    let url = new URLSearchParams(location.search);
    getMovies();
    // onchange的事件
    $("#movie").on('change',function() {
        getDates($(this).val());
    })
    $("#date").on('change',function() {
        getSession($("#date").val(),$(this).val());
    })
    // 拿到movie的方法
    function getMovies(){
        let id = 0
        if(url.has('id')) {
            id = url.get('id');
        }
        $.get("./api/get_movies.php",{id},(movies)=>{
            $('#movie').html(movies);
            // 傳入當下#movie的id
            getDates($('#movie').val());
        })
    }

    function getDates(movieId) {
        $.get("./api/get_dates.php",{movieId},(dates)=>{
            $('#date').html(dates);
            // sessions後才有的
            getSessions(movieId, $("#date").val());
        })
    }

    // session的程式碼
    function getSessions(movieId, date) {
        $.get('./api/get_sessions.php',{movieId, date},(sessions)=>{
            $("#session").html(sessions);
        })
    }

    $('.btn-submit').on('click',function() {
        $.get("./api/get_booking.php",{
            id:$('#movie').val(),
        })
    })
</script>