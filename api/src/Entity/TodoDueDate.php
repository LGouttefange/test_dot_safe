<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TodoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

// #[ApiResource]
#[ORM\Entity(repositoryClass: TodoRepository::class)]
class TodoDueDate extends Todo
{
        // #[ORM\Column(type: Types::DATE_MUTABLE)]
        // private ?\DateTimeInterface $dueDate = null;

        // public function getDueDate(): ?\DateTimeInterface
        // {
        //     return $this->dueDate;
        // }

        // public function setDueDate(\DateTimeInterface $dueDate): static
        // {
        //     $this->dueDate = $dueDate;

        //     return $this;
        // }
}
