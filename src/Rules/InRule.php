<?php

namespace GeekGroveOfficial\PhpSmartValidator\Rules;

class InRule implements ValidationRuleInterface
{

    public function __construct(protected array $values) {}

    public function validate(string $field, mixed $value, mixed $parameter = null): bool
    {
        return in_array($value, $this->values);

    }

    public function getErrorMessage(string $field, mixed $parameter = null): string
    {
        return str_replace(':values', implode(', ', $this->values), "{$field} must be one of the following values: :values.");
    }
}
