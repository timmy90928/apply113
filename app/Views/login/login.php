<?php 
$WEB_NAME = '登入';
include '../app/views/header.php';
?>
<link rel="stylesheet" href="/include/common_style.css">
<script language='javascript'>
    function FormLoad(){
        document.form1.USER.focus();	
    }		
    function ToApplyAccount() {
        window.location.href = '/Home/apply_account';
    }
    function ToForgetPassword() {
        var userValue = document.getElementById('USER').value;
        window.location.href = '/Home/verify/forget_password?USER=' + encodeURIComponent(userValue);
    }
</script>
<body>
    <div class="container">
        <h1>登入系統</h1>
        <div class="notice">
            ※若忘記或欲修改密碼，請輸入身分證號碼後，並點選忘記密碼。若尚未申請帳號，請在右下角點選申請帳號。
        </div>

        <form action="/Home/verify/login" method="post">

            <table class="form-table">
                <tr>
                    <td class='form-label'>身分證：</td>
                    <td><input name='USER' type='text' id='USER' size='18' maxlength='18'></td>
                </tr>
                <tr>
                    <td class='form-label'>密碼：</td>
                    <td><input name='PSWD' type='password' id='PSWD' size='20' maxlength='20'></td>
                </tr>
            </table>
            <div class="center">
                <div class="g-recaptcha" data-sitekey="6Lc8lCEqAAAAAJDu4UK4nk78JUJzFQXvvRmEipuW" style="margin: 10px auto;"></div>
                <input type="hidden" name="g-captcha-response" id="g-captcha-response">
                <input type='submit' value='登入'>
                <input type='reset'  value='重設'>
                <input type='button' name='forget_password' value='忘記密碼/更改密碼' onClick='ToForgetPassword()'>
                <input type='button' name='apply' value='申請帳號' onClick='ToApplyAccount()'>
            </div>
        </form>
    </div>
</body>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</html>