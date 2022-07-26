<?php

namespace CodeChallenge\ExerciseFour;

/**
 * calculate super number
 * calcualte all digit sum until returns a one digit number
 */
class SuperNumberCalculator
{
    /**
     * actual calculate function
     * @param int $number
     * 
     * @return int
     */
    public static function calculate(int $number): int
    {
        while (strlen($number) >= 2) {
            $number = array_sum(str_split($number));
        }
        return $number;
    }
}
