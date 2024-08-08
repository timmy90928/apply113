<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>個人資料填寫</title>
    <link rel="stylesheet" href="../include/common_style.css">
    <style>
        .gender-options {
            display: flex !important;
            flex-wrap: nowrap;
            align-items: center;
            gap: 10px;
        }

        .gender-options label {
            display: flex;
            align-items: center;
            margin-right: 15px;
        }

        .gender-options input[type="radio"] {
            margin-right: 5px;
        }
    </style>
</head>
<?php include '../app/views/header.php'?>
<body>
    <div class="container">
        <h1>個人資料填寫</h1>
        <form action="/home/sign_up_school" method="POST">
            <table class="form-table">
                <tr>
                    <td class="form-label">姓名：</td>
                    <td><input type="text" id="name" name="name" required></td>
                </tr>
                <tr>
                    <td class="form-label">性別：</td>
                    <td class="gender-options">
                        <label><input type="radio" id="gender_male" name="gender" value="male" required> 男</label>
                        <label><input type="radio" id="gender_female" name="gender" value="female" required> 女</label>
                    </td>
                </tr>
                <tr>
                    <td class="form-label">身份證字號：</td>
                    <td><input type="text" id="id_number" name="id_number" required></td>
                </tr>
                <tr>
                    <td class="form-label">地址：</td>
                    <td><input type="text" id="address" name="address" required></td>
                </tr>
                <tr>
                    <td class="form-label">電話：</td>
                    <td><input type="tel" id="phone" name="phone" required></td>
                </tr>
                <tr>
                    <td class="form-label">電子信箱：</td>
                    <td><input type="email" id="email" name="email" required></td>
                </tr>
                <tr>
                    <td class="form-label">現在就讀學校：</td>
                    <td>
                        <select id="school" name="school" required>
                            <option value="" disabled selected>請選擇學校</option>
                            <option value="CCU">中正大學</option>
                            <option value="NCU">中央大學</option>
                            <option value="NSYSU">中山大學</option>
                            <option value="NCHU">中興大學</option>
                            <option value="NTU">台灣大學</option>
                            <option value="NTHU">清華大學</option>
                            <option value="NCTU">交通大學</option>
                            <option value="NCYU">嘉義大學</option>
                            <option value="NCKU">成功大學</option>
                            <option value="CYCU">中原大學</option>
                            <option value="YZU">元智大學</option>
                            <option value="TKU">淡江大學</option>
                            <option value="FCU">逢甲大學</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="form-label">現在就讀科系：</td>
                    <td>
                        <select id="department" name="department" required>
                            <option value="" disabled selected>請選擇科系</option>
                            <option value="EE">電機系</option>
                            <option value="CS">資工系</option>
                            <option value="Med">醫學系</option>
                            <option value="ME">機械系</option>
                            <option value="IM">資管系</option>
                            <option value="CIE">土木系</option>
                            <option value="department7">地理系</option>
                            <option value="PS">政治系</option>
                            <option value="MATH">數學系</option>
                            <option value="LS">生命科學系</option>
                            <option value="DoP">光電系</option>
                            <option value="Hist">歷史系</option>
                            <!-- Add more options as needed -->
                        </select>
                    </td>
                </tr>
            </table>
            <div class='center'><button type="submit">確認資料並進入下一頁</button></div>
        </form>
    </div>
</body>
</html>
