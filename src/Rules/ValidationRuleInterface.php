<?php
namespace GeekGroveOfficial\PhpSmartValidator\Rules;

interface ValidationRuleInterface
{
    /**
     * @param string $field
     * @param mixed $value
     * @param mixed|null $parameter
     * @return bool
     */
    public function validate(string $field, mixed $value, mixed $parameter = null): bool;

    /**
     * @param string $field
     * @param mixed|null $parameter
     * @return string
     */
    public function getErrorMessage(string $field, mixed $parameter = null): string;
}
