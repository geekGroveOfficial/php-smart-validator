<?php

namespace GeekGroveOfficial\PhpSmartValidator\Rules;

class RequiredRule implements ValidationRuleInterface
{
    public function validate(string $field, mixed $value, mixed $parameter = null): bool
    {
        return ! empty($value);
    }

    public function getErrorMessage(string $field, mixed $parameter = null): string
    {
        return "{$field} is required.";
    }
}
