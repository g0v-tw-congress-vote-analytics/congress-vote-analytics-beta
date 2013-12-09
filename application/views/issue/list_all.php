<h2>議題</h2>

<h3>新增議題</h3>
<form name="form" method="post" action="<?php echo $action; ?>">
  <input type="text" name="memo" /> 
  <input type="submit" name="button" value="確定" />
</form>

<br/>

<h3>議題列表</h3>
<p>針對此議題你的立場排序。</p>
<?php echo $tbody; ?>