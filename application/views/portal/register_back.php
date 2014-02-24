<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>選票成份分析--工作版本</title>
</head>
<body>
    
  <h3>選票成份分析--註冊</h3>
  <p>目前安全性問題還沒考量進去，註冊的時候請盡量不要用真實資料。</p>
  <form name="form" method="post" action="<?php echo $action;?>">
    <br/>帳號：<input type="text" name="id" /> 
    <br/>密碼：<input type="password" name="pw" /> 
    <br/>再一次輸入密碼：<input type="password" name="pw2" /> 
    <br/>Email：<input type="text" name="email" /> 
    <br/>電話：<input type="text" name="telephone" /> 
    <br/>地址：<input type="text" name="address" /> 
    <br/>備註：<textarea name="other" cols="45" rows="5"></textarea> 
    <br/><input type="submit" name="button" value="確定" />
  </form>    

</body>
</html>
