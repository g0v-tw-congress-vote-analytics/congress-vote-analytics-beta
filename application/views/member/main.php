<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>首頁</title>
</head>
<body>
  <h2>歡迎回來<?php echo $username;?></h2>
  <a href="<?php echo base_url('member/update');?>">修改</a>
  <a href="<?php echo base_url('portal/logout');?>">登出</a>
  <a href="<?php echo base_url('issue.php');?>">議題表態</a>
  <a href="<?php echo base_url('commom.php');?>">留言板</a>
  <a href="<?php echo base_url('politician_list.php');?>">立委列表</a>

  <h2>會員列表</h2>
    <?php echo $list; ?>
</body>
</html>
