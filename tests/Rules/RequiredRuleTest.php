<?php

namespace Tests\Rules;

use GeekGroveOfficial\PhpSmartValidator\Rules\RequiredRule;
use PHPUnit\Framework\TestCase;

class RequiredRuleTest extends TestCase
{
    public function testValidateReturnsTrueWhenFieldIsPresent()
    {
        $rule = new RequiredRule;
        $this->assertTrue($rule->validate('name', 'John Doe'));
    }

    public function testValidateReturnsFalseWhenFieldIsEmpty()
    {
        $rule = new RequiredRule;
        $this->assertFalse($rule->validate('name', ''));
    }

    public function testGetErrorMessageReturnsCorrectMessage()
    {
        $rule = new RequiredRule;
        $this->assertEquals('name is required.', $rule->getErrorMessage('name'));
    }
}
