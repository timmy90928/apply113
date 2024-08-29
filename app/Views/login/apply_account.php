<!DOCTYPE html>
<html lang="zh-Hant">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>註冊帳號-申請入學</title>
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
            <h1>註冊帳號</h1>
        
            <div class="notice">
                ※ 身分證將做為日後登入之帳號，電子信箱將使用於忘記密碼與通知。(身分證與姓名申請後皆不可修改)
            </div>

            <form action="/Home/verify/apply" method="post">
                <div class="form-group">
                    <label for="name">姓名：</label>
                    <input name='name' type='text' id='name' maxlength='50' required>
                </div>
                <div class="form-group">
                    <label for="id_number">身分證：</label>
                    <input name='id_number' type='text' id='id_number' maxlength='50' required>
                </div>
                <div class="form-group">
                    <label for="email">電子信箱：</label>
                    <input name='email' type='email' id='email' maxlength='50' required>
                </div>
                
                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6Lc8lCEqAAAAAJDu4UK4nk78JUJzFQXvvRmEipuW"></div>
                    <input type="hidden" name="g-captcha-response" id="g-captcha-response">
                </div>
                
                <div class="button-group">
                    <input type='submit' value='提交'>
                    <input type='reset' value='重設'>
                </div>
            </form>
        </div>

    </body>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</html>