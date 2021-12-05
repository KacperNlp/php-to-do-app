<?php

declare(strict_types = 1);

namespace App;

use App\Exception\ConfigurationException;

require_once('View.php');
require_once('Database.php');
require_once('Exception/ConfigurationException.php');

class Controller
{
    private static array $configuration = [];
    private array $request;
    private $view;
    private Database $database;

    const TYPE_OF_ACCEPTERD_ACTIONS = [
        "add-task" => "create",
        "new-task" => "added",
        "task-list" => "list",
        "empty" => ""
    ];

    public static function getDatabaseConfiguration(array $config) {
        self::$configuration = $config;
    }

    public function __construct(array $request)
    {
        if(empty(self::$configuration['db']))
            throw new ConfigurationException('Configuration ERROR!');

        $this->database = new Database(self::$configuration['db']);
        $this->request = $request;
        $this->view = new View();
    }

    public function controllDisplayingPage(): void
    {
        $action = $this->getCurrentActionOfGet();
        $dataPostParams = $this->getDataFromPost();

        if($this->didUserPassParamsToCreateTask($dataPostParams)) {
            $this->database->createNote($dataPostParams);
            header('Location: /');
        }

        if($this->ifActionIsDifferentThanExpectet($action))
            $action = null;

        $this->view->renderLayout($action, $dataPostParams, self::TYPE_OF_ACCEPTERD_ACTIONS);
    }

    private function ifActionIsDifferentThanExpectet(?string $actionName): bool
    {
        if($actionName === self::TYPE_OF_ACCEPTERD_ACTIONS['add-task']
        || $actionName === self::TYPE_OF_ACCEPTERD_ACTIONS['new-task']
        || $actionName === self::TYPE_OF_ACCEPTERD_ACTIONS['task-list']
        || $actionName === self::TYPE_OF_ACCEPTERD_ACTIONS['empty'])
            return false;
        return true;
    }

    private function getCurrentActionOfGet(): ?string
    {
        $requestGet =  $this->request['get'];
        if(count($requestGet) < 1)
            return null;

        $currentAction = $requestGet['action'];
        return $currentAction ?? null;
    }

    private function getDataFromPost(): array
    {
        return $this->request['post'] ?? [];
    }

    private function didUserPassParamsToCreateTask(array $data): bool {
        return !empty($data);
    }
}