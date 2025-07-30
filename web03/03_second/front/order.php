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
        <div class="sessions"></div>
    </div>
</div>

<script>
    let url = new URLSearchParams(location.search);
    getMoives()

    function getMoives() {
        let id = 0;
        if (url.has('id')) {
            id = url.get('id');
        }
        $.get("./api/get_movies.php", {
            id
        }, (movies) => {
            $('#movie').html(movies);
        })

        $.get("./api/get_dates.php", {id}, (dates) => {
            $("#date").html(dates);
            
        })
    }
</script>