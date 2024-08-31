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

    public function testValidationPassesBooleanWithValidData()
    {
        $data = [
            'is_active' => true,
        ];

        $rules = [
            'is_active' => ['boolean'], // you can use bool or boolean
        ];

        $validator = $this->getValidator($data, $rules);

        $this->assertTrue($validator->validate());
        $this->assertEmpty($validator->errors());
    }

    public function testValidationPassesEmailWithValidData()
    {
        $data = [
            'email' => 'test@gmail.com'
        ];

        $rules = [
            'email' => ['email'],
        ];

        $validator = $this->getValidator($data, $rules);

        $this->assertTrue($validator->validate());
        $this->assertEmpty($validator->errors());
    }

    public function testValidationPassesDateWithValidData()
    {
        $data = [
            'date' => '2021-01-01'
        ];

        $rules = [
            'date' => ['date:Y-m-d'],
        ];

        $validator = $this->getValidator($data, $rules);

        $this->assertTrue($validator->validate());
        $this->assertEmpty($validator->errors());
    }

    public function testValidationPassesArrayWithValidData()
    {
        $data = [
            'items' => [1, 2, 3]
        ];

        $rules = [
            'items' => ['array'],
        ];

        $validator = $this->getValidator($data, $rules);

        $this->assertTrue($validator->validate());
        $this->assertEmpty($validator->errors());
    }


    public function testValidationPassesInWithValidData()
    {
        $data = [
            'status' => 'active'
        ];

        $rules = [
            'status' => ['in:active,inactive'],
        ];

        $validator = $this->getValidator($data, $rules);

        $this->assertTrue($validator->validate());
        $this->assertEmpty($validator->errors());
    }

    public function testValidationPassesUrlWithValidData()
    {
        $data = [
            'url' => 'https://www.google.com'
        ];

        $rules = [
            'url' => ['url'],
        ];

        $validator = $this->getValidator($data, $rules);

        $this->assertTrue($validator->validate());
        $this->assertEmpty($validator->errors());
    }

    public function testValidationPassesIpWithValidData()
    {
        $data = [
            'ip' => '127.0.0.1'
        ];

        $rules = [
            'ip' => ['ip'],
        ];

        $validator = $this->getValidator($data, $rules);

        $this->assertTrue($validator->validate());
        $this->assertEmpty($validator->errors());
    }

    public function testValidationPassesJsonWithValidData()
    {
        $data = [
            'json' => '{"name": "John Doe"}'
        ];

        $rules = [
            'json' => ['json'],
        ];

        $validator = $this->getValidator($data, $rules);

        $this->assertTrue($validator->validate());
        $this->assertEmpty($validator->errors());
    }

    public function testValidationPassesRegexWithValidData()
    {
        $data = [
            'name' => 'John Doe'
        ];

        $rules = [
            'name' => ['regex:/^John/'],
        ];

        $validator = $this->getValidator($data, $rules);

        $this->assertTrue($validator->validate());
        $this->assertEmpty($validator->errors());
    }

    public function testValidationPassesUuidWithValidData()
    {
        $data = [
            'uuid' => '550e8400-e29b-41d4-a716-446655440000'
        ];

        $rules = [
            'uuid' => ['uuid'],
        ];

        $validator = $this->getValidator($data, $rules);

        $this->assertTrue($validator->validate());
        $this->assertEmpty($validator->errors());
    }

    public function testValidationPassesImageWithValidData()
    {
        $imagePath = __DIR__ . '/images/images.png';
        $this->assertFileExists($imagePath, 'The image file does not exist for testing.');

        $data = [
            'image' => $imagePath
        ];

        $rules = [
            'image' => ['image:jpg,png']
        ];

        $validator = $this->getValidator($data, $rules);

        $this->assertTrue($validator->validate());

        $this->assertEmpty($validator->errors());
    }

    public function testValidationPassesFilesWithValidData()
    {
        $imagePath = __DIR__ . '/images/images.png';
        $this->assertFileExists($imagePath, 'The image file does not exist for testing.');

        $data = [
            'image' => $imagePath
        ];

        $rules = [
            'image' => ['files:png,jpg']
        ];

        $validator = $this->getValidator($data, $rules);

        $this->assertTrue($validator->validate());

        $this->assertEmpty($validator->errors());
    }
}
