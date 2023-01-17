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
                <label class="form-label" for="typeEmail">Zadajte meno</label>
            </div>
            <div>
                <input type="text" id="surname" name="surname"  class="form-control" required/>
                <label class="form-label" for="typeSurname">Zadajte priezvisko</label>
            </div>
            <div>
                <input onkeyup="check_exists_email_registration(this.value)" type="email" id="email" name="email"  class="form-control" required/>
                <label id="email_check" class="form-label">Zadajte email</label>
            </div>
            <div>
                <input type="password" id="password" name="password"  class="form-control" required/>
                <label class="form-label" for="typePassword">Zadajte heslo</label>
            </div>
            <div>
                <input onkeyup="check_same_passwords(this.value)" type="password" id="check-password" name="check-password"  class="form-control" required/>
                <label id="password_check" class="form-label">Potvrďte heslo</label>
            </div>
            <div>
                <input type="tel" id="phone" name="phone"  class="form-control" required/>
                <label class="form-label" for="typePhone">Zadajte telegón</label>
            </div>
            <button class="button-login btn-lg px-5" name="create" type="submit">Registrovať</button>
        </form>
    </div>
</div>