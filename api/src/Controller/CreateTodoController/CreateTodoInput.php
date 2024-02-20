<?php

namespace App\Controller\CreateTodoController;

class CreateTodoInput
{
    public string $type;
    public string $title;
    public int $completionProgress = 0;
    public bool $completed = false;
    public ?\DateTime $dueDate = null;
}
