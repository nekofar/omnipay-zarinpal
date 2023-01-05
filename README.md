# Omnipay: ZarinPal

**ZarinPal driver for the Omnipay PHP payment processing library**

[![Packagist Version][icon-packagist]][link-packagist]
[![PHP from Packagist][icon-php-version]][link-packagist]
[![Packagist Downloads][icon-downloads]][link-packagist]
[![Tests Status][icon-workflow]][link-workflow]
[![Coverage Status][icon-coverage]][link-coverage]
[![License][icon-license]][link-license]
[![Twitter: nekofar][icon-twitter]][link-twitter]

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP. This package implements ZarinPal support for Omnipay.

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply require 
`league/omnipay` and `nekofar/omnipay-zarinpal` with Composer:

```
composer require league/omnipay nekofar/omnipay-zarinpal
```

## Basic Usage

The following gateways are provided by this package:

* ZarinPal

For general usage instructions, please see the main [Omnipay](https://github.com/omnipay/omnipay)
repository.

## Example

### Purchase

The result will be a redirect to the gateway or bank.

```php
use Omnipay\Omnipay;

$gateway = Omnipay::create('ZarinPal');
$gateway->setMerchantId('xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
$gateway->setReturnUrl('https://www.example.com/return');

// Send purchase request
$response = $gateway->purchase([
    'amount' => 100,
    'description' => 'Some description'
])->send();

// Process response
if ($response->isRedirect()) {
    // Redirect to offsite payment gateway
    $response->redirect();
} else {
    // Payment failed: display message to customer
    echo $response->getMessage();
}
```

On return, the usual completePurchase will provide the result of the transaction attempt.

The final result includes the following methods to inspect additional details:

```php
// Send purchase complete request
$response = $gateway->completePurchase([
    'amount' => 100,
    'authority' => $_REQUEST['Authority'], 
)->send();

// Process response
if ($response->isSuccessful()) {
    // Payment was successful
    print_r($response);
} else {
    // Payment failed: display message to customer
    echo $response->getMessage();
}
```

### Testing

```sh
composer test
```

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release anouncements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/nekofar/omnipay-zarinpal/issues),
or better yet, fork the library and submit a pull request.

[1]: https://packagist.org/packages/nekofar/omnipay-zarinpal
[2]: https://github.com/nekofar/omnipay-zarinpal/blob/master/LICENSE
[3]: https://travis-ci.com/nekofar/omnipay-zarinpal
[4]: https://codecov.io/gh/nekofar/omnipay-zarinpal
[5]: https://packagist.org/providers/php-http/client-implementation
[6]: https://zarinpal.com
[7]: https://twitter.com/nekofar

[icon-packagist]: https://img.shields.io/packagist/v/nekofar/omnipay-zarinpal.svg
[icon-php-version]: https://img.shields.io/packagist/php-v/nekofar/omnipay-zarinpal.svg
[icon-workflow]: https://img.shields.io/github/actions/workflow/status/nekofar/omnipay-zarinpal/tests.yml
[icon-coverage]: https://codecov.io/gh/nekofar/omnipay-zarinpal/graph/badge.svg
[icon-downloads]: https://img.shields.io/packagist/dt/nekofar/omnipay-zarinpal
[icon-license]: https://img.shields.io/github/license/nekofar/omnipay-zarinpal.svg
[icon-twitter]: https://img.shields.io/twitter/follow/nekofar.svg?style=flat

[link-packagist]: https://packagist.org/packages/nekofar/omnipay-zarinpal
[link-twitter]: https://twitter.com/nekofar
[link-coverage]: https://codecov.io/gh/nekofar/omnipay-zarinpal
[link-workflow]: https://github.com/nekofar/omnipay-zarinpal/actions/workflows/tests.yml
[link-coverage]: https://codecov.io/gh/nekofar/omnipay-zarinpal
[link-license]: https://github.com/nekofar/omnipay-zarinpal/blob/master/LICENSE.md
