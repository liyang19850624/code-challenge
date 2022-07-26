<?php

namespace CodeChallenge\ExerciseOne\Tests;

use CodeChallenge\ExerciseOne\{
    Client,
    ValidatorStack,
    Validators\ValidatorInterface
};
use CodeChallenge\Traits\CallPrivate;
use PHPUnit\Framework\TestCase;

class ValidatorStackTest extends TestCase
{
    use CallPrivate;

    public function dataProvider(): array
    {
        return [
            ["compareBothValid", true, true, true],
            //["compareFirstInvalid", false, true, false],
            //["compareSecondInvalid", true, false, false],
            //["compareAllInvalid", false, false, false],
        ];
    }

    /**
     * test if provided data is valid
     *
     * @param  mixed $value
     * @param  mixed $isValid
     * @return void
     */
    public function test_push(): void
    {
        $mockedValidatorOne = $this->createMock(ValidatorInterface::class);
        $mockedValidatorTwo = $this->createMock(ValidatorInterface::class);

        $validatorStack = new ValidatorStack();
        $validatorStack->push($mockedValidatorOne)
            ->push($mockedValidatorTwo);

        $validators = $this->getPrivateProperty($validatorStack, "validators");

        $this->assertCount(2, $validators);
        $this->assertEquals($mockedValidatorOne, $validators[0]);
        $this->assertEquals($mockedValidatorTwo, $validators[1]);
    }


    /**
     * test __invoke function
     * @param string $value
     * @param bool $isValidOne
     * @param bool $isValidTwo
     * @param bool $finalValid
     * 
     * @return void
     * 
     * @dataProvider dataProvider
     * @covers ValidatorStack::__invoke
     */
    public function test_validate(string $value, bool $isValidOne, bool $isValidTwo, bool $finalValid): void
    {
        $mockedValidatorOne = $this->createMock(ValidatorInterface::class);
        $mockedValidatorOne->method('__invoke')
            ->with($value)
            ->will($this->returnValue($isValidOne));

        $mockedValidatorTwo = $this->createMock(ValidatorInterface::class);
        $mockedValidatorTwo->method('__invoke')
            ->with($value)
            ->will($this->returnValue($isValidTwo));

        $validatorStack = new ValidatorStack();
        $validatorStack->push($mockedValidatorOne)
            ->push($mockedValidatorTwo);
        $this->assertEquals($finalValid, $validatorStack($value));
    }
}
