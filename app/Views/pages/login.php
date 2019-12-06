<?php $captError = (isset($this->data['errors']['captcha'])) ? $this->data['errors']['captcha'] : false; ?>

<div class="container">
    <div class="row justify-content-center">
    <div class="form-wrapper col-md-6">
    <h3>Login</h3>
    <form action="https://home1/login/log" method="post" >
    <div class="form-group">
    <label for="inputEmail">Email address</label>
    <input type="text" class="form-control" id="inputEmail" name="email" placeholder="Enter email" value="a@a.ua">
    </div>
    <div class="form-group">
    <label for="inputPassword1">Password</label>
    <input type="password" class="form-control" id="inputPassword1" name="password" placeholder="Password" value="123">
    </div>
    <div class="form-group">
    <img src='<?php echo APP_URL ?>app/Helpers/captcha/captcha.php' id='capcha-img'>
    <a href="javascript:void(0);" onclick="document.getElementById('capcha-img').src='captcha.php?rid=' + Math.random();">Обновить капчу</a>
    </div>
    <div class="form-group <?php if(!!$captError){ echo "has-error"; } ?>">
    <label for="inputCaptcha">Password</label>
    <input type="text" name="code" id="inputCaptcha" class="form-control">
    <?php if($captError) : ?>
        <small class="form-text text-muted err-text"><?php echo $captError?></small>
    <?php endif;?>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    </form>
    </div>
    </div>
</div>
