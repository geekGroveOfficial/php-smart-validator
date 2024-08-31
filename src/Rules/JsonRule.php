<?php

namespace GeekGroveOfficial\PhpSmartValidator\Rules;

class JsonRule implements ValidationRuleInterface
{
    public function validate(string $field, mixed $value, mixed $parameter = null): bool
    {
        return is_string($value) && is_array(json_decode($value, true)) && (json_last_error() == JSON_ERROR_NONE);
    }

    public function getErrorMessage(string $field, mixed $parameter = null): string
    {
        return "{$field} must be a valid JSON string.";
    }
}
