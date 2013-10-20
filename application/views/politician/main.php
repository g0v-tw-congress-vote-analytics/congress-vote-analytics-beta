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

  <h3>立委個人頁： <?php echo $pname;?> 委員</h3>

  <p>此一立委針對各議題的立場。</p>
  <table>
    <thead>
      <tr>
        <td>序號</td>
        <td>議題名稱(點選連結進入議題內頁)</td>
        <td>立委立場</td><td>重視程度</td>
      </tr>
    </thead>
    <tbody>
      <?php echo $tbody; ?>
    </tbody>
  </table>

</body>
</html>
