# PHP Smart Validator

`php-smart-validator` is a flexible and extensible PHP package for validating data. It provides a set of common validation rules and allows for custom rule definitions. This package is designed to be easy to use and integrate into any PHP project.

## Features

- Supports common validation rules like `required`
- Easy to extend with new validation rules
- PSR-4 autoloading for seamless integration

## Installation

You can install the package via Composer. Run the following command in your terminal:

```bash
composer require soheil/php-smart-validator
```

## Basic Usage

### Setting Up

First, create a validation instance by passing the data and rules:

```php
use Soheil\PhpSmartValidator\Validator\Validator;

$data = [
    'email' => 'example@example.com',
    'password' => 'secret'
];

$rules = [
    'email' => 'required|email',
    'password' => 'required|min:6'
];

$validator = new Validator($data, $rules);

if ($validator->validate()) {
    echo "Validation passed!";
} else {
    print_r($validator->errors());
}
```

### Adding Custom Rules

To add custom validation rules, implement the `ValidationRuleInterface`:

```php
namespace App\Rules;

use Soheil\PhpSmartValidator\Rules\ValidationRuleInterface;

class CustomRule implements ValidationRuleInterface
{
    public function validate(string $field, mixed $value, mixed $parameter = null): bool
    {
        // Custom validation logic
        return $value === 'expected_value';
    }

    public function getErrorMessage(string $field, mixed $parameter = null): string
    {
        return "{$field} does not meet custom rule requirements.";
    }
}
```

Register your custom rule with the `RuleFactory`:

```php
use Soheil\PhpSmartValidator\Rules\RuleFactory;
use Soheil\PhpSmartValidator\Messages\FileMessageLoader;

// Initialize the message loader
$messageLoader = new FileMessageLoader(__DIR__ . '/resources/lang/en/messages.php');

// Create the rule factory
$ruleFactory = new RuleFactory($messageLoader);

// Register your custom rule
$customRule = $ruleFactory->create('custom_rule');

// Use your custom rule in validation
$data = ['custom_field' => 'value'];
$rules = ['custom_field' => 'custom_rule'];

$validator = new Validator($data, $rules);
```

## Running Tests

To ensure everything is working correctly, you can run the tests using PHPUnit. First, install PHPUnit if you haven't already:

```bash
composer require --dev phpunit/phpunit
```

Then run the tests:

```bash
./vendor/bin/phpunit
```

## Contributing

Contributions are welcome! If you have suggestions, improvements, or bug fixes, please follow these steps:

1. Fork the repository.
2. Create a feature branch (`git checkout -b feature/your-feature`).
3. Commit your changes (`git commit -am 'Add new feature'`).
4. Push to the branch (`git push origin feature/your-feature`).
5. Open a pull request.

Please ensure that your code adheres to the existing style and includes appropriate tests.

## License

This package is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.