<?php

namespace Tests\PhpRbacBundle\Fixture\Entity;

use Doctrine\ORM\Mapping as ORM;
use PhpRbacBundle\Entity\Permission;
use PhpRbacBundle\Repository\PermissionRepository;

#[ORM\Entity(repositoryClass: PermissionRepository::class)]
#[ORM\Table('user_permissions')]
class FixturePermission extends Permission
{

}