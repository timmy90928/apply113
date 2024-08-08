<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>申請帳號</title>
    <link rel="stylesheet" href="../include/common_style.css">
    <script>
        function submitApplication() {
            alert("完成!");
        }
    </script>
</head>
<?php include '../app/views/header.php'?>
<body>
    
    <div class="container">
        <h1>申請帳號</h2>
        <form action="/Home/verify/apply" method="post">
            <table class="form-table">
                <tr>
                    <td class='form-label' for='name'>姓名：</td>
                    <td><input name='name' type='text' id='name' size='40' maxlength='50' required></td>
                </tr>
                <tr>
                    <td class='form-label' for='id_number'>身分證：</td>
                    <td><input name='id_number' type='text' id='id_number' size='40' maxlength='50' required></td>
                </tr>
                <tr>
                    <td class='form-label' for='email'>電子信箱：</td>
                    <td><input name='email' type='email' id='email' size='40' maxlength='50' required></td>
                </tr>
                <tr>
                    <td class='form-label' for='phone'>手機號碼：</td>
                    <td><input name='phone' type='tel' id='phone' size='40' maxlength='50' required></td>
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
                <div class="g-recaptcha" data-sitekey="6Lc8lCEqAAAAAJDu4UK4nk78JUJzFQXvvRmEipuW" style="margin: 10px auto;"></div>
                <input type="hidden" name="g-captcha-response" id="g-captcha-response">
                <input type='submit' value='提交'>
                <input type='reset' value='重設'>
            </div>
        </form>
    </div>
        
<?php  include '../app/views/footer.php'?>
</body>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</html>