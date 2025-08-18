<h2 class="ct">商品分類</h2>
<div class="ct">
    新增大分類
    <input type="text" name="big" id="type">
    <button onclick="addBig()">新增</button>
</div>
<div class="ct">
    新增中分類
    <select name="selbig" id="selbig"></select>
    <input type="text" name="mid" id="mid">
    <button>新增</button>
</div>

<table class="all">
    <tr class="tt">
        <td>假資料</td>
        <td class="ct"><button>修改</button><button>刪除</button></td>
    </tr>
    <tr class="ct pp">
        <td>123</td>
        <td class="ct"><button>修改</button><button>刪除</button></td>
    </tr>
</table>

<h2 class="ct">商品管理</h2>

<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <tr class="ct pp">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>狀態</td>
        <td>
            <button>修改</button>
            <button>刪除</button>
            <button>上架</button>
            <button>下架</button>
        </td>
    </tr>
</table>

<script>
    function addBig() {
        let name=$("#big").val();
        $.post("./api/save_type.php",{name,big_id:0},()=>{

        })
    }
</script>