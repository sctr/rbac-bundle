<?php

namespace PhpRbacBundle\Core\Manager;

use PhpRbacBundle\Entity\PermissionInterface;
use PhpRbacBundle\Exception\RbacPermissionNotFoundException;

interface PermissionManagerInterface extends NodeManagerInterface
{
    /**
     * Remove permission and attach all the sub-permission to the parent
     *
     * @throws RbacPermissionNotFoundException
     */
    public function remove(PermissionInterface $permission): bool;

    /**
     * Remove Permission and all sub-permissions from system
     *
     * @throws RbacPermissionNotFoundException
     */
    public function removeRecursively(PermissionInterface $permission): bool;

    /**
     * check if a user has the permission or not
     *
     * @param int   $permissionId
     * @param mixed $userId
     *
     * @return bool
     */
    public function hasPermission(int $permissionId, mixed $userId): bool;
}
