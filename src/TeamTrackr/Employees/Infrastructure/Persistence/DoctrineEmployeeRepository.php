<?php

declare(strict_types=1);

namespace App\TeamTrackr\Employees\Infrastructure\Persistence;

use App\TeamTrackr\Employees\Domain\Contract\EmployeeRepository;
use App\TeamTrackr\Employees\Domain\Employee;
use App\TeamTrackr\Employees\Domain\ValueObject\EmployeeId;
use App\TeamTrackr\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineEmployeeRepository extends DoctrineRepository implements EmployeeRepository
{
    public function search(EmployeeId $id): ?Employee
    {
        return $this->repository(Employee::class)->find($id);
    }
}
