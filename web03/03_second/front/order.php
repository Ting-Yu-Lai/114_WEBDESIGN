<style>
    .order-list{
        display: flex;
        justify-content: center;
        width:50%;
        margin: auto;
        flex-wrap: wrap;
    }
</style>
<?php $movies = $Movie->all();?>

<div class="order-list">
    <div class="col1" style="width: 100%;background-color:#ccc;">
        電影:
        <select name="name" id="">
            <option value="<?=$movies['id'];?>" <?=($movies['id'] == $_GET['id'])?'selected':'';?>><?=$movies['name'];?></option>
        </select>
    </div>
    <div class="col2" style="width: 100%;background-color:#ccc;">
        日期:
    </div>
    <div class="col3" style="width: 100%;background-color:#ccc;">
        場次:
    </div>
</div>