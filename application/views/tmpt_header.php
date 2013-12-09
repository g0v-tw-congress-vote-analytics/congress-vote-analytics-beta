<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo (isset($title)) ? "選票成份分析 - $title":'選票成份分析';?></title>
  <link rel="stylesheet" href="<?php echo base_url('/assets/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('/assets/bootstrap/css/bootstrap-theme.min.css')?>">
  
</head>

<body>


<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo base_url("/");?>">選票成份分析系統</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="<?php echo base_url('member');?>">會員列表</a></li>
      <li><a href="<?php echo base_url('issue');?>">議題表態</a></li>
      <li><a href="<?php echo base_url('politician');?>">立委列表</a></li>
    </ul>
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="輸入議題或立偉關鍵字">
      </div>
      <button type="submit" class="btn btn-default">搜尋</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo base_url('member/update');?>">修改 <?php echo $this->session->userdata('username'); ?> 個資</a></li>
      <li><a href="<?php echo base_url('portal/logout');?>">登出</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>  
<div class="container">
  