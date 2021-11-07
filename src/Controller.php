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
        "task-list" => "list"
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
        || $actionName === self::TYPE_OF_ACCEPTERD_ACTIONS['task-list'])
            return false;
        return true;
    }

    private function getCurrentActionOfGet(): ?string
    {
        $currentAction = $this->request['get']['action'];
        return $currentAction ?? null;
    }

    private function getDataFromPost(): array
    {
        return $this->request['post'] ?? [];
    }
}