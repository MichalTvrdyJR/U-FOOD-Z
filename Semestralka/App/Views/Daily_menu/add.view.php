<?php /* @var Array $data */ ?>

<div class="container">
    <div class="card card-colors card-signin">
        <form class="card-body p-5 text-center form-signin" method="post">
            <h2 class="text-uppercase">__________________________</h2>
            <h2 class="text-uppercase"><?= @$data['nadpis'] ?> denné menu</h2>
            <div class="text-center text-danger mb-3">
                <?= @$data['message'] ?>
            </div>
            <div>
                <input value="<?=@$data['picture']?>" type="file" name="img" class="form-control" id="img">
                <label class="form-label" for="typeName"></label>
            </div>
            <div>
                <input value="<?=@$data['name']?>" type="text" name="name" class="form-control" id="name" aria-describedby="Help" placeholder="Enter Name" required>
                <label class="form-label" for="typeName">Názov</label>
            </div>
            <div>
                <input onkeyup="check_exists_day(this.value)" value="<?=@$data['day']?>" type="text" name="day" class="form-control" id="day" aria-describedby="Help" placeholder="Enter Day" required>
                <label id="day_check" class="form-label">Deň</label>
            </div>
            <div>
                <input value="<?=@$data['ingredients']?>" type="text" name="ingredients" class="form-control" id="ingredients" aria-describedby="Help" placeholder="Enter Ingredients" required>
                <label class="form-label" for="typeIngredients">Ingrediencie</label>
            </div>
            <div>
                <?php if (@$data['price'] == 0) {
                    $value = "";
                } else {
                    $value = @$data['price'];
                }?>
                <input value="<?=$value ?>" type="text" name="price" class="form-control" id="price" aria-describedby="Help" placeholder="Enter Price" required>
                <label class="form-label" for="typePrice">Cena</label>
            </div>
            <button class="button-login btn-lg px-5" name="submit" type="submit">Save</button>
        </form>
    </div>
</div>