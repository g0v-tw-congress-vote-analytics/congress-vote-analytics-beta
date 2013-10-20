<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>選票成份分析--工作版本</title>
</head>
<body>
    <h3>選票成份分析--工作版本</h3>
    <form name="form" method="post" action="<?php echo $action?>">
        帳號：<input type="text" name="id" /> <br/>
        密碼：<input type="password" name="pw" /> <br/>
        <input type="submit" name="button" value="登入" />
        <a href="register.php">申請帳號</a>
    </form>    
</body>
</html>