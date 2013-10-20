<h2>議題</h2>

<h3>新增議題</h3>
<form name="form" method="post" action="<?php echo $action; ?>">
  <input type="text" name="memo" /> 
  <input type="submit" name="button" value="確定" />
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
</table>    

