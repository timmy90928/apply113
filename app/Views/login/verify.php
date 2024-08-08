<?php

function error($msg){
    echo '
    <script>
        alert("' . $msg . '");
        window.onload = function() {
            window.history.back();
        };
    </script>';
}
function toURL($url){
    header("Location: $url");
    exit();
}
function assert_method(){
    if ($_SERVER["REQUEST_METHOD"] != "POST"){
        error();
    };
}
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
        error("請勾選我不是機器人");
        return;
    }
}
function assert_password(){
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $passwordAgain = isset($_POST['password_again']) ? $_POST['password_again'] : '';

    if ($password !== $passwordAgain) {
        error("兩次密碼不相同");
    }
}

function bcrypt($password){
    // verify password: if (password_verify($password, $hashedPassword))
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    return $hashedPassword;
}
assert_method();

switch ($method) {
    case "login":
        toURL('/Home/announcement');
        break;
    case "apply":
        assert_hcaptcha();
        echo "Today is Tuesday.";
        break;
    case "info":

        break;
    default:
        error("Error: method");
        break;
}


?>
