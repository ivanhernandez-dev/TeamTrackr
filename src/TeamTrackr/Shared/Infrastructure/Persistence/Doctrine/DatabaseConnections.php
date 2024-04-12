<?php

declare(strict_types=1);

namespace App\TeamTrackr\Shared\Infrastructure\Persistence\Doctrine;

use App\TeamTrackr\Shared\Domain\Utils;
use Doctrine\ORM\EntityManager;

use function Lambdish\Phunctional\each;

final class DatabaseConnections
{
    private readonly array $connections;

    public function __construct(iterable $connections)
    {
        $this->connections = Utils::iterableToArray($connections);
    }

    public function clear(): void
    {
        each(fn (EntityManager $entityManager) => $entityManager->clear(), $this->connections);
    }
}
