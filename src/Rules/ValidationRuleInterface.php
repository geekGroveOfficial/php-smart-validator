<?php

namespace GeekGroveOfficial\PhpSmartValidator\Rules;

interface ValidationRuleInterface
{
    public function validate(string $field, mixed $value, mixed $parameter = null): bool;

    public function getErrorMessage(string $field, mixed $parameter = null): string;
}
