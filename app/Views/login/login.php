
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>

<title>登入</title>

<link rel="stylesheet" href="../include/common_style.css">
<script language='javascript'>
    function FormLoad()
    {
            document.form1.USER.focus();	
    }		
    function ToApplyAccount() {
        window.location.href = '/Home/apply_account';
    }
   function check(formObj) {
   //檢查欄位是否填寫
   	if(formObj.USER.value=='' || formObj.PSWD.value==''){
   		alert('請輸入身分證和密碼！');
   		return false;
   	}
    window.open("/", "_parent");
   }
   String.prototype.hashCode = function() {
    var hash = 0, i, chr;
    if (this.length === 0) return hash;
    for (i = 0; i < this.length; i++) {
        chr   = this.charCodeAt(i);
        hash  = ((hash << 5) - hash) + chr;
        hash |= 0; // Convert to 32bit integer
    }
    return hash;
    };
    console.log("assdsddsadasdasdsadsad".hashCode())
</script>

<?php include '../app/views/header.php' ?>
<body>
    <div class="container">
        <h1>登入系統</h1>
        <div class="notice">
            ※請輸入身分證與密碼，若尚未申請帳號，請在右下角點選申請帳號。
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
                <input type='button' name='forget_password' value='忘記密碼' onClick='ToApplyAccount()'>
                <input type='button' name='apply' value='申請帳號' onClick='ToApplyAccount()'>
            </div>
        </form>
    </div>
</body>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</html>


<?php
if(!empty($posts)){
    echo '<h1> Username </h1>';
    foreach($posts as $posts_item){
        echo '
            <a href="/home/show/'.$posts_item['ID'].'">'.$posts_item['username'].'</a><br>';
    }
}
?>