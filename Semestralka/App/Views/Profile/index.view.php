<?php
/* @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
?>

<div class="column">
    <div class="center-text">
        <span class="text-dm" ><?= @$data['message'] ?></span>
    </div>
    <?php   unset($data['message']);
            if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin") {
                unset($data['0']);
            }
            foreach ($data as $x => $value) { ?>
        <div class="card my-3 food-type">
            <div class="card-body">
                <img id="profile" src="public/images/<?= $value->getPicture() ?>" class="invert" alt="Obrazok">
            </div>
            <div class="card-body">
                <span class="card-title"><?=$value->getName() . ' ' . $value->getSurname() ?></span>
                <?php if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin") { ?>
                <a href="?c=profile&a=delete&id=<?=$value->getId() ?>" class="btn btn-danger ed-buttons">Delete</a>
                <?php }?>
            </div>
            <?php if ($auth->isLogged() && $auth->getLoggedUserName() != "Admin") {?>
            <div>
                <span class="icon fa fa-envelope"></span>
                <span class="profile-info"><?=$value->getEmail()?></span>
            </div>
            <div>
                <span class="icon fa fa-phone"></span>
                <span class="profile-info"><?=$value->getPhone()?></span>
                <a href="?c=profile&a=edit&id=<?=$value->getId() ?>" class="btn btn-warning ed-buttons">Edit</a>
            </div>
            <?php }?>
        </div>
    <?php } ?>
</div>