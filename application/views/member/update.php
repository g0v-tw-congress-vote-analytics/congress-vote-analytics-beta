<form name="form" method="post" action="<?php echo $action; ?>">
  <br/> 帳號：<input type="text" name="id" value="<?php echo $username;?>" readonly />(此項目無法修改) 
  <br/> 密碼：<input type="password" name="pw" value="<?php echo $password;?>" /> 
  <br/> 再一次輸入密碼：<input type="password" name="pw2" value="<?php echo $password;?>" />
  <br/> 電話：<input type="text" name="telephone" value="<?php echo $telephone;?>" /> 
  <br/> 地址：<input type="text" name="address" value="<?php echo $address;?>" /> 
  <br/> 備註：<textarea name="other" cols="45" rows="5"><?php echo $other;?></textarea> 
  <br/> <input type="submit" name="button" value="確定" />
</form>    
