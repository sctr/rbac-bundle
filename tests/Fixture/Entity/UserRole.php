<?php

namespace Fixture\Entity;

use Doctrine\ORM\Mapping as ORM;
use PhpRbacBundle\Entity\Role;
use PhpRbacBundle\Repository\RoleRepository;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
#[ORM\Table('user_roles')]
class UserRole extends Role
{

}