
<h2>管理員登入</h2>
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt ct">驗證碼</td>
        <td class="pp">
        <?php
            $a = rand(10,99);
            $b = rand(10,99);
            $_SESSION['ans'] = $a+$b;
            echo "{$a} + {$b} = " ;
        ?>
            <input type="text" name="chk" id="chk">
        </td>
    </tr>
</table>
<div class="ct">
    <button onclick="login()">登入</button>
    <button>重置</button>
</div>

<script>
    function login() {
        let chk=$("#chk").val();
        $.get("./api/chkAns.php",{chk},(res)=>{
            if(parseInt(res) == 1) {
                $.get("./api/chkPw.php",{acc:$("#acc").val(),pw:$("#pw").val(),table:"Admin"},()=>{
                    if(parseInt(res)) {
                        location.href="back.php";
                    }else {
                        alert ("帳號密碼錯誤");
                    }
                })
            }else{
                alert("驗證失敗");
            }
        })
    }
</script>