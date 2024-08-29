<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>登入系統-申請入學</title>

        <link rel="stylesheet" href="../include/common_style.css">
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
    </head>

    <?php include '../app/views/header.php' ?>

    <body>
        <div class="container">
            <h1>登入系統</h1>
            <div class="notice">
                ※若忘記或欲修改密碼，請輸入身分證號碼後，並點選忘記密碼。若尚未申請帳號，請在右下角點選申請帳號。
            </div>

            <form action="/Home/verify/login" method="post">
                <div class="form-group">
                    <label for="USER">身分證：</label>
                    <input name='USER' type='text' id='USER' maxlength='18'>
                </div>
                <div class="form-group">
                    <label for="PSWD">密碼：</label>
                    <input name='PSWD' type='password' id='PSWD' maxlength='20'>
                </div>
                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6Lc8lCEqAAAAAJDu4UK4nk78JUJzFQXvvRmEipuW"></div>
                    <input type="hidden" name="g-captcha-response" id="g-captcha-response">
                </div>
                <div class="button-group">
                    <div>
                        <input type='submit' value='登入'>
                        <input type='reset'  value='重設'>
                    </div>
                    <div>
                        <input type='button' name='forget_password' value='忘記密碼/更改密碼' onClick='ToForgetPassword()'>
                        <input type='button' name='apply' value='申請帳號' onClick='ToApplyAccount()'>
                    </div>
                </div>
            </form>
        </div>
    </body>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
</html>

<?php
// if(!empty($posts)){
//     echo '<h1> Username </h1>';
//     foreach($posts as $posts_item){
//         echo '
//             <a href="/home/show/'.$posts_item['ID'].'">'.$posts_item['username'].'</a><br>';
//     }
// }
?>