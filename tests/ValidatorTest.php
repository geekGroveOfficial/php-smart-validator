<?php

namespace Tests;

use GeekGroveOfficial\PhpSmartValidator\Validator\Validator;
use PHPUnit\Framework\TestCase;

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
            'name' => ['required'],
        ];

        $validator = $this->getValidator($data, $rules);

        $this->assertTrue($validator->validate());
        $this->assertEmpty($validator->errors());
    }

    public function testValidationPassesMinWithValidData()
    {
        $data = [
            'name' => 'John Doe',
        ];

        $rules = [
            'name' => ['min:3'],
        ];

        $validator = $this->getValidator($data, $rules);

        $this->assertTrue($validator->validate());
        $this->assertEmpty($validator->errors());
    }

    public function testValidationPassesMaxWithValidData()
    {
        $data = [
            'name' => 'J',
        ];

        $rules = [
            'name' => ['max:3'],
        ];

        $validator = $this->getValidator($data, $rules);

        $this->assertTrue($validator->validate());
        $this->assertEmpty($validator->errors());
    }

    public function testValidationPassesStringWithValidData()
    {
        $data = [
            'name' => 'Doe',
        ];

        $rules = [
            'name' => ['string'],
        ];

        $validator = $this->getValidator($data, $rules);

        $this->assertTrue($validator->validate());
        $this->assertEmpty($validator->errors());
    }

    public function testValidationPassesIntegerWithValidData()
    {
        $data = [
            'number' => 1,
        ];

        $rules = [
            'number' => ['integer'], // you can use int or integer
        ];

        $validator = $this->getValidator($data, $rules);

        $this->assertTrue($validator->validate());
        $this->assertEmpty($validator->errors());
    }
}
