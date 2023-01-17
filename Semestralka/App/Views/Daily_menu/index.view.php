<?php
/* @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
use App\Controllers\Daily_menuController;
/*** @var App\Models\Days $days */;
?>

<div class="column">
    <div class="center-text">
    <?php if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin") {?>
        <h1>Denné menu sú k dispozícií medzi <?= \App\Models\Time_interval::getOne(1)->getTime()?> a <?= \App\Models\Time_interval::getOne(2)->getTime()?> hodinou</h1>
        <a class="zmenit_cas" href="?c=daily_menu&a=edit_time">Zmeniť časový interval</a>
    <?php }?>
        <h1><?= @$data['message'] ?></h1>
    </div>
    <?php   unset($data['message']);
            //if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin") {
            $days = \App\Models\Days::getAll();
            //} else {
            //    $days = \App\Models\Days::getAll();
                //$days = \App\Models\Days::getOne(date('w'));
            //}
            foreach ($days as $day) {
                $cislo = 1;
                $isUsed = false;
                foreach ($data as $x => $value) {
                    if($day->getId() == $value->getDay()) {
                        if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin" && $isUsed === false) {
            ?>
                            <div>
                                <span class="dni_text"><?=$day->getName()?></span>
                            </div>
                  <?php $isUsed = true;
                        }?>
    <div class="daily_menu_containers">
        <div class="card food-type">
            <div class="card-body">
                <img src="public/images/<?= $value->getPicture()?>" alt="daily menu" class="food_menu_image">
                <h2>Menu <?=$cislo ?> : <?=$value->getName()?></h2>
                <h3>Zloženie: <?=$value->getIngredients()?></h3>
                <h4><?=$value->getPrice() ?>€</h4>
            </div>
            <div>
                <?php if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin") { ?>
                    <a href="?c=daily_menu&a=edit&id=<?=$value->getId() ?>" class="overlay_botton_left food_types_title">Edit</a>
                    <a href="?c=daily_menu&a=delete&id=<?=$value->getId() ?>" class="overlay_botton_rigth food_types_title">Delete</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php           $cislo = $cislo + 1;
                    }
                }
            }?>
    <?php if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin") { ?>
        <div class="card my-3 food-type">
            <div class="card-body">
                <a href="?c=daily_menu&a=add" class="btn btn-info">Pridaj</a>
            </div>
        </div>
    <?php } ?>
</div>
