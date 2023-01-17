<?php
/* @var \App\Models\Food_type[] $data */
/** @var \App\Core\IAuthenticator $auth */
?>

<div class="column">
    <?php foreach ($data as $column) { ?>
    <div class="container">
        <div class="card my-3 food-type">
            <div class="card-body">
                <span class="card-title"><?=$column->getType() ?></span>
                <img  class="invert" src="public/images/<?= $column->getPicture() ?>" href="?c=food&a=index&id=<?=$column->getId()?>" alt="">
                <a href="?c=food&a=index&id=<?=$column->getId() ?>" class="btn btn-warning ed-buttons">Otvor</a>
                <?php if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin") { ?>
                <a href="?c=menu&a=edit&id=<?=$column->getId() ?>" class="btn btn-warning ed-buttons">Edit</a>
                <a href="?c=menu&a=delete&id=<?=$column->getId() ?>" class="btn btn-danger ed-buttons">Delete</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin") { ?>
    <div class="card my-3 food-type">
        <div class="card-body">
            <a href="?c=menu&a=add" class="btn btn-info">Pridaj</a>
        </div>
    </div>
    <?php } ?>
</div>