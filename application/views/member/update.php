<h2 class="col-md-offset-3">修改個資</h2>
<div class="row">
  <form class="form-horizontal" role="form">
    <div class="form-group">
      <label for="input_" class="col-md-offset-1 col-md-2 control-label">帳號</label>
      <div class="col-md-3">
        <input type="text" class="form-control" name="id" id="input_id" value="<?php echo $username;?>" placeholder="帳號" readonly >
      </div>
    </div>
    <div class="form-group">
      <label for="input_" class="col-md-offset-1 col-md-2 control-label">密碼</label>
      <div class="col-md-3">
        <input type="password" class="form-control" name="pw" id="input_" value="<?php echo $password;?>" placeholder="密碼">
      </div>
    </div>
    <div class="form-group">
      <label for="input_" class="col-md-offset-1 col-md-2 control-label">密碼確認</label>
      <div class="col-md-3">
        <input type="password" class="form-control" name="pw2" id="input_" value="<?php echo $password;?>" placeholder="密碼確認">
      </div>
    </div>  
    <div class="form-group">
      <label for="input_" class="col-md-offset-1 col-md-2 control-label">電話</label>
      <div class="col-md-3">
        <input type="text" class="form-control" name="telephone" id="input_" value="<?php echo $telephone;?>" placeholder="電話2">
      </div>
    </div>
    <div class="form-group">
      <label for="input_" class="col-md-offset-1 col-md-2 control-label">地址</label>
      <div class="col-md-3">
        <input type="text" class="form-control" name="address" id="input_" value="<?php echo $address;?>" placeholder="地址">
      </div>
    </div>
    <div class="form-group">
      <label for="input_" class="col-md-offset-1 col-md-2 control-label">備註</label>
      <div class="col-md-3">
        <textarea class="form-control" name="other" id="input_" placeholder="備註"><?php echo $other;?></textarea> 
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-3 col-md-3">
        <button type="submit" class="btn btn-default">確定</button>
      </div>
    </div>
  </form>
</div>