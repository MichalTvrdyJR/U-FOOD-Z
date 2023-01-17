<?php /* @var Food_type $data */ ?>

<?php /* @var \App\Models\Food_type[] $data */ ?>

<div class="container">
    <div class="card card-colors card-signin">
        <form class="card-body p-5 text-center form-signin" method="post">
            <h2 class="text-uppercase">__________________________</h2>
            <h2 class="text-uppercase">typ jedla</h2>
            <div>
                <input value="<?=$data->getPicture()?>" type="file" name="img" class="form-control" id="img">
                <label class="form-label" for="typeName"></label>
            </div>
            <div>
                <input value="<?=$data->getType()?>" type="text" name="type" class="form-control" id="type" aria-describedby="Help" placeholder="Enter Type" required>
                <label class="form-label" for="typeType">Názov</label>
            </div>
            <button class="button-login btn-lg px-5" name="submit" type="submit">Save</button>
        </form>
    </div>
</div>