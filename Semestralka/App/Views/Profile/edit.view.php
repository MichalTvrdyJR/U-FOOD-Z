<?php /* @var Array $data */ ?>

<div class="container">
    <div class="card card-colors card-signin">
        <form class="card-body p-5 text-center form-signin" method="post">
            <h2 class="text-uppercase">__________________________</h2>
            <h2 class="text-uppercase">Edit profile</h2>
            <div class="text-center text-danger mb-3">
                <?= @$data['message'] ?>
            </div>
            <div>
                <input value="<?=@$data['picture']?>" type="file" name="img" class="form-control" id="img">
                <label class="form-label" for="typeName"></label>
            </div>
            <div>
                <input value="<?=@$data['name']?>" type="text" name="name" class="form-control" id="name" aria-describedby="Help" placeholder="Zadaj meno" required>
                <label class="form-label" for="typeName">Meno</label>
            </div>
            <div>
                <input value="<?=@$data['surname']?>" type="text" name="surname" class="form-control" id="surname" aria-describedby="Help" placeholder="Zadaj priezvisko" required>
                <label class="form-label" for="typeSurname">Priezvisko</label>
            </div>
            <div>
                <input onkeyup="check_exists_email_registration(this.value)" value="<?=@$data['email']?>" type="email" name="email" class="form-control" id="email" aria-describedby="Help" placeholder="Zadaj email" required>
                <label id="email_check" class="form-label">Email</label>
            </div>
            <div>
                <input value="<?=@$data['phone']?>" type="tel" name="phone" class="form-control" id="phone" aria-describedby="Help" placeholder="Zadaj telefón" required>
                <label class="form-label" for="typePhone">Telefónne číslo</label>
            </div>
            <button class="button-login btn-lg px-5" name="submit" type="submit">Save</button>
        </form>
    </div>
</div>
