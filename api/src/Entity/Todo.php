<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Controller\CreateTodoController\CreateTodoController;
use App\Repository\TodoRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\InheritanceType;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Component\Uid\UuidV4;

#[ORM\Entity(repositoryClass: TodoRepository::class)]
#[InheritanceType('SINGLE_TABLE')]
#[ApiResource(
    operations: [
        new GetCollection(),
        new Post(controller: CreateTodoController::class, deserialize: false),
        new Patch()
    ]
)]
abstract class Todo
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    public ?string $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?bool $completed = false;

    #[ORM\Column]
    private ?int $completionProgress = null;

    public function __construct()
    {
        $this->id = UuidV4::v4();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function isCompleted(): ?bool
    {
        return $this->completed;
    }

    public function setCompleted(bool $completed): static
    {
        $this->completed = $completed;

        return $this;
    }

    public function getCompletionProgress(): ?int
    {
        return $this->completionProgress;
    }

    public function setCompletionProgress(int $completionProgress): static
    {
        $this->completionProgress = $completionProgress;

        return $this;
    }
}
