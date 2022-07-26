<?php
namespace CodeChallenge\ExerciseOne;

use CodeChallenge\ExerciseOne\Validators\ValidatorInterface;

/**
 * stack of validators
 */
class ValidatorStack
{
    /**
     * actual validators
     * @var array
     */
    private array $validators = [];

    /**
     * push a validator interface into validator array
     * @param ValidatorInterface $validator
     * 
     * @return Self
     */
    public function push(ValidatorInterface $validator): Self
    {
        $this->validators[] = $validator;
        return $this;
    }

    /**
     * validate value using all validators, only pass when all validator passed
     * @param mixed $value
     * 
     * @return bool
     */
    public function __invoke(mixed $value): bool
    {
        foreach($this->validators as $validator) {
            if (!$validator($value)) {
                return false;
            }
        }
        return true;
    }
}