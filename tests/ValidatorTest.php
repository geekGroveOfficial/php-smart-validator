<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Soheil\PhpSmartValidator\Validator\Validator;

class ValidatorTest extends TestCase
{
    protected function getValidator(array $data, array $rules)
    {
        return new Validator($data, $rules);
    }

    public function testValidationPassesWithValidData()
    {
        $data = [
            'name' => 'John Doe',
        ];

        $rules = [
            'name' => ['required']
        ];

        $validator = $this->getValidator($data, $rules);

        $this->assertTrue($validator->validate());
        $this->assertEmpty($validator->errors());
    }
}
