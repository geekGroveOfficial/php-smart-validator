<?php

namespace GeekGroveOfficial\PhpSmartValidator\Rules;

class MaxRule implements ValidationRuleInterface
{

    /**
     * @param int $max
     */
    public function __construct(protected int $max)
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

        return strlen($value) <= $this->max;
    }

    /**
     * @param string $field
     * @param mixed|null $parameter
     * @return string
     */
    public function getErrorMessage(string $field, mixed $parameter = null): string
    {
        return str_replace(':min', $this->max, "{$field} must not be more than :max characters long.");
    }
}
