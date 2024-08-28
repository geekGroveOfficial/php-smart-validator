<?php

namespace GeekGroveOfficial\PhpSmartValidator\Validator;

use GeekGroveOfficial\PhpSmartValidator\Rules\RuleFactory;

class Validator
{
    protected array $errors = [];

    protected array $data;

    protected array $rules;

    public function __construct(array $data, array $rules)
    {
        $this->data = $data;
        $this->rules = $rules;
    }

    public function validate(): bool
    {
        foreach ($this->rules as $field => $rules) {
            foreach ($rules as $rule) {
                $ruleObject = RuleFactory::create($rule);
                $value = $this->data[$field] ?? null;

                if (! $ruleObject->validate($field, $value)) {
                    $this->addError($field, $ruleObject->getErrorMessage($field));
                }
            }
        }

        return empty($this->errors);
    }

    protected function addError(string $field, string $message): void
    {
        $this->errors[$field][] = $message;
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
