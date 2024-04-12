<?php

declare(strict_types=1);

namespace App\TeamTrackr\Shared\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityManagerInterface;

final class MoocEntityManagerFactory
{
    // TODO: Set the path to the schema file here
    private const SCHEMA_PATH = __DIR__.'/../../../../../../database/teamtrackr-app.sql';

    public static function create(array $parameters, string $environment): EntityManagerInterface
    {
        $isDevMode = 'prod' !== $environment;

        $prefixes = array_merge(
            DoctrinePrefixesSearcher::inPath(__DIR__.'/../../../..', 'App')
        );

        $dbalCustomTypesClasses = DbalTypesSearcher::inPath(__DIR__.'/../../../..', 'TeamTrackr');

        return DoctrineEntityManagerFactory::create(
            $parameters,
            $prefixes,
            $isDevMode,
            self::SCHEMA_PATH,
            $dbalCustomTypesClasses
        );
    }
}
