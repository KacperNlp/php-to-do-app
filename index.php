<?php

declare(strict_types = 1);

namespace App;

use App\Exception\AppExcpetion;
use App\Exception\ConfigurationException;
use Throwable;

require_once('./src/Utils/debug.php');
require_once('./src/Exception/AppExcpetion.php');
require_once('./src/Controller.php');

$configuration = require_once('./config/config.php');

$request = [
    "post" => $_POST,
    "get" => $_GET
];

try {
    Controller::getDatabaseConfiguration($configuration);
    $controller = new Controller($request);
    $controller->controllDisplayingPage();
} catch(ConfigurationException $e) {
    echo '<h1>Sorry we have problem witch configuration</h1>';
    echo '<p>please contact with administration to resolve this problem :)</p>';
} catch(AppExcpetion $e) {
    echo $e->getMessage();
} catch(Throwable $e) {
    echo 'There is a problem form our side. Sorry for that! :(';
};