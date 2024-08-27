<?php
namespace GeekGroveOfficial\PhpSmartValidator\Rules;

class RuleFactory
{
    /**
     * @param string $rule
     * @return ValidationRuleInterface
     * @throws \Exception
     */
    public static function create(string $rule): ValidationRuleInterface
    {
        if (str_contains($rule, ':')) {
            [$ruleName, $parameter] = explode(':', $rule, 2);
        } else {
            $ruleName = $rule;
        }


        return match ($ruleName) {
            'required' => new RequiredRule(),
            'min' => new MinRule(min: $parameter),
            'max' => new MaxRule(max: $parameter),
            'string' => new StringRule(),
            'integer' => new IntegerRule(),
            'int' => new IntegerRule(),
            default => throw new \Exception("Validation rule '{$rule}' does not exist."),
        };
    }
}
