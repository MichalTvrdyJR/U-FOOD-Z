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
                <input value="<?=@$data['name']?>" type="text" name="name" class="form-control" id="name" aria-describedby="Help" placeholder="Enter Name" required>
                <label class="form-label" for="typeName">Názov</label>
            </div>
            <div>
                <input value="<?=@$data['surname']?>" type="text" name="surname" class="form-control" id="surname" aria-describedby="Help" placeholder="Enter Surname" required>
                <label class="form-label" for="typeSurname">Priezvisko</label>
            </div>
            <div>
                <input value="<?=@$data['email']?>" type="text" name="email" class="form-control" id="email" aria-describedby="Help" placeholder="Enter Email" required>
                <label class="form-label" for="typeEmail">Email</label>
            </div>
            <div>
                <input value="<?=@$data['phone']?>" type="text" name="phone" class="form-control" id="phone" aria-describedby="Help" placeholder="Enter Phone" required>
                <label class="form-label" for="typePhone">Telefónne číslo</label>
            </div>
            <button class="button-login btn-lg px-5" name="submit" type="submit">Save</button>
        </form>
    </div>
</div>
