<?php

namespace CodeChallenge\ExerciseOne\Tests;

use CodeChallenge\ExerciseOne\Validators\NoRepeatCharValidator;
use PHPUnit\Framework\TestCase;

class NoRepeatCharValidatorTest extends TestCase
{
    public function dataProvider(): array
    {
        return [
            ["documentarily", true],
            ["aftershock", true],
            ["countryside", true],
            ["six-year-old", true],
            ["Double-down", false],
            ["Euclidean", false],
            ["epidemic", false]
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
     * @covers NoRepeatCharValidator::__invoke
     */
    public function test_valid(string $value, bool $isValid): void
    {
        $validator = new NoRepeatCharValidator();
        $this->assertEquals($isValid, ($validator)($value));
    }
}
