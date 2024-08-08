<?php
$secret = '6Lc8lCEqAAAAAGkB2TkEBkOR5uqdck5W9oTCajaK';
$hcaptcha_response = $_POST['g-recaptcha-response'];

$response = file_get_contents("https://hcaptcha.com/siteverify?secret=$secret&response=$hcaptcha_response");
$responseKeys = json_decode($response, true);

if ($responseKeys["success"]) {
    echo "成功！";
} else {
    echo '
    <script>
        alert("請勾選我不是機器人")
        window.onload = function() {
            window.history.back();
        };
    </script>';
}
?>
