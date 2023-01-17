<?php
/** @var Array $data */
?>

<div class="container">
    <div class="card card-colors card-signin">
        <form class="card-body p-5 text-center form-signin" method="post" action="<?= \App\Config\Configuration::REGISTRATION_URL ?>">
            <h2 class="text-uppercase">__________________________</h2>
            <h2 class="text-uppercase">Registration</h2>
            <div class="text-center text-danger mb-3">
                <?= @$data['message'] ?>
            </div>
            <div>
                <input name="name" type="text" id="name" class="form-control" required autofocus/>
                <label class="form-label" for="typeEmail">Enter your name</label>
            </div>
            <div>
                <input type="text" id="surname" name="surname"  class="form-control" required/>
                <label class="form-label" for="typeSurname">Enter your surname</label>
            </div>
            <div>
                <input type="email" id="email" name="email"  class="form-control" required/>
                <label class="form-label" for="typeEmail">Enter your email</label>
            </div>
            <div>
                <input type="password" id="password" name="password"  class="form-control" required/>
                <label class="form-label" for="typePassword">Enter your password</label>
                <label class="form-label" id="skuskaNiecoho"></label>
            </div>
            <div>
                <input type="password" id="check-password" name="check-password"  class="form-control" required/>
                <label class="form-label" for="typeCheckPassword">Check your password</label>
            </div>
            <div>
                <input type="tel" id="phone" name="phone"  class="form-control" required/>
                <label class="form-label" for="typePhone">Enter your phone number</label>
            </div>
            <button class="button-login btn-lg px-5" name="create" type="submit">Register</button>
        </form>
    </div>
</div>