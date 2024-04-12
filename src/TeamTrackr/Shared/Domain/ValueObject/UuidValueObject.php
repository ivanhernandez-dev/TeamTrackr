<?php

declare(strict_types=1);

namespace App\TeamTrackr\Shared\Domain\ValueObject;

use Ramsey\Uuid\Uuid as RamseyUuid;

abstract class UuidValueObject
{
    public function __construct(protected string $value)
    {
        $this->ensureIsValid($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function random(): self
    {
        return new static(RamseyUuid::uuid4()->toString());
    }

    private function ensureIsValid(string $value): void
    {
        if (!RamseyUuid::isValid($value)) {
            throw new \InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', self::class, $value));
        }
    }
}
