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
</head>
<body>
    <header>
        <h1><?= $websiteText['website-header'] ?></h1>
    </header>
    <main>
        <div class="buttons-container">
            <a href="<?= $websiteText['add-task-button']['url'] ?>">
                <?= $websiteText['add-task-button']['text'] ?>
            </a>
            <a href="<?= $websiteText['show-tasks-button']['url'] ?>">
                <?= $websiteText['show-tasks-button']['text'] ?>
            </a>
        </div>
        <div class="content">
            <?php 
                if($this->isUserOnUrlWhereHeCanAddTask($urlParam))
                    include_once('./templates/pages/add-task.php');
                else 
                    include_once('./templates/pages/list.php');
            ;?>
        </div>
    </main>
</body>
</html>