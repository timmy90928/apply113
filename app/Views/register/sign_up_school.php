<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>報名系統</title>
    <link rel="stylesheet" href="/include/sign_up_school.css">
</head>
<body>
    <div class="container">
        <h1>報名系統</h1>
        <form action="/sign_up_school" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="school">欲報名之學校：</label>
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
            </div>
            <div class="form-group">
                <label for="department">欲報名之科系：</label>
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
                </select>
            </div>
            <div class="form-group">
                <label for="pdf_file">上傳書審文件：</label>
                <input type="file" id="pdf_file" name="pdf_file" accept=".pdf" required>
            </div>
            <button type="submit">提交報名</button>
        </form>
    </div>
</body>
</html>
