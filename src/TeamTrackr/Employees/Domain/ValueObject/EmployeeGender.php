<?php

declare(strict_types=1);

namespace App\TeamTrackr\Employees\Domain\ValueObject;

use App\TeamTrackr\Shared\Domain\ValueObject\StringValueObject;

final class EmployeeGender extends StringValueObject
{
    public const string MASCULINE = 'M';
    public const string FEMININE = 'F';
    private const array VALID_GENDERS = [self::MASCULINE, self::FEMININE];

    public function __construct(string $value)
    {
        $this->ensureIsValid($value);
        parent::__construct($value);
    }

    private function ensureIsValid(string $value): void
    {
        if (!in_array($value, self::VALID_GENDERS, true)) {
            throw new \InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', self::class, $value));
        }
    }
}
