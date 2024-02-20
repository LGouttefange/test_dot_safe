<?php

namespace App\Controller\CreateTodoController;

use App\Entity\TodoBoolean;
use App\Entity\TodoDueDate;
use App\Entity\TodoProgress;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateTodoController extends AbstractController
{
    public function __construct(
        private NormalizerInterface $normalizer,
        private DenormalizerInterface $denormalizer,
    )
    {
    }

    public function __invoke(#[MapRequestPayload] CreateTodoInput $input)
    {
        $type = $input->type;

        $class = match ($type) {
            "todo" => TodoBoolean::class,
            "timedtodo" => TodoDueDate::class,
            "todowithpartialprogression" => TodoProgress::class,
            default => throw new BadRequestException("Type '{$type}' could not be found")
        };

        $newTodo = $this->denormalizer->denormalize($this->normalizer->normalize($input), $class);

        return $newTodo;
    }

}
