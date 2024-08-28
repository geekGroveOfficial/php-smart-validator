<?php

namespace GeekGroveOfficial\PhpSmartValidator\Rules;

class StringRule implements ValidationRuleInterface
{
    public function validate(string $field, mixed $value, mixed $parameter = null): bool
    {
        if (! is_string($value)) {
            return false;
        }

        return true;
    }

    public function getErrorMessage(string $field, mixed $parameter = null): string
    {
        return str_replace(':min', $parameter, "{$field} must be type string.");
    }
}
