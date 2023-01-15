<?php /* @var Array $data */ ?>

<div class="container">
    <div class="card card-colors card-signin">
        <form class="card-body p-5 text-center form-signin" method="post">
            <h2 class="text-uppercase">__________________________</h2>
            <h2 class="text-uppercase">Edit time interval</h2>
            <div class="text-center text-danger mb-3">
                <?= @$data['message'] ?>
            </div>
            <div>
                <input value="<?=$data['od']?>" type="text" name="od" class="form-control" id="od" aria-describedby="Help" placeholder="Zadajte čas od" required>
                <label class="form-label" for="od">Čas od</label>
            </div>
            <div>
                <input value="<?=$data['do']?>" type="text" name="do" class="form-control" id="do" aria-describedby="Help" placeholder="Zadajte čas do" required>
                <label class="form-label" for="do">Čas do</label>
            </div>
            <button class="button-login btn-lg px-5" name="submit" type="submit">Save</button>
        </form>
    </div>
</div>