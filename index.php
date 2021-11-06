<?php

declare(strict_types = 1);

namespace App;

require_once('./src/Utils/debug.php');

$websiteText = [
    "website-name" => "To do App",
    "website-header" => "Your tasks list",
    "add-task-button" => [
        "text" => "Add new task",
        "url" => "/?action=create"
    ],
    "show-tasks-button" => [
        "text" => "Show all tasks",
        "url" => "/"
    ]
];
?>
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
    </main>
</body>
</html>