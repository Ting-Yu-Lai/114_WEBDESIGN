<style>
    .order-list {
        display: flex;
        justify-content: center;
        width: 50%;
        margin: auto;
        flex-wrap: wrap;
    }
</style>
<?php $movies = $Movie->all(); ?>

<div class="order-list">
    <div class="col1" style="width: 100%;background-color:#ccc;">
        電影:
        <select name="movie" id="movie"></select>
    </div>
    <div class="col2" style="width: 100%;background-color:#ccc;">
        日期:
        <select name="date" id="date"></select>
    </div>
    <div class="col3" style="width: 100%;background-color:#ccc;">
        場次:
        <select name="sessions" id="sessions"></select>
    </div>
</div>

<script>
    let url = new URLSearchParams(location.search);
    getMoives()
    $("#movie").on('change',function() {
        getDate($(this).val());
    })
    $('#date').on('change',function(){ 
        getSession($("#movie").val(),$(this).val())
    })

    function getMoives() {
        let id = 0;
        if (url.has('id')) {
            id = url.get('id');
        }
        $.get("./api/get_movies.php", {id}, (movies) => {
            $('#movie').html(movies);
            getDate($('#movie').val());
        })

    }
    
    function getDate(id) {
        $.get("./api/get_dates.php", {id}, (dates) => {
            $("#date").html(dates);
            getSession(id,$("#date").val());
        })
    }

    function getSession(id,date){
        $.get("./api/get_sessions.php",{id,date},(sessions)=>{
            $("#sessions").html(sessions);
        })
    }
</script>