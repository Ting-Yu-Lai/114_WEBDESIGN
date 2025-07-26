<style>
    .movie {
        width: 1000px;
        height: 500px;
        background-color: #ccc;
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
    }

    .box3 {
        width: 75%;
        height:150px;
        background-color: blue;
        display: flex;
        flex-wrap: wrap;
        /* justify-content: start; */
    }
    .col1 {
        width: 100%;
    }
    .col2 {
        width: 100%;
    }
    .col3 {
        width: 100%;
    }
</style>

<div class="movie">
    <div class="btn-box" style="width: 100%;height:40px;margin-top:10px;margin-left:3px;">
        <button type="button">新增電影</button>
    </div>
    <div class="content" style="width: 100%;">
        <div class="img" style="width: 15%;"></div>
        <div class="level" style="width: 10%;"></div>
        <div class="box3">
            <div class="col1" style="display: flex;justify-content: space-around;">
                <div>片名:</div>
                <div>片長:</div>
                <div>上映時間:</div>
            </div>
            <div class="col2" style="display: flex;justify-content: start;">
                <button>往上</button>
                <button>往下</button>
                <button>編輯電影</button>
                <button>刪除電影</button>
            </div>
            <div class="col3" style="display: flex;justify-content: start;">劇情介紹:</div>
        </div>
    </div>
</div>