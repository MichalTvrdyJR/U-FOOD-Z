<?php
/* @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
use App\Controllers\Daily_menuController;
/*** @var App\Models\Days $days */;
?>

<div class="column">
    <div class="center-text">
    <?php if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin") {?>
        <span class="text-dm" >Denné menu sú k dispozícií medzi <?= \App\Models\Time_interval::getOne(1)->getTime()?> a <?= \App\Models\Time_interval::getOne(2)->getTime()?> hodinou</span>
        <a href="?c=daily_menu&a=edit_time" class="btn btn-warning ed-buttons">Edit</a>
    <?php }?>
        <span class="text-dm" ><?= @$data['message'] ?></span>
    </div>
    <?php   unset($data['message']);
            if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin") {
                $days = \App\Models\Days::getAll();
            } else {
                $days = \App\Models\Days::getOne(date('w'));
            }
            foreach ($days as $day) {
                $cislo = 1;
                $isUsed = false;
                foreach ($data as $x => $value) {
                    if($day->getId() == $value->getDay()) {
                        if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin" && $isUsed === false) {
            ?>
                            <div class="center-text">
                                <span class="text-dm" ><?=$day->getName()?></span>
                            </div>
                  <?php $isUsed = true;
                        }?>
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
