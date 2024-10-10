<?php

namespace Tests\PhpRbacBundle;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AbstractTestCase extends KernelTestCase
{
    protected ContainerInterface $container;

    protected function setUp(): void
    {
        self::$kernel = self::createKernel();
        self::$kernel->boot();
        $this->container = self::$kernel->getContainer();
    }
}
