<?php
namespace CodeChallenge\ExerciseThree\Tests;

use CodeChallenge\ExerciseThree\MergeTwoString;

use PHPUnit\Framework\TestCase;

class MergeTwoStringTest extends TestCase
{
    public function dataProvider(): array
    {
        return [
            ["MICHAEL", "JORDAN", "MJIOCRHDAAENL"],
            ["SAM", "SMITH", "SSAMMITH"],
            ["CAT", "MAN", "CMAATN"],
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
        string $stringA,
        string $stringB,
        string $expectReturn
    ): void {
        $this->assertEquals(
            $expectReturn, 
            MergeTwoString::merge($stringA, $stringB)
        );
    }
}