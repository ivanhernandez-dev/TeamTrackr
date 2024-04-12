<?php

declare(strict_types=1);

namespace App\TeamTrackr\Employees\Domain;

use App\TeamTrackr\Employees\Domain\ValueObject\EmployeeBirthDate;
use App\TeamTrackr\Employees\Domain\ValueObject\EmployeeFirstName;
use App\TeamTrackr\Employees\Domain\ValueObject\EmployeeGender;
use App\TeamTrackr\Employees\Domain\ValueObject\EmployeeHireDate;
use App\TeamTrackr\Employees\Domain\ValueObject\EmployeeId;
use App\TeamTrackr\Employees\Domain\ValueObject\EmployeeLastName;
use App\TeamTrackr\Shared\Domain\Aggregate\AggregateRoot;

final class Employee extends AggregateRoot
{
    public function __construct(
        private readonly EmployeeId $id,
        private EmployeeFirstName $firstName,
        private EmployeeLastName $lastName,
        private EmployeeGender $gender,
        private EmployeeBirthDate $birthDate,
        private EmployeeHireDate $hireDate
    ) {
    }

    public function create(
        EmployeeId $id,
        EmployeeFirstName $firstName,
        EmployeeLastName $lastName,
        EmployeeGender $gender,
        EmployeeBirthDate $birthDate,
        EmployeeHireDate $hireDate
    ): self {
        return new self($id, $firstName, $lastName, $gender, $birthDate, $hireDate);
    }

    public function id(): EmployeeId
    {
        return $this->id;
    }

    public function firstName(): EmployeeFirstName
    {
        return $this->firstName;
    }

    public function lastName(): EmployeeLastName
    {
        return $this->lastName;
    }

    public function gender(): EmployeeGender
    {
        return $this->gender;
    }

    public function birthDate(): EmployeeBirthDate
    {
        return $this->birthDate;
    }

    public function hireDate(): EmployeeHireDate
    {
        return $this->hireDate;
    }
}
