<?php /* @var Daily_menu $data */ ?>
<?php ?>

<?php /* @var \App\Models\Daily_menu[] $data */ ?>

<div class="container">
    <div class="card card-colors card-signin">
        <form class="card-body p-5 text-center form-signin" method="post">
            <h2 class="text-uppercase">__________________________</h2>
            <h2 class="text-uppercase">Edit daily menu</h2>
            <div class="text-center text-danger mb-3">
                <?= @$data['message'] ?>
            </div>
            <div>
                <input value="<?=$data->getName()?>" type="text" name="name" class="form-control" id="exampleTitle" aria-describedby="Help" placeholder="Enter Name" required>
                <label class="form-label" for="typeName">Názov</label>
            </div>
            <div>
                <input value="<?=\App\Models\Days::getOne($data->getDay())->getName()?>" type="text" name="day" class="form-control" id="exampleTitle" aria-describedby="Help" placeholder="Enter Day" required>
                <label class="form-label" for="typeDay">Deň</label>
            </div>
            <div>
                <input value="<?=$data->getIngredients()?>" type="text" name="ingredients" class="form-control" id="exampleTitle" aria-describedby="Help" placeholder="Enter Ingredients" required>
                <label class="form-label" for="typeIngredients">Ingrediencie</label>
            </div>
            <div>
                <?php if ($data->getPrice() == 0) {
                    $value = "";
                } else {
                    $value = $data->getPrice();
                }?>
                <input value="<?=$value ?>" type="text" name="price" class="form-control" id="exampleTitle" aria-describedby="Help" placeholder="Enter Price" required>
                <label class="form-label" for="typePrice">Cena</label>
            </div>
            <button class="button-login btn-lg px-5" name="submit" type="submit">Save</button>
        </form>
    </div>
</div>

<?php /* @var \App\Models\Profiles[] $data */ ?>