<?php
/* @var \App\Models\Food_type[] $data */
/** @var \App\Core\IAuthenticator $auth */
?>

<div class="container">
    <?php foreach ($data as $column) { ?>
        <div class="containers">
            <h1><?=$column->getType()?></h1>
            <img src="public/images/<?= $column->getPicture()?>" alt="food type" class="food_types_image">
            <a href="?c=food&a=index&id=<?=$column->getId()?>" class="overlay_down food_types_title">Otvor</a>
            <?php if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin") { ?>
            <a href="?c=menu&a=edit&id=<?=$column->getId()?>" class="overlay_up_left food_types_title">Edit</a>
            <a href="?c=menu&a=delete&id=<?=$column->getId()?>" class="overlay_up_rigth food_types_title">Vymazať</a>
            <?php } ?>
        </div>
    <?php } ?>
    <?php if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin") { ?>
    <div class="containers">
        <h1>Nový</h1>
        <img src="public/images/default_food_type.img" alt="new food type" class="food_types_image">
        <a href="?c=menu&a=add" class="overlay fa fa-plus food_types_title"></a>
    </div>
    <?php } ?>
</div>