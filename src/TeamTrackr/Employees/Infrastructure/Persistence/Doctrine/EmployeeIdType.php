<?php

declare(strict_types=1);

namespace App\TeamTrackr\Employees\Infrastructure\Persistence\Doctrine;

use App\TeamTrackr\Employees\Domain\ValueObject\EmployeeId;
use App\TeamTrackr\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class EmployeeIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return EmployeeId::class;
    }
}
