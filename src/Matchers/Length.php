<?php

declare(strict_types=1);

namespace FastPass\Matchers;

use FastPass\Exceptions\InvalidLengthException;

final class Length
{
    private int $length;

    const INVALID_LENGTH_ERROR = 'The length value must be grather than 0';

    const MIN_LENGTH_SIZE  = 6;
    const MIN_LENGTH_ERROR = 'The length value must be grather than minimum value allowed';

    const MAX_LENGTH_SIZE  = 24;
    const MAX_LENGTH_ERROR = 'The length value must be less than maximum value allowed';

    public function __construct(int $length)
    {
        $this->length = intval($length);
    }

    public function getLength(): int
    {
        if ($this->length <= 0) {
            throw new InvalidLengthException(self::INVALID_LENGTH_ERROR);
        }

        if ($this->length < self::MIN_LENGTH_SIZE) {
            throw new InvalidLengthException(self::MIN_LENGTH_ERROR);
        }

        if ($this->length > self::MAX_LENGTH_SIZE) {
            throw new InvalidLengthException(self::MAX_LENGTH_ERROR);
        }

        return $this->length;
    }
}