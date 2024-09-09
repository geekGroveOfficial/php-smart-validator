<?php

namespace GeekGroveOfficial\PhpSmartValidator\Rules;

class IntegerRule implements ValidationRuleInterface
{
    public function validate(string $field, mixed $value, mixed $parameter = null): bool
    {
        if (! is_int($value)) {
            return false;
        }

        return true;
    }

    public function getErrorMessage(string $field, mixed $parameter = null): string
    {
        return "{$field} must be type integer.";
    }
}
