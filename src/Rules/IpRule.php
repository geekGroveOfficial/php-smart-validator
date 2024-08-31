<?php

namespace GeekGroveOfficial\PhpSmartValidator\Rules;

class IpRule implements ValidationRuleInterface
{
    public function validate(string $field, mixed $value, mixed $parameter = null): bool
    {
        return filter_var($value, FILTER_VALIDATE_IP);
    }

    public function getErrorMessage(string $field, mixed $parameter = null): string
    {
        return "{$field} must be a valid IP address.";
    }
}
