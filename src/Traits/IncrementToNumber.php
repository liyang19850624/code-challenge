<?php
namespace CodeChallenge\Traits;

use Exception;

trait IncrementToNumber {
    public static function praseIncrementToNumber(string $increment): int
    {
        $increments = [
            'first' => 1,
            'second' => 2,
            'third' => 3,
            'fourth' => 4,
            'fifth' => 5
        ];
        if (!isset($increments[$increment])) {
            throw new Exception("Increment $increment not supported");
        }
        return $increments[$increment];
    }
}