<?php

declare(strict_types=1);

namespace App\TeamTrackr\Employees\Domain\Error;

use App\TeamTrackr\Employees\Domain\ValueObject\EmployeeId;
use App\TeamTrackr\Shared\Domain\DomainError;

final class EmployeeNotExist extends DomainError
{
    public function __construct(private readonly EmployeeId $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'employee_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The employee <%s> does not exist', $this->id->value());
    }
}
