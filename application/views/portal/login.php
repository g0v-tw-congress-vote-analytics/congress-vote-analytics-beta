<!DOCTYPE html>
<html>
    <head>
        <title>選票成份分析</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url("/assets/bootstrap/css/bootstrap.min.css");?>" rel="stylesheet">

        <style type="text/css">
          body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
          }

          .form-signin {
            max-width: 300px;
            padding: 19px 29px 29px;
            margin: 0 auto 20px;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            -webkit-border-radius: 5px;
               -moz-border-radius: 5px;
                    border-radius: 5px;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
               -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                    box-shadow: 0 1px 2px rgba(0,0,0,.05);
          }
          .form-signin .form-signin-heading,
          .form-signin .checkbox {
            margin-bottom: 10px;
          }
          .form-signin input[type="text"],
          .form-signin input[type="password"] {
            width: 100%;
            font-size: 16px;
            height: auto;
            margin-bottom: 15px;
            padding: 7px 9px;
          }

        </style>
    </head>
    <body>

    <div class="container">

        <form class="form-signin" method="post" action="<?php echo $action;?>">
            <h3 class="form-signin-heading text-center">選票成份分析</h3>
            <input name="id" type="text" class="input-block-level" placeholder="使用者名稱" value="<?php //echo $username;?>">
            <input name="pw" type="password" class="input-block-level" placeholder="使用者密碼">

            <div class="<?php //echo $msg_type;?>">
                <?php //echo $msg; ?>
            </div>
            <button class="btn btn-large btn-primary btn-block" type="submit">登入</button>
			<button class="btn btn-large btn-primary btn-block" type="button"
			onclick="javascript:location.href='portal/register'">註冊</button>
        </form>

    </div>     

        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js");?>"></script>
    </body>
</html>
