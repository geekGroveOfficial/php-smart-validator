<?php

namespace GeekGroveOfficial\PhpSmartValidator\Rules;

class EmailRule implements ValidationRuleInterface
{
    public function validate(string $field, mixed $value, mixed $parameter = null): bool
    {
        if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    public function getErrorMessage(string $field, mixed $parameter = null): string
    {
        return "{$field} must be type email.";
    }
}
