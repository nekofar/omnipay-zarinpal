# Omnipay: ZarinPal

ZarinPal driver for the Omnipay PHP payment processing library

## Installation

Omnipay is installed via Composer. To install, simply require league/omnipay 
and nekofar/omnipay-zarinpal with Composer:

```
composer require league/omnipay nekofar/omnipay-zarinpal
```

## Basic Usage

Just want to see some code?

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