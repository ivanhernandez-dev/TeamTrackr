<?php

declare(strict_types=1);

namespace App\TeamTrackr\Employees\Application\Find;

use App\TeamTrackr\Employees\Domain\Contract\EmployeeRepository;
use App\TeamTrackr\Employees\Domain\Employee;
use App\TeamTrackr\Employees\Domain\Error\EmployeeNotExist;
use App\TeamTrackr\Employees\Domain\ValueObject\EmployeeId;

final readonly class EmployeeFinder
{
    public function __construct(private EmployeeRepository $repository)
    {
    }

    public function __invoke(EmployeeId $id): Employee
    {
        $employee = $this->repository->search($id);

        if (null === $employee) {
            throw new EmployeeNotExist($id);
        }

        return $employee;
    }
}
