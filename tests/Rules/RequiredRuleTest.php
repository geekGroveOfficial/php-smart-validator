<?php

namespace Tests\Rules;

use PHPUnit\Framework\TestCase;
use Soheil\PhpSmartValidator\Rules\RequiredRule;

class RequiredRuleTest extends TestCase
{
    public function testValidateReturnsTrueWhenFieldIsPresent()
    {
        $rule = new RequiredRule();
        $this->assertTrue($rule->validate('name', 'John Doe'));
    }

    public function testValidateReturnsFalseWhenFieldIsEmpty()
    {
        $rule = new RequiredRule();
        $this->assertFalse($rule->validate('name', ''));
    }

    public function testGetErrorMessageReturnsCorrectMessage()
    {
        $rule = new RequiredRule();
        $this->assertEquals('name is required.', $rule->getErrorMessage('name'));
    }
}
