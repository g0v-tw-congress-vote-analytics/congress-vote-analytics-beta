<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首頁</title>
</head>
<body>
  <form name="form" method="post" action="<?php echo $action; ?>">
    要刪除的帳號：<input type="text" name="id" />
    <input type="submit" name="button" value="刪除" />
  </form>
</body>
</html>