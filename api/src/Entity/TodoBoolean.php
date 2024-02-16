<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TodoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

final  class TodoBoolean extends Todo
{
}
