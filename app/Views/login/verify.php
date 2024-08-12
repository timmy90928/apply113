<?php
use App\Models\Post;

/**
 * Show warning and return to previous page.
 * 
 * @param string $msg Error message.
 */
function alert($msg){
    echo '
    <script>
        alert("' . htmlspecialchars($msg, ENT_QUOTES, 'UTF-8') . '");
        window.onload = function() {
            window.history.back();
        };
    </script>';
    exit();
}

/**
 * The web page is moved to the specified URL.
 */
function toURL($url){
    header("Location: $url");
    exit();
}

/**
 * Check whether REQUEST METHOD is POST.
 */
function assert_method(){
    if ($_SERVER["REQUEST_METHOD"] != "POST"){
        alert("REQUEST_METHOD必須為POST");
    };
}

/**
 * Verify google captcha.
 */
function assert_hcaptcha(){
    $secret = '6Lc8lCEqAAAAAGkB2TkEBkOR5uqdck5W9oTCajaK';
    $response = $_POST['g-recaptcha-response'];
    $remoteIp = $_SERVER['REMOTE_ADDR'];

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => $secret,
        'response' => $response,
        'remoteip' => $remoteIp
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ],
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $resultJson = json_decode($result);

    if (!isset($resultJson->success) || !$resultJson->success) {
        alert("請勾選我不是機器人");
        return;
    }
}

/**
 * Check whether the password is the same as the password entered again.
 */
function assert_password(){
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $passwordAgain = isset($_POST['password_again']) ? $_POST['password_again'] : '';

    if ($password !== $passwordAgain) {
        alert("兩次密碼不相同");
    }
}

/**
 * Generate Hash value.
 * 
 * verify password:
 * ```php
 * if (!password_verify($password, $hashedPassword)){error($msg);}
 * ```
 */
function bcrypt($password){
    // verify password: if (password_verify($password, $hashedPassword))
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    return $hashedPassword;
}


function store_account(){
    $model = new Post();
    $data = [
        "username"	    => 'user1',
        "Permissions"	=> 'user',
        "password"	    => bcrypt($_POST['password']),
        "name"	        => $_POST['name'],
        "ID_number"	    => $_POST['id_number'],
        "email"	        => $_POST['email'],
        "status"	    => '報名中',
    ];

    // Check.
    $isValidFormat = $model->checkTWIDFormat($data['ID_number']);
    $exists = $model->checkIfExists('ID_number', $data['ID_number']);
    if ($isValidFormat == false) { alert('請檢查身分證格式'); }
    if ($exists) { alert('請檢查是否有重複申請'); }

    // Store.
    $YN = $model->save($data);
    return $YN;
}
function store_basic_info(){
    $model = new Post();
    $data = [
        "name"	        => $_POST['name'],
        "gender"	    => $_POST['gender'],
        "address"	    => $_POST['address'],
        "phone_number"	=> $_POST['phone'],
        "origin_school"	=> $_POST['school'],
        "subject"	    => $_POST['department'],
    ];

    // Store.
    $YN = $model->save($data);
    return $YN;
}

/**
 * Check ID number and password.
 */
function assert_login(){
    $model = new Post();
    $idNumber = $_POST['USER'];
    $exists = $model->checkIfExists('ID_number', $idNumber);
    if (! $exists){ alert("該身分證尚未申請帳號"); }
    $record = $model->where('ID_number', $idNumber)->first();
    $hashedPassword = $record['password'];
    // if (password_verify($_POST['PSWD'], $hashedPassword)){error("密碼錯誤");}
    if ($_POST['PSWD'] != $hashedPassword){alert("密碼錯誤");}
}

/**
 * Send an email token link. The token uses the ID number and link expiration time.\
 * Use `verify_email()` to verify the token.
 * If using gmail: https://myaccount.google.com/apppasswords
 * 
 * @param string $to Email address to be sent to.
 * @param string $idNumber ID number.
 */
function send_email($to, $idNumber){
    // Token.
    $expire = time() + 600; // Expires in 10 minutes.
    $_hash =  hash('sha512', 'apply113' . $idNumber);
    $token = base64_encode("{$_hash}:{$expire}");
    $url = "http://localhost:8080/Home/verify/verify?token=" . $token;

    // Email content.
    $subject = "Email Verification";
    $message = "請點擊下面的連結來驗證您的電子郵件：\n".$url;

    // Send email.
    $email = service('email');
    $email->setFrom('1888atch25@gmail.com', '113學年度大學申請入學招生委員會');
    $email->setTo($to);
    $email->setSubject($subject);
    $email->setMessage($message);

    if ($email->send()){ // Check whether the email has been sent.
        echo("已成功寄往".$to.", 請於10分鐘內設定密碼。");
    }else{
        alert("Email寄往 $to 失敗");
    }
}

/**
 * Use email token link to verify ID number and expiration time.\
 * Use `send_email()` to send an email token link
 * 
 * @param string $email_token Token from email.
 * @param string $idNumber ID number.
 */
function verify_email($email_token, $idNumber){
    $_hash =  hash('sha512', 'apply113' . $idNumber);
    list($email_hash, $expire) = explode(':', base64_decode($email_token,true));

    if ($email_hash != $_hash){ alert("請檢查身分證號碼"); }
    if (time() > $expire){ alert("此驗證連結，已於 ".date('Y-m-d H:i:s', $expire)." 失效!"); }
}

/** Convert between URL-safe and Base64. */
class SaveURL{
    public $data;

    public function __construct($data) {
        $this->data = $data;
    }

    /** To URL */
    public function encode(){
        // Generate URL-safe Base64 Token: convert + to -, / to _, and remove padding character =.
        return str_replace(['+', '/', '='], ['-', '_', ''], $this->data); 
    }

    /** To Base64 */
    public function decode(){
        // Verify URL security Base64 Token: Convert - to +, _ to /, add padding character =, and then decode.
        return str_replace(['-', '_'], ['+', '/'], $this->data);
    }
}
// main
switch ($method) {
    case "login": // asdfasfd
        assert_method();    // Check whether REQUEST METHOD is POST.
        assert_hcaptcha();
        assert_login();
        toURL('/');
        break;
    case "apply":
        assert_method();    // Check whether REQUEST METHOD is POST.
        // assert_hcaptcha();
        send_email($_POST['email'], $_POST['id_number']);
        // store_account();
        break;
    case "info":
        assert_method();    // Check whether REQUEST METHOD is POST.
        store_basic_info();
        break;
    case "verify":
        if (! isset($_GET["token"])) {alert("網址格式錯誤");}
        $uriSafeToken = (new SaveURL($_GET["token"]))->encode();
        toURL("/Home/password/".$uriSafeToken);
        break;
    case "password":
        assert_method();    // Check whether REQUEST METHOD is POST.
        $base64Token = (new SaveURL($_GET["token"]))->decode();
        verify_email($base64Token, $_POST['id_number']);     // Check whether the email verification link is correct.
        echo($_POST['id_number']."已成功設定密碼。");
        break;
    default:
        alert("Error: method");
        break;
}

?>
