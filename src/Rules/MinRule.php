<?php

namespace GeekGroveOfficial\PhpSmartValidator\Rules;

class MinRule implements ValidationRuleInterface
{

    /**
     * @param int $min
     */
    public function __construct(protected int $min)
    {}


    /**
     * @param string $field
     * @param mixed $value
     * @param mixed|null $parameter
     * @return bool
     */
    public function validate(string $field, mixed $value, mixed $parameter = null): bool
    {
        if (!is_string($value)) {
            return false;
        }

        return strlen($value) >= $this->min;
    }

    /**
     * @param string $field
     * @param mixed|null $parameter
     * @return string
     */
    public function getErrorMessage(string $field, mixed $parameter = null): string
    {
        return str_replace(':min', $this->min, "{$field} must be at least :min characters long.");
    }
}
