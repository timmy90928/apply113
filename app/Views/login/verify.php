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

function send_email($to){
    $datetime = date('YmdH');

    $token = hash('sha256', urlencode($to) . $datetime); // bin2hex(random_bytes(16)); // Generate a 32 character long token.
    $subject = "Email Verification";
    $message = "Please click the link below to verify your email:\n";
    $message .= "http://localhost:8080/Home/verify/verify?email=" . urlencode($to) . "&token=" . $token;

    // Send email.
    $email = service('email');
    $email->setFrom('1888atch25@gmail.com', '113學年度大學申請入學招生委員會');
    $email->setTo($to);
    $email->setSubject($subject);
    $email->setMessage($message);

    if ($email->send()){ // Check whether the email has been sent.
        echo("Yes");
    }else{
        echo("No");
    }
}

function verify_email(){
    if (isset($_GET["email"]) && isset($_GET["token"])) {
        $email = $_GET["email"];    // urlencode.
        $email_token = $_GET["token"];    
    
        $datetime = date('YmdH');
        $token = hash('sha256', urlencode($email) . $datetime); // bin2hex(random_bytes(16)); // Generate a 32 character long token.

        if ($email_token == $token){
            echo("驗證成功");
        }else{
            echo("驗證失敗");
        }
        
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
        assert_password();
        send_email($_POST['email']);
        // store_account();
        break;
    case "info":
        assert_method();    // Check whether REQUEST METHOD is POST.
        store_basic_info();
        break;
    case "verify":
        verify_email();     // Check whether the email verification link is correct.
        break;
    default:
        alert("Error: method");
        break;
}

?>
