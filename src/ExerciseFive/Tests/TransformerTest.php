<?php

namespace CodeChallenge\ExerciseFive\Tests;

use CodeChallenge\ExerciseFive\Transformer;

use PHPUnit\Framework\TestCase;

class TransformerTest extends TestCase
{
    public function dataProvider(): array
    {
        return [
            [
                file_get_contents(__DIR__ . "/resources/sample-1.xml"),
                [
                    "A0001" => "commercial",
                    "A0002" => "commercial",
                    "A0003" => "commercial",
                    "A0004" => "rental",
                ]
            ],
            [
                file_get_contents(__DIR__ . "/resources/sample-2.xml"),
                [
                    "B0001" => "commercial",
                    "B0002" => "holidayRental"
                ]
            ],
            [
                file_get_contents(__DIR__ . "/resources/sample-3.xml"),
                [
                    "C0001" => "rural",
                    "C0002" => "business",
                    "C0003" => "business",
                    "C0004" => "business",
                    "C0005" => "holidayRental",
                    "C0006" => "residential",
                ]
            ],
            [
                file_get_contents(__DIR__ . "/resources/sample-without-unique-id.xml"),
                [
                ]
            ],
            [
                file_get_contents(__DIR__ . "/resources/sample-blank.xml"),
                [
                ]
            ],
            [
                "",
                [
                ]
            ]
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
        string $xml,
        array $result
    ): void {
        $this->assertEquals($result, Transformer::transform($xml));
    }
}
