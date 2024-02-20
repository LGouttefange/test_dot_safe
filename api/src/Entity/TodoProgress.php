<?php

// private ?int $completionProgress = null;
// public function getCompletionProgress(): ?int

// {
//     return $this->completionProgress;
// }
// public function setCompletionProgress(int $completionProgress): static

// {
namespace App\Entity;

use ApiPlatform\Action\NotFoundAction;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use App\Repository\TodoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TodoRepository::class)]
#[ApiResource(operations: [
    new Get(
        controller: NotFoundAction::class,
        output: false,
        read: false
    )
])]
final class TodoProgress extends Todo
{
    
}
