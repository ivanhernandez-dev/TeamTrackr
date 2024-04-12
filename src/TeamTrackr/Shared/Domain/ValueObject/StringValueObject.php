<?php

declare(strict_types=1);

namespace App\TeamTrackr\Shared\Domain\ValueObject;

abstract class StringValueObject
{
    public function __construct(protected string $value)
    {
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(StringValueObject $valueObject): bool
    {
        return $this->value() === $valueObject->value();
    }
}
