<?php

declare(strict_types=1);

use App\Domain\ProductVideo\ProductVideoRepository;
use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\ProductVideo\InDatabaseProductVideoRepository;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        ProductVideoRepository::class => \DI\autowire(InDatabaseProductVideoRepository::class),
        UserRepository::class => \DI\autowire(InMemoryUserRepository::class),
    ]);
};
