<?php

namespace CodeChallenge\ExerciseThree;

/**
 * class to merge two string accordingly
 */
class MergeTwoString
{

    /**
     * merge two string
     * @param string $a
     * @param string $b
     * 
     * @return string
     */
    public static function merge(string $a, string $b): string
    {
        if (strlen($a) > strlen($b)) {
            $longerStr = $a;
            $shorterStr = $b;
        } else {
            $longerStr = $b;
            $shorterStr = $a;
        }
        $return = "";
        for ($i = 0; $i < strlen($shorterStr); $i++) {
            $return .= $a[$i] . $b[$i];
        }
        if (strlen($a) == strlen($b)) {
            return $return;
        }
        return $return . substr(
            $longerStr,
            strlen($shorterStr),
            strlen($longerStr) - strlen($shorterStr)
        );
    }
}
