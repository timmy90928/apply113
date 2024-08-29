<!DOCTYPE html>
<html lang="zh-Hant">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>設定密碼-申請入學</title>
        <link rel="stylesheet" href="/include/common_style.css">
    </head>

    <?php include '../app/views/header.php'?>

    <body>
        <div class="container">
            <h1>設定密碼</h1>
            <div class="notice">
                ※ 此頁面需有Email的連結令牌, 提交後會根據令牌檢查身分證號碼是否正確。
            </div>
            <form action="<?php echo "/Home/verify/password?token=" . $email_token?>" method="post">
                <div class="form-group">
                    <label for="id_number">身分證：</label>
                    <input name="id_number" type="text" id="id_number" maxlength="50" required>
                </div>
                <div class="form-group">
                    <label for="password">密碼：</label>
                    <input name="password" type="password" id="password" maxlength="20" required>
                </div>
                <div class="form-group">
                    <label for="password_again">再次輸入密碼：</label>
                    <input name="password_again" type="password" id="password_again" maxlength="20" required>
                </div>
                
                <div class="button-group">
                    <input type="submit" value="提交">
                    <input type="reset" value="重設">
                </div>
            </form>
        </div>  
    </body>
</html>