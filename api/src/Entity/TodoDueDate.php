<?php

namespace App\Entity;

use ApiPlatform\Action\NotFoundAction;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use App\Repository\TodoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

// #[ApiResource]
#[ORM\Entity(repositoryClass: TodoRepository::class)]
#[ApiResource(operations: [
    new Get(
        controller: NotFoundAction::class,
        output: false,
        read: false
    )
])]
class TodoDueDate extends Todo
{
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    public ?\DateTimeInterface $dueDate = null;

    public function getDueDate(): ?\DateTimeInterface
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTimeInterface $dueDate): static
    {
        $this->dueDate = $dueDate;

        return $this;
    }
}
