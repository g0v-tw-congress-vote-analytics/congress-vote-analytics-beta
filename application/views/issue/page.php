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
  <a href="<?php echo base_url('issue');?>">議題表態</a>
  <a href="<?php echo base_url('politcian');?>">立委列表</a>

  <h2>議題</h2>
  <h3>新增議題</h3>
  <form name="form" method="post" action="insert_issue.php?action=insert">

  <input type="text"  name="memo" /> <input type="submit" name="button" value="確定" />
  </form>
  <br/>
  <h3>議題列表</h3>
  <p>針對此議題你的立場排序。</p>
  <table>
    <thead>
      <tr>
        <td>序號</td>
        <td>議題名稱(點選連結進入議題內頁)</td>
        <td>你的立場</td>
        <td>重要性</td>
      </tr>
    </thead>
    <tbody>
      <?php echo $tbody; ?>  
    </tbody>
    
</body>
</html>
