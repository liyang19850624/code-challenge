<?php
namespace CodeChallenge\ExerciseOne;

/**
 * Main program to run validate process.
 */
class Client
{
    /**
     * stack of validators
     * @var ValidatorStack
     */
    private ValidatorStack $validatorStack;

    public function __construct(ValidatorStack $validatorStack)
    {
        $this->validatorStack = $validatorStack;
    }

    /**
     * validate value using stack of validators
     * @param mixed $value
     * 
     * @return bool
     */
    public function validate(mixed $value): bool
    {
        return ($this->validatorStack)($value);
    }
}