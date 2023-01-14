<?php
/* @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
use App\Controllers\Daily_menuController;
?>

<div class="column">
    <div class="center-text">
        <span class="text-dm" ><?= @$data['message'] ?></span>
    </div>
    <?php   $cislo = 1;
            unset($data['message']);
            foreach ($data as $x => $value) {
            ?>
        <div class="card my-3 food-type">
            <div class="card-body">
                <span class="card-title">Menu <?=$cislo ?> : </span>
                <span class="card-title"><?=$value->getName() ?></span>
                <span class="cena"><?=$value->getPrice() ?>€</span>
            </div>
            <div>
                <span class="zlozenie">Zloženie: <?=$value->getIngredients() ?></span>
                <?php if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin") { ?>
                    <a href="?c=daily_menu&a=edit&id=<?=$value->getId() ?>" class="btn btn-warning ed-buttons">Edit</a>
                    <a href="?c=daily_menu&a=delete&id=<?=$value->getId() ?>" class="btn btn-danger ed-buttons">Delete</a>
                <?php } ?>
            </div>
        </div>
    <?php   $cislo = $cislo + 1;
            }?>
    <?php if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin") { ?>
        <div class="card my-3 food-type">
            <div class="card-body">
                <a href="?c=daily_menu&a=add" class="btn btn-info">Pridaj</a>
            </div>
        </div>
    <?php } ?>
</div>
