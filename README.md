# Omnipay: ZarinPal

**ZarinPal driver for the Omnipay PHP payment processing library**

[![Build Status](https://travis-ci.org/nekofar/omnipay-zarinpal.png?branch=master)](https://travis-ci.org/nekofar/omnipay-zarinpal)
[![Latest Stable Version](https://poser.pugx.org/omnipay/zarinpal/version.png)](https://packagist.org/packages/omnipay/zarinpal)
[![Total Downloads](https://poser.pugx.org/omnipay/zarinpal/d/total.png)](https://packagist.org/packages/omnipay/zarinpal)

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