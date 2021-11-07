<?php

declare(strict_types = 1);

namespace App;

require_once('./src/View.php');

class Controller
{
    private array $postParams;
    private array $getParams;
    const TYPE_OF_ACCEPTERD_ACTIONS = [
        "add-task" => "create",
        "new-task" => "added",
        "task-list" => "list"
    ];

    public function __construct(array $postParams, array $getParams)
    {
        $this->postParams = $postParams;
        $this->getParams = $getParams;
    }

    public function controllDisplayingPage(): void
    {
        $view = new View();
        $action = $this->getParams['action'] ?? null;

        if($this->ifActionIsDifferentThanExpectet($action))
            $action = null;

        $view->renderLayout($action, $this->postParams, self::TYPE_OF_ACCEPTERD_ACTIONS);
    }

    private function ifActionIsDifferentThanExpectet(?string $actionName): bool
    {
        if($actionName === self::TYPE_OF_ACCEPTERD_ACTIONS['add-task']
        || $actionName === self::TYPE_OF_ACCEPTERD_ACTIONS['new-task']
        || $actionName === self::TYPE_OF_ACCEPTERD_ACTIONS['task-list'])
            return false;
        return true;
    }
}