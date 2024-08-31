<?php

namespace GeekGroveOfficial\PhpSmartValidator\Rules;

class FileRule implements ValidationRuleInterface
{
    protected array $formatSupport;

    public function __construct(protected string $format)
    {
        $this->formatSupport = explode(',', $this->format);
    }

    public function validate(string $field, mixed $value, mixed $parameter = null): bool
    {
        if (!is_file($value)) {
            return false;
        }

        $fileExtension = strtolower(pathinfo($value, PATHINFO_EXTENSION));

        return in_array($fileExtension, $this->formatSupport, true);
    }

    public function getErrorMessage(string $field, mixed $parameter = null): string
    {
        return "{$field} must be a valid file format.";
    }
}
