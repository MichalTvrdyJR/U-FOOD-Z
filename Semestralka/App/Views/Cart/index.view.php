<?php
/* @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
?>

<div class="column">
    <div class="center-text">
        <span class="text-dm" ><?= @$data['message'] ?></span>
    </div>
    <?php   unset($data['message']);
            foreach ($data as $x => $column) { ?>
        <div class="card my-3 food-type">
            <div class="card-body">
                <span class="card-title"><?=\App\Models\Food::getOne($column->getFood())->getName() ?></span>
            </div>
        </div>
    <?php } ?>
</div>