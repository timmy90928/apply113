<?php 
$WEB_NAME = '設定密碼';
include '../app/views/header.php';
?>
<link rel="stylesheet" href="/include/common_style.css">
<body>
    
    <div class="container">
        <h1>設定密碼</h2>
        <div class="notice">
            ※ 此頁面需有Email的連結令牌, 提交後會根據令牌檢查身分證號碼是否正確。
        </div>
        <form action=<?php echo "/Home/verify/password?token=" . $email_token?> method="post">
            <table class="form-table">
                <tr>
                    <td class='form-label' for='id_number'>身分證：</td>
                    <td><input name='id_number' type='text' id='id_number' size='40' maxlength='50' required></td>
                </tr>
                <tr>
                    <td class='form-label' for='password'>密碼：</td>
                    <td><input name='password' type='password' id='password' size='40' maxlength='20' required></td>
                </tr>
                <tr>
                    <td class='form-label' for='password'>再次輸入密碼：</td>
                    <td><input name='password_again' type='password' id='password_again' size='40' maxlength='20' required></td>
                </tr>
            </table>
            
            <div class='center'>
                <input type='submit' value='提交'>
                <input type='reset' value='重設'>
            </div>
        </form>
    </div>
        

<?php  include '../app/views/footer.php'?>

</body>
</html>