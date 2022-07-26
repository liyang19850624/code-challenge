<?php

namespace CodeChallenge\ExerciseTwo;

use Exception;
use DateTime;
use CodeChallenge\Traits\IncrementToNumber;

/**
 * parse string into date string
 */
class WeekdayParser
{
    use IncrementToNumber;

    /**
     * parse the input string into date string YYYY-MM-DD
     * @param string $dateString
     * 
     * @return string
     */
    public static function parse(string $dateString): string
    {
        $dateString = strtolower($dateString);
        $splitorPos = stripos($dateString, "of");
        if ($splitorPos === false) {
            throw new Exception("Invalid date string format. Expect 'of'.");
        }
        $dt = DateTime::createFromFormat("F Y d", substr($dateString, $splitorPos + 3) . " 01");
        if (!$dt) {
            throw new Exception("Invalid Month Year.");
        }
        $dayDescriptionArray =
            explode(
                " ",
                trim(
                    ltrim(
                        substr($dateString, 0, $splitorPos),
                        "the"
                    )
                )
            );
        if ($dayDescriptionArray[0] == "last") {
            $dt->modify("last day of this month");
            $weekth = -1;
        } else {
            $weekth = static::praseIncrementToNumber($dayDescriptionArray[0]) - 1;
        }
        $dt->modify("this " . $dayDescriptionArray[1])
            ->modify($weekth . " week");
        return $dt->format("Y-m-d");
    }
}
