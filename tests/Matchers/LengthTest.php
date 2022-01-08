<?php

declare(strict_types=1);

namespace FastPass\Test\Matchers;

use FastPass\Exceptions\InvalidLengthException;
use FastPass\Matchers\Length;
use PHPUnit\Framework\TestCase;

final class LengthTest extends TestCase
{
    public function testShouldReturnAnExceptionWithLengthAsZeroValue(): void
    {
        $this->expectException(InvalidLengthException::class);
        $this->expectExceptionMessage(Length::INVALID_LENGTH_ERROR);

        $lengthMatcher = new Length(0);
        $lengthMatcher->getLength();
    }

    public function testShouldReturnAnExceptionWithLengthAsNegativeValue(): void
    {
        $this->expectException(InvalidLengthException::class);
        $this->expectExceptionMessage(Length::INVALID_LENGTH_ERROR);

        $lengthMatcher = new Length(-1);
        $lengthMatcher->getLength();
    }

    public function testShouldReturnAnExceptionWithLengthLessThanAllowed(): void
    {
        $this->expectException(InvalidLengthException::class);
        $this->expectExceptionMessage(Length::MIN_LENGTH_ERROR);

        $lengthMatcher = new Length(5);
        $lengthMatcher->getLength();
    }

    public function testShouldReturnAnExceptionWithLengthGratherThanAllowed(): void
    {
        $this->expectException(InvalidLengthException::class);
        $this->expectExceptionMessage(Length::MAX_LENGTH_ERROR);

        $lengthMatcher = new Length(35);
        $lengthMatcher->getLength();
    }

    public function testShouldReturnTheLengthValueWithValidData(): void
    {
        $lengthMatcher = new Length(12);
        $length = $lengthMatcher->getLength();

        $this->assertEquals(12, $length);
    }
}