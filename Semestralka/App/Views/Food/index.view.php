<?php
/* @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
?>

<div class="column">
    <div class="center-text">
        <a href="?c=menu" class="fa fa-angle-double-left icon-back"></a>
        <h1><?= @$data['message'] ?></h1>
    </div>
    <?php   $cislo = 1;
            $food_type_id = $data['food_type_id'];
            unset($data['message']);
            unset($data['food_type_id']);
            foreach ($data as $x => $value) { ?>
            <div class="food_containers">
                <div class="card my-3 food-type">
                    <div class="card-body">
                        <img src="public/images/<?= $value->getPicture()?>" alt="daily menu" class="food_image">
                        <span class="card-title"><?=$cislo ?> : </span>
                        <span class="card-title"><?=$value->getName() ?></span>
                        <span class="cena"><?=$value->getPrice() ?>€</span>
                    </div>
                    <div>
                        <span class="zlozenie">Zloženie: <?=$value->getIngredients() ?></span>
                        <?php if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin") { ?>
                            <a href="?c=food&a=edit&id=<?=$value->getType() . '-' . $value->getId()?>" class="overlay_left_down food_types_title">Edit</a>
                            <a href="?c=food&a=delete&id=<?=$value->getType() . '-' . $value->getId()?>" class="overlay_left_up food_types_title">Delete</a>
                        <?php } else if ($auth->isLogged() && $auth->getLoggedUserName() != "Admin") {?>
                            <a href="?c=cart&a=add&id=<?=$value->getType() . '-' . $value->getId()?>" class="overlay_all fa fa-shopping-cart food_types_title"></a>
                        <?php }?>
                    </div>
                </div>
            </div>
    <?php   $cislo = $cislo + 1;
            } ?>
    <?php if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin") { ?>
    <div class="card my-3 food-type">
        <div class="card-body">
            <a href="?c=food&a=add&id=<?=$food_type_id ?>" class="btn btn-info">Pridaj</a>
        </div>
    </div>
    <?php } ?>
</div>