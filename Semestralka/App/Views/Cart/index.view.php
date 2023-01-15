<?php
/* @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
?>

<div class="column">
    <div class="center-text">
        <span class="text-dm" ><?= @$data['message'] ?></span>
    </div>
    <?php   unset($data['message']);
            foreach ($data as $x => $value) { ?>
        <div class="card my-3 food-type">
            <div class="card-body">
                <span class="card-title"><?=\App\Models\Food::getOne($value->getFood())->getName() ?></span>
                <a href="?c=cart&a=add_cart&id=<?=$value->getId()?>" class="fa fa-plus ed-buttons" style="font-size:30px"></a>
                <a class="ed-buttons"><?=$value->getCount() ?></a>
                <a href="?c=cart&a=delete_cart&id=<?=$value->getId()?>" class="fa fa-minus ed-buttons" style="font-size:30px"></a>
            </div>
        </div>
    <?php } ?>
</div>