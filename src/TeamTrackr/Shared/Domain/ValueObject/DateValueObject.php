<?php

declare(strict_types=1);

namespace App\TeamTrackr\Shared\Domain\ValueObject;

abstract class DateValueObject implements \Stringable
{
    public function __construct(protected string $value)
    {
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(self $date): bool
    {
        return $this->value() === $date->value();
    }

    public function __toString(): string
    {
        return \Datetime::createFromFormat('Y-m-d', $this->value())->format('Y-m-d');
    }
}
