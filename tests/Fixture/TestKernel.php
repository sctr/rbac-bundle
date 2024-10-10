<?php

namespace Tests\PhpRbacBundle\Fixture;

use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use PhpRbacBundle\PhpRbacBundle;
use Psr\Log\NullLogger;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Zenstruck\Foundry\ZenstruckFoundryBundle;

class TestKernel extends Kernel
{
    use MicroKernelTrait;

    public function registerBundles(): iterable
    {
        yield new FrameworkBundle();
        yield new DoctrineBundle();
        yield new ZenstruckFoundryBundle();
        yield new SecurityBundle();
        yield new PhpRbacBundle();
    }

    protected function configureContainer(ContainerBuilder $container, LoaderInterface $loader): void
    {
        $container->loadFromExtension('framework', [
            'http_method_override' => false,
            'secret' => 'S3CRET',
            'router' => ['utf8' => true],
            'test' => true,
        ]);

        $container->loadFromExtension('doctrine', [
            'dbal' => ['url' => '%env(resolve:DATABASE_URL)%', 'use_savepoints' => true],
            'orm' => [
                'auto_generate_proxy_classes' => true,
                'auto_mapping' => true,
                'mappings' => [
                    'Entity' => [
                        'is_bundle' => false,
                        'type' => 'attribute',
                        'dir' => '%kernel.project_dir%/tests/Fixture/Entity',
                        'prefix' => 'Tests\PhpRbacBundle\Fixture\Entity',
                        'alias' => 'Entity',
                    ],
                    'Model' => [
                        'is_bundle' => false,
                        'type' => 'attribute',
                        'dir' => '%kernel.project_dir%/tests/Fixture/Model',
                        'prefix' => 'Tests\PhpRbacBundle\Fixture\Model',
                        'alias' => 'Model',
                    ],
                ],
                'controller_resolver' => ['auto_mapping' => true],
            ],
        ]);

        $container->register('logger', NullLogger::class);
    }
}