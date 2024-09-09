<?php

namespace GeekGroveOfficial\PhpSmartValidator\Rules;

class MaxRule implements ValidationRuleInterface
{
    public function __construct(protected int $max) {}

    public function validate(string $field, mixed $value, mixed $parameter = null): bool
    {
        if (! is_string($value)) {
            return false;
        }

        return strlen($value) <= $this->max;
    }

    public function getErrorMessage(string $field, mixed $parameter = null): string
    {
        return str_replace(':max', $this->max, "{$field} must not be more than :max characters long.");
    }
}
