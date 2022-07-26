<?php

namespace CodeChallenge\ExerciseTwo\Tests;

use PHPUnit\Framework\TestCase;
use CodeChallenge\ExerciseTwo\WeekdayParser;
use Exception;

class WeekdayParserTest extends TestCase
{
    /**
     * data provider for valid date string
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            ["first Monday of October 2019", "2019-10-07"],
            ["The first Monday of October 2019", "2019-10-07"],
            ["The third Tuesday of October 2019", "2019-10-15"],
            ["The last Wednesday of October 2019", "2019-10-30"]
        ];
    }

    /**
     * date provider for invalid date string
     * @return array
     */
    public function dataProviderInvalid(): array
    {
        return [
            ["first Monday October 2019", "Invalid date string format. Expect 'of'."],
            ["first Monday of 10 2019", "Invalid Month Year."],
            ["first Monday of October Septmber", "Invalid Month Year."]
        ];
    }


    /**
     * test when provided data is valid
     *
     * @param  mixed $value
     * @param  mixed $isValid
     * @return void
     * 
     * @dataProvider dataProvider
     */
    public function test_valid(string $inputValue, string $expectOutput): void
    {
        $this->assertEquals(
            $expectOutput,
            WeekdayParser::parse($inputValue)
        );
    }

    /**
     * test when provided data is invalid
     * @param string $inputValue
     * @param string $expectErrorMessage
     * 
     * @return void
     * @dataProvider dataProviderInvalid
     */
    public function test_invalid(string $inputValue, string $expectErrorMessage): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage($expectErrorMessage);

        WeekdayParser::parse($inputValue);
    }
}
