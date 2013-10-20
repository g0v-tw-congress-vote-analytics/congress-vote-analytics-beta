<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>首頁</title>
</head>
<body>
  <h2>歡迎回來<?php echo $username;?></h2>
  <a href="register.php">新增</a>   
  <a href="update.php">修改</a>
  <a href="logout.php">登出</a>
  <a href="issue.php">議題表態</a>
  <a href="commom.php">留言板</a>
  <a href="politician_list.php">立委列表</a>
  <a href="delete.php">刪除</a>  <br><br>

  <h2>會員列表</h2>
    <?php echo $list; ?>
</body>
</html>
