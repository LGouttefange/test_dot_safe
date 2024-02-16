<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TodoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TodoRepository::class)]
final  class TodoProgress extends Todo
{
    // #[ORM\Column]
    // private ?int $completionProgress = null;

    // public function getCompletionProgress(): ?int
    // {
    //     return $this->completionProgress;
    // }

    // public function setCompletionProgress(int $completionProgress): static
    // {
    //     $this->completionProgress = $completionProgress;

    //     return $this;
    // }
}
