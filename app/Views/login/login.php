
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<title>大學甄選入學委員會</title>
<script language='javascript'>
    function FormLoad()
    {
        //alert(document.f1.UserName.value) 
        //if(document.f1.UserName.value!='')	
            document.form1.USER.focus();	
        //else
        //	document.f1.UserName.focus();
        
        //scroll(); 
    }		
   
   function check(formObj) {
   //檢查欄位是否填寫
   	if(formObj.USER.value=='' || formObj.PSWD.value==''){
   		alert('請輸入帳號和密碼！');
   		return false;
   	}
    window.open("/", "_parent");
  	// formObj.submit();
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

<body style='font-size:12pt;font-family:標楷體' onload=FormLoad()> 
<div align='center'>
<h2>113學年度大學申請入學招生</h2>
<h2>大學繁星推薦、申請入學招生作業檢討會會議資料</h2>
<center><font color=red>※下載所需帳號及密碼，為校系分則登錄之帳號、密碼。</font></center>
<br>
<form name='form1' method='post'>
<table width='500' bgcolor='#ffffff' cellpadding='5' style='border:3px double #006633'>
<tr>
	<td style='background-color:#0000cc;color:#ffffff'>請輸入帳號密碼：</td>
</tr>
<tr>
	<td align='center'><br>
		
		<span style='color:#cc0000;font-weight:bold'>&gt;&gt;</span>帳號：
		<input name='USER' type='text' id='USER' size='18' maxlength='18'><br><br>
		<span style='color:#cc0000;font-weight:bold'>&gt;&gt;</span>密碼：
		<input name='PSWD' type='password' id='PSWD' size='20' maxlength='20'><br><br>
		
	</td>
</tr>
</table>
<br>

<input type='button' name='Submit' value='登入' onClick='check(document.form1)' style='margin-center:160px; width:80px'>
<input type='reset' value='重設'>
<input type='button' name='Submit' value='申請帳號' onClick='check(document.form1)' style='margin-center:160px; width:80px'>

</form>
</div>
</body>
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