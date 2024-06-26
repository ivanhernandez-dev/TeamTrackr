<?php

declare(strict_types=1);

namespace App\TeamTrackr\Shared\Infrastructure\Persistence\Doctrine\Dbal;

use Doctrine\DBAL\Types\Type;

use function Lambdish\Phunctional\each;

final class DbalCustomTypesRegister
{
    private static bool $initialized = false;

    public static function register(array $customTypeClassNames): void
    {
        if (!self::$initialized) {
            each(self::registerType(), $customTypeClassNames);

            self::$initialized = true;
        }
    }

    private static function registerType(): callable
    {
        return static function (mixed $customTypeClassName): void {
            $name = $customTypeClassName::customTypeName();

            Type::addType($name, $customTypeClassName);
        };
    }
}
