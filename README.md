# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ashraam/license-generator.svg?style=flat-square)](https://packagist.org/packages/ashraam/license-generator)
[![Total Downloads](https://img.shields.io/packagist/dt/ashraam/license-generator.svg?style=flat-square)](https://packagist.org/packages/ashraam/license-generator)

This package allows you to create random license numbers style code. You can customize the template and add a prefix or suffix.

## Installation

You can install the package via composer:

```bash
composer require ashraam/license-generator
```

## Usage

```php
$generator = new \Ashraam\LicenseGenerator\LicenseGenerator();

$generator
    ->prefix('MY-')
    ->template('XXXX-9999-X9X9')
    ->generateOne(); // MY-DESQ-4857-X6P8
    
$generator
    ->suffix('-END')
    ->template('XXXX-9999-X9X9')
    ->generateOne(); // FDIS-4572-D6D3-END

$generator
    ->lowerCase()
    ->template('XXXX-9999-X9X9')
    ->generateOne(); // qspr-5423-f5k9

$generator
    ->template('XXXX-9999')
    ->generateMany(3); // ['GDTS-4585', 'YTRH-5558', 'POGQ-4454']
```

You can use one of the three methods to generate codes:
- generateOne(): will return a string
- generateMany(X): will return an array
- generate(X): will return a string if X equals 1 or an array

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email romain.bertolucci@gmail.com instead of using the issue tracker.

## Credits

-   [Romain BERTOLUCCI](https://github.com/ashraam)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com) by [Beyond Code](http://beyondco.de/).
