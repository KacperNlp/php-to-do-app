<?php

declare(strict_types = 1);

namespace App;

require_once('./src/Utils/debug.php');
require_once('./src/View.php');

$action = $_GET['action'] ?? null;
$taskParams = [];

if(!empty($_POST))
    $taskParams = $_POST;

$view = new View();
$view->renderLayout($action, $taskParams);
