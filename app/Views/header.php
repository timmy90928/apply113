<?php 
// $WEB_NAME = '';
// include '../app/views/header.php';
?>

<!DOCTYPE html>
<html lang="ch-TW">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars( isset($WEB_NAME) && !empty($WEB_NAME) ? $WEB_NAME : 'Undefined'); ?></title>
</head>
<style>
    header {
        /* <header>113學年度大學申請入學招生</header> */
        padding: 10px 0;
        text-align: center;
        margin-top: 10px;

        font-size: 28px;
        margin-bottom: 10px;

        display: block;
        font-size: 40px;
        font-weight: bold;
        color: #6f93fe;
        margin-top: 10px;
    }

    @media screen and (max-width: 768px) {
        header {
            font-size: 26px;
            padding: 10px;
        }
    }
</style>
<header>113學年度大學申請入學招生</header>