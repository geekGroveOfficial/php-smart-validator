<?php

namespace GeekGroveOfficial\PhpSmartValidator\Rules;

use DateTime;

class DateRule implements ValidationRuleInterface
{
    public function __construct(protected string $format = 'Y-m-d')
    { }

    public function validate(string $field, mixed $value, mixed $parameter = null): bool
    {
        if (! is_string($value)) {
            return false;
        }

        $date = DateTime::createFromFormat($this->format, $value);

        return $date && $date->format($this->format) === $value;
    }

    public function getErrorMessage(string $field, mixed $parameter = null): string
    {
        return "{$field} must be a valid date.";
    }
}
