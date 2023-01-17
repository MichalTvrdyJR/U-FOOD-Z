<?php
/* @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
?>

<div class="column">
    <div class="center-text">
        <span class="text-dm" ><?= @$data['message'] ?></span>
        <?php if ($data['price'] > 0) {?>
            <span class="text-dm" >Celková suma je <?= @$data['price'] ?>€</span>
        <?php }?>
    </div>
    <?php   unset($data['message']);
            unset($data['price']);
            foreach ($data as $x => $value) { ?>
    <div class="cart_containers">
        <div class="card my-3 food-type">
            <div class="card-body">
                <span class="card-title"><?=\App\Models\Food::getOne($value->getFood())->getName() ?></span class="card-title">
                <a href="?c=cart&a=add_cart&id=<?=$value->getId()?>" class="fa fa-plus ed-buttons text-dm" style="font-size:30px"></a>
                <span class="text-dm"> - počet kusov - <?=$value->getCount() ?></span>
                <a href="?c=cart&a=delete_cart&id=<?=$value->getId()?>" class="fa fa-minus ed-buttons text-dm" style="font-size:30px"></a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>