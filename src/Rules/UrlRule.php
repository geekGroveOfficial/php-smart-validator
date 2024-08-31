<?php

namespace GeekGroveOfficial\PhpSmartValidator\Rules;

class UrlRule implements ValidationRuleInterface
{
    public function validate(string $field, mixed $value, mixed $parameter = null): bool
    {
        return filter_var($value, FILTER_VALIDATE_URL);
    }

    public function getErrorMessage(string $field, mixed $parameter = null): string
    {
        return "{$field} must be a valid URL.";
    }
}
