<?php

declare(strict_types=1);

namespace App\TeamTrackr\Employees\Domain\Contract;

use App\TeamTrackr\Employees\Domain\Employee;
use App\TeamTrackr\Employees\Domain\ValueObject\EmployeeId;

interface EmployeeRepository
{
    public function search(EmployeeId $id): ?Employee;
}
