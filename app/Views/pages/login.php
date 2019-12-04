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
    <button type="submit" class="btn btn-primary">Login</button>
    </form>
    </div>
    </div>

    <!--captcha-->
    <div class="row justify-content-center">
    <div class="form-wrapper col-md-6">
    <h3>Captcha</h3>
    <form action="go.php" method="post" enctype="multipart/form-data">
    <img src='<?php echo APP_URL ?>app/Helpers/captcha/captcha.php' id='capcha-image'>
    <a href="javascript:void(0);" onclick="document.getElementById('capcha-image').src='captcha.php?rid=' + Math.random();">Обновить капчу</a>
    <span>Введите капчу:</span>
    <input type="text" name="code">
    <input type="submit" name="go" value="Продолжить">
    </form>
    </div>
    </div>
</div>
