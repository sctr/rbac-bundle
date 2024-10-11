<?php

namespace Factory;

use Fixture\Entity\FixtureUser;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use function Zenstruck\Foundry\faker;

class FixtureUserFactory extends PersistentProxyObjectFactory
{
    protected function defaults(): array|callable
    {
        return [
            'email' => faker()->email(),
        ];
    }

    public static function class(): string
    {
        return FixtureUser::class;
    }
}