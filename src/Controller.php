<?php

declare(strict_types = 1);

namespace App;

require_once('./src/View.php');

class Controller
{
    private array $request;
    private $view;
    const TYPE_OF_ACCEPTERD_ACTIONS = [
        "add-task" => "create",
        "new-task" => "added",
        "task-list" => "list",
        "empty" => ""
    ];

    public function __construct(array $request)
    {
        $this->request = $request;
        $this->view = new View();
    }

    public function controllDisplayingPage(): void
    {
        $action = $this->getCurrentActionOfGet();
        $dataPostParams = $this->getDataFromPost();

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
}