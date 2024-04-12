<?php

declare(strict_types=1);

namespace App\TeamTrackr\Shared\Domain\ValueObject;

use Ramsey\Uuid\Uuid as RamseyUuid;

abstract class UuidValueObject implements \Stringable
{
    final public function __construct(protected string $value)
    {
        $this->ensureIsValid($value);
    }

    final public static function random(): self
    {
        return new static(RamseyUuid::uuid4()->toString());
    }

    final public function value(): string
    {
        return $this->value;
    }

    final public function equals(self $other): bool
    {
        return $this->value() === $other->value();
    }

    public function __toString(): string
    {
        return $this->value();
    }

    private function ensureIsValid(string $id): void
    {
        if (!RamseyUuid::isValid($id)) {
            throw new \InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', self::class, $id));
        }
    }
}
