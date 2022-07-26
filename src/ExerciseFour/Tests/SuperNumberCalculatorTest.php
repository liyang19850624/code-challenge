<?php

namespace CodeChallenge\ExerciseFour\Tests;

use CodeChallenge\ExerciseFour\SuperNumberCalculator;

use PHPUnit\Framework\TestCase;

class SuperNumberCalculatorTest extends TestCase
{
    public function dataProvider(): array
    {
        return [
            [1234, 1],
            [5794, 7],
            [7777, 1]
        ];
    }

    /**
     * test if provided data is valid
     *
     * @param  mixed $value
     * @param  mixed $isValid
     * @return void
     * 
     * @dataProvider dataProvider
     */
    public function test_merge(
        int $number,
        int $result
    ): void {
        $this->assertEquals($result, SuperNumberCalculator::calculate($number));
    }
}
