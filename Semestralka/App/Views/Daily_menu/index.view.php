<?php
/* @var \App\Models\Daily_menu[] $data */
/** @var \App\Core\IAuthenticator $auth */
use App\Controllers\Daily_menuController;
?>

<?php if (($auth->isLogged() && $auth->getLoggedUserName() == "Admin") ||
    Daily_menuController::isTimeInInterval(floatval(date('h.i')))) {
    ?>
<div class="column">
    <?php $cislo = 1;
          foreach ($data as $column) {
            if ($column->getDay() == date('w') || ($auth->isLogged() && $auth->getLoggedUserName() == "Admin")) {
                 ?>
        <div class="card my-3 food-type">
            <div class="card-body">
                <span class="card-title">Menu <?=$cislo ?> : </span>
                <span class="card-title"><?=$column->getName() ?></span>
                <span class="cena"><?=$column->getPrice() ?>€</span>
            </div>
            <div>
                <span class="zlozenie">Zloženie: <?=$column->getIngredients() ?></span>
                <?php if ($auth->isLogged() && $auth->getLoggedUserName() == "Admin") { ?>
                    <a href="?c=daily_menu&a=edit&id=<?=$column->getId() ?>" class="btn btn-warning ed-buttons">Edit</a>
                    <a href="?c=daily_menu&a=delete&id=<?=$column->getId() ?>" class="btn btn-danger ed-buttons">Delete</a>
                <?php } ?>
            </div>
        </div>
    <?php   $cislo = $cislo + 1;
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
<?php } else { ?>
<div class="center-text">
    <span class="text-dm">Bohužiaľ predaj denných menu nie je v aktuálnom čase k dispozícií</span>
</div>
<?php } ?>
