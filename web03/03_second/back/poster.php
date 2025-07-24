<style>
    .full {
        /* height: 490px; */
        width: 100%;
        /* background-color: #ccc; */
    }

    .posterlist {
        width: 95%;
        height: 70%;
    }

    .newposter {
        width: 95%;
        height: 30%;

    }

    .newtable {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<div class="full">
    <div class="posterlist">
        <h3 class="ct">預告片清單</h3>

    </div>

    <hr>
    <div class="newposter">
        <h3 class="ct">新增預告片海報</h3>
        <form action="./api/add_poster.php" method="post" enctype="multipart/form-data">
            <table class="newtable">
                <tr>
                    <td>預告片海報：</td>
                    <td><input type="file" name="img" id="img"></td>
                    <td>預告片片名：</td>
                    <td><input type="text" name="name" id="name"></td>
                </tr>
                <tr class="ct"> 
                    <td >
                        <input type="submit" value="新增">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </table>
            
        </form>
    </div>
</div>