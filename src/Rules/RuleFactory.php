<?php
namespace Soheil\PhpSmartValidator\Rules;

class RuleFactory
{
    public static function create(string $rule): ValidationRuleInterface
    {
        switch ($rule) {
            case 'required':
                return new RequiredRule();
            default:
                throw new \Exception("Validation rule '{$rule}' does not exist.");
        }
    }
}
