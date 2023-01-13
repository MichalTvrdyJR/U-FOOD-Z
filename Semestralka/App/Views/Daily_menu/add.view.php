<?php /* @var Food_type $data */ ?>

<?php /* @var \App\Models\Food_type[] $data */ ?>

<form method="post" name="form-menu" onsubmit="return valideMenu()">
    <div class="form-group ">
        <label for="exampleTitle">Názov</label>
        <input value="<?=$data->getName()?>" type="text" name="name" class="form-control" id="exampleTitle" aria-describedby="Help" placeholder="Enter Name" required>
    </div>
    <div class="form-group">
        <label for="exampleTitle">Ďeň</label>
        <input value="<?=\App\Models\Days::getOne($data->getDay())->getName()?>" type="text" name="day" class="form-control" id="exampleTitle" aria-describedby="Help" placeholder="Enter Day" required>
    </div>
    <div class="form-group">
        <label for="exampleTitle">Ingrediencie</label>
        <input value="<?=$data->getIngredients()?>" type="text" name="ingredients" class="form-control" id="exampleTitle" aria-describedby="Help" placeholder="Enter Ingredients" required>
    </div>
    <div class="form-group">
        <label for="exampleTitle">Cena</label>
        <?php if ($data->getPrice() == 0) {
            $value = "";
        } else {
            $value = $data->getPrice();
        }?>
        <input value="<?=$value ?>" type="text" name="price" class="form-control" id="exampleTitle" aria-describedby="Help" placeholder="Enter Price" required>
    </div>
    <button type="submit" class="btn btn-primary" >Submit</button>
</form>