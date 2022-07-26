<?php
namespace CodeChallenge\ExerciseOne\Validators;

/**
 * Validator to validate a string does not have any repeated character
 */
class NoRepeatCharValidator implements ValidatorInterface
{
    public function __invoke(mixed $value): bool
    {
        if (!is_string($value)) {
            throw new \Exception("Invalid format value. Expect to be string.");
        }
        $existingLetters = [];
        foreach(str_split($value) as $char) {
            if (ctype_alpha($char)) {
                $charToLower = strtolower($char);
                if (in_array($charToLower, $existingLetters)) {
                    return false;
                }
                $existingLetters[] = $charToLower;
            }
        }
        return true;
    }
}