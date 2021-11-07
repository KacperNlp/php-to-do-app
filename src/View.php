<?php 

declare(strict_types = 1);

namespace App;

class View 
{
    public array $websiteText = [
        "website-name" => "To do App",
        "website-header" => "Your tasks list",
        "add-task-button" => [
            "text" => "Add new task",
            "url" => "/?action=create"
        ],
        "show-tasks-button" => [
            "text" => "Show all tasks",
            "url" => "/?action=list"
        ]
    ];

    public function renderLayout(?string $urlParam, array $params, array $typeOfActions): void
    {
        include_once('./templates/layout.php');
    }
}