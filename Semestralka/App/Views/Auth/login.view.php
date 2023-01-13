<?php
/** @var Array $data */
?>

<div class="container">
    <div class="card card-colors card-signin">
        <form class="card-body p-5 text-center form-signin" method="post" action="<?= \App\Config\Configuration::LOGIN_URL ?>">
            <h2 class="text-uppercase">Login</h2>
            <div class="text-center text-danger mb-3">
                <?= @$data['message'] ?>
            </div>
            <p class="dark-text">Please enter your email and password</p>
            <div>
                <input name="email" type="text" id="email" class="form-control" required autofocus/>
                <label class="form-label" for="typeEmail">Enter your email</label>
            </div>
            <div>
                <input type="password" id="password" name="password"  class="form-control" required/>
                <label class="form-label" for="typePassword">Enter your password</label>
            </div>
            <button class="button-login btn-lg px-5" name="submit" type="submit">Login</button>
        </form>
        <div>
            <p class="center-text">Don't have an account? <a href="?c=auth&a=registration" class="dark-text fw-bold">Sign Up</a>
            </p>
        </div>
    </div>
</div>
