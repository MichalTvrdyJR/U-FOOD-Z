<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Main</title>
    <link rel = "stylesheet" href="public/css/styl.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="public/js/script.js"></script>
</head>
<body id="page-body">
<header id="header" class="sticky-top">
    <nav id="mainNavigation">
        <div role="navigation" class="py-3 text-center my-div">
            <img id="logo" src="public/images/logo.png" class="invert" alt="Logo">
        </div>
        <div id="menu_parts" class="navbar-expand-md">
            <div class="navbar-dark text-center my-2">
                <button class="navbar-toggler w-75" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-reorder menu-colors"></i>
                </button>
            </div>
            <div class="text-center mt-3 collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto ">
                    <li class="nav-item menu-colors">
                        <a class="nav-link" aria-current="page" href="?c=home">Home</a>
                    </li>
                    <li class="nav-item menu-colors">
                        <a class="nav-link" href="?c=daily_menu">Daily menu</a>
                    </li>
                    <li class="nav-item menu-colors">
                        <a class="nav-link" href="?c=menu">Menu</a>
                    </li>
                    <li class="nav-item menu-colors">
                        <a class="nav-link" href="?c=cart">Cart</a>
                    </li>
                    <li class="nav-item menu-colors">
                        <?php if ($auth->isLogged()) { ?>
                        <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="fa fa-fw fa-user"></span><?= $auth->getLoggedUserName() ?> <span class="fa fa-toggle-down"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="float:left;">
                            <li><a class="dropdown-item" href="?c=profile"><?=$auth->getLoggedUserName() == 'Admin' ? 'Users' : 'Profile' ?></a></li>
                            <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#Logout">Log out</a></li>
                        </ul>
                        <?php } else { ?>
                        <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="fa fa-fw fa-user"></span>Account <span class="fa fa-toggle-down"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="float:left;">
                            <li><a class="dropdown-item" href="?c=auth&a=login">Login</a></li>
                            <li><a class="dropdown-item" href="?c=auth&a=registration">Registration</a></li>
                        </ul>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="container-fluid mt-3">
    <div class="web-content">
        <?= $contentHTML ?>
    </div>
</div>
<div class="modal fade" id="Logout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Naozaj sa chcete odhlásiť?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-primary" href="?c=auth&a=logout"">Odhlásiť</a>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Zavrieť</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>