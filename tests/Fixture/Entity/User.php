<?php

namespace Fixture\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use PhpRbacBundle\Entity\UserRoleTrait;

#[
    ORM\Entity,
    ORM\Table(name: 'customers'),
]
class User
{
    use UserRoleTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER, options: ['unsigned' => true])]
    public ?int $userId = null;

    #[ORM\Column(type: Types::STRING, length: 64)]
    public string $email = '';
}