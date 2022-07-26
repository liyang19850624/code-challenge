<?php

namespace CodeChallenge\ExerciseOne\Tests;

use CodeChallenge\ExerciseOne\{
    Client,
    ValidatorStack
};
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function dataProvider(): array
    {
        return [
            ["wordOne", true],
            ["wordTwo", false]
        ];
    }

    /**
     * test client validate function
     * @param string $value
     * @param bool $isValid
     * 
     * @return void
     * @dataProvider dataProvider
     * @covers Client::validate
     */
    public function test_valid(string $value, bool $isValid): void
    {
        $mockedValidatorStack = $this->createMock(ValidatorStack::class);
        $mockedValidatorStack->method('__invoke')
            ->with($value)
            ->will($this->returnValue($isValid));

        $client = new Client($mockedValidatorStack);
        $this->assertEquals($isValid, ($client)->validate($value));
    }
}
