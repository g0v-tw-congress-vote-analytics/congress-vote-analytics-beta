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

  議題名稱： <?php echo $issue->name;?>
  <form name="form" method="post" action="insert_issue.php?action=ins_ivsm">
    <input type="hidden" name="issueid" value="$issueid" />

    立場：
    <input type="radio" name="vote" value="1" checked="<?php echo $is_vote_true;?>">同意</input>
    <input type="radio" name="vote" value="-1" checked="<?php echo $is_vote_false;?>">反對</input>  <br/>

    重要性：
    <input type="text" name="scale" value="<?php echo $ivsm->scale;?>" />(請輸入1~100的數值) <br/>
    <input type="submit" name="button" value="確定" /> <br/>
  </form>

  <br/>

  <h3>立委立場：</h3>
  <p>各個立委針對此一議題的立場。</p>
  
  <table>
    <thead>
      <tr>
        <td>序號</td>
        <td>立委姓名</td>
        <td>立場</td>
        <td>立場指數</td>
      </tr>
    </thead>
    <tbody>
      <?php echo $tbody; ?>  
    </tbody>
  </table>
</body>
</html>
