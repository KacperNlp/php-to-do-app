<?php 

declare(strict_types = 1);

namespace App;

class View 
{
    const NAME_OF_URL_WHERE_USER_CAN_CREATE_TASK = 'create';

    public array $websiteText = [
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

    public function renderLayout(?string $urlParam, array $params): void
    {
        dump($params);
        include_once('./templates/layout.php');
    }

    public function isUserOnUrlWhereHeCanAddTask($urlParam): bool
    {
        return $urlParam === self::NAME_OF_URL_WHERE_USER_CAN_CREATE_TASK;
    }
}