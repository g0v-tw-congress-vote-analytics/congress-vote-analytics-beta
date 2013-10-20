<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>首頁</title>
</head>

<body>
  <h2>歡迎回來<?php echo $username;?></h2>
  <a href="<?php echo base_url('member');?>">會員列表</a>
  <a href="<?php echo base_url('member/update');?>">修改個資</a>
  <a href="<?php echo base_url('issue');?>">議題表態</a>
  <a href="<?php echo base_url('politician');?>">立委列表</a>
  <a href="<?php echo base_url('portal/logout');?>">登出</a>
<br/>
<br/>