<?php
    $websiteText = $this->websiteText;
;?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $websiteText['website-name'] ?></title>
    <link rel="stylesheet" href="../styles/main.css">
</head>
<body>
    <?php if($urlParam != $typeOfActions['empty']) :?>
        <a href="<?= $websiteText['back-to-menu']['url'] ;?>" class="back-to-menu-btn">
            <?= $websiteText['back-to-menu']['text'] ;?>
        </a>
    <?php endif;?>
    <header>
        <h1 class="website-header"><?= $websiteText['website-header'] ?></h1>
    </header>
    <main>
        <div class="buttons-container">
            <?php if($urlParam != $typeOfActions['add-task']) :?>
                <a href="<?= $websiteText['add-task-button']['url'] ?>">
                    <?= $websiteText['add-task-button']['text'] ?>
                </a>
            <?php endif ;?>

            <?php if($urlParam != $typeOfActions['task-list']) :?>
                <a href="<?= $websiteText['show-tasks-button']['url'] ?>">
                    <?= $websiteText['show-tasks-button']['text'] ?>
                </a>
            <?php endif ;?>
        </div>
        <div class="content">
            <?php 
                switch($urlParam):
                    case $typeOfActions['add-task']:
                        include_once('./templates/pages/add-task.php');
                    break;
                    case $typeOfActions['new-task']:
                        include_once('./templates/pages/new-task.php');
                    break;
                    case $typeOfActions['task-list']:
                        include_once('./templates/pages/list.php');
                    break;
                    case $typeOfActions['empty']:
                        include_once('./templates/pages/menu.php');
                    break;
                    default:
                        include_once('./templates/pages/404.php');
                    break;
                endswitch;
            ;?>
        </div>
    </main>
</body>
</html>