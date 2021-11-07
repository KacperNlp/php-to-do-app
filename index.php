<?php

declare(strict_types = 1);

namespace App;

require_once('./src/Utils/debug.php');
require_once('./src/Controller.php');

$request = [
    "post" => $_POST,
    "get" => $_GET
];

$controller = new Controller($request);
$controller->controllDisplayingPage();
