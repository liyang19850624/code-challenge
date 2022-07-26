<?php

namespace CodeChallenge\ExerciseOne\Tests;

use CodeChallenge\ExerciseOne\{
    Client,
    ValidatorStack,
    Validators\NoRepeatCharValidator
};
use PHPUnit\Framework\TestCase;

class OverallTest extends TestCase
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
     */
    public function test_no_repeat_char_validator(
        string $value,
        bool $isValid
    ): void {
        $validatorStack = new ValidatorStack();
        $validatorStack->push(new NoRepeatCharValidator());

        $client = new Client($validatorStack);
        $this->assertEquals($isValid, ($client)->validate($value));
    }
}
