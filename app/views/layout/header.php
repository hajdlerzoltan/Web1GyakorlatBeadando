<!doctype html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= APP_NAME ?></title>
        <link rel="stylesheet" href="public/assets/css/style.css">
    </head>
    <body>
        <header>
            <div class="top">
                <h1><?= APP_NAME ?></h1>
                <?php if(isLoggedIn()): ?>
                    <p class="user">Bejelentkezett: <?= e(currentUserName()) ?></p>
                    <?php endif; ?>
            </div>
            <nav>
                <a href="index.php?route=home">Főoldal</a>
                <a href="index.php?route=gallery">Képek</a>
                <a href="index.php?route=contact">Kapcsolat</a>
                <?php if(isLoggedIn()): ?>
                    <a href="index.php?route=messages">Üzenetek</a>
                    <?php endif; ?>
                    <a href="index.php?route=crud">CRUD</a>
                    <?php if(isLoggedIn()): ?>
                        <a href="index.php?route=logout">Kilépés</a>
                        <?php else: ?>
                            <a href="index.php?route=login">Bejelentkezés</a>
                            <?php endif; ?>
            </nav>
        </header>
        <main>
            <?php if($m=flash()): ?>
                <div class="flash">
                    <?= e($m) ?>
                </div>
            <?php endif; ?>
