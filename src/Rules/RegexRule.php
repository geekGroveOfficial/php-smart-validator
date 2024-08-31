<?php

namespace GeekGroveOfficial\PhpSmartValidator\Rules;

class RegexRule implements ValidationRuleInterface
{

    public function __construct(protected string $pattern) {}

    public function validate(string $field, mixed $value, mixed $parameter = null): bool
    {
        return preg_match($this->pattern, $value);
    }

    public function getErrorMessage(string $field, mixed $parameter = null): string
    {
        return "{$field} must match the pattern: {$this->pattern}.";
    }
}
