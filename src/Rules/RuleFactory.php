<?php

namespace GeekGroveOfficial\PhpSmartValidator\Rules;

class RuleFactory
{
    /**
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
            'required' => new RequiredRule,
            'min' => new MinRule(min: $parameter),
            'max' => new MaxRule(max: $parameter),
            'string' => new StringRule,
            'integer' => new IntegerRule,
            'int' => new IntegerRule,
            'bool' => new BooleanRule,
            'boolean' => new BooleanRule,
            'email' => new EmailRule,
            'date' => new DateRule(format: $parameter),
            'array' => new ArrayRule,
            'in' => new InRule(values: explode(',', $parameter)),
            'url' => new UrlRule,
            'ip' => new IpRule,
            'json' =>  new JsonRule,
            'regex' => new RegexRule(pattern: $parameter),
            'uuid' => new UuidRule,
            'image' => new ImageRule(format: $parameter),
            'files' => new FileRule(format: $parameter),
            default => throw new \Exception("Validation rule '{$rule}' does not exist."),
        };
    }
}
