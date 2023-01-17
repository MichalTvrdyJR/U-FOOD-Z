<?php
/* @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
?>

<div class="container">
    <div class="center-text">
        <h1><?= @$data['message'] ?></h1>
    </div>
    <?php   unset($data['message']);
            if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin") {
                unset($data['0']);
            }
            foreach ($data as $x => $value) { ?>
    <div class="profile_containers">
        <div class="card food-type">
            <div class="card-body">
                <img id="profile" src="public/images/<?= $value->getPicture() ?>" class="profile_image" alt="profile">
                <h2><?=$value->getName() . ' ' . $value->getSurname() ?></>
            </div>
            <?php if ($auth->isLogged() && $auth->getLoggedUserName() != "Admin") {?>
                <h4 class="profile-info">email: <?=$value->getEmail()?></h4>
                <h4 class="profile-info">telefón: <?=$value->getPhone()?></h4>
        <?php }?>
        </div>
        <?php if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin") { ?>
            <a href="?c=profile&a=delete&id=<?=$value->getId() ?>" class="overlay_top profile_style">Delete</a>
        <?php } else if ($auth->isLogged() && $auth->getLoggedUserName() != "Admin") {?>
            <a href="?c=profile&a=edit&id=<?=$value->getId() ?>" class="overlay_top profile_style">Edit</a>
        <?php }?>
    </div>
    <?php } ?>
</div>