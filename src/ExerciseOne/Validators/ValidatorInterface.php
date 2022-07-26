<?php
namespace CodeChallenge\ExerciseOne\Validators;

/**
 * Interface for validators
 */
interface ValidatorInterface
{
    /**
     * validate passed value
     * @param mixed $value
     * 
     * @return bool
     */
    public function __invoke(mixed $value): bool;
}