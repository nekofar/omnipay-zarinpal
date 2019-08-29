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

$gateway = Omnipay::create('ZarinPal REST');
$gateway->setMerchantId('xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
$gateway->setReturnUrl('https://www.example.com/return');

$response = $gateway->purchase([
    'amount' => 100,
    'description' => 'Somthing'
])->send();

if ($response->isRedirect()) {
    // redirect to offsite payment gateway
    $response->redirect();
} else {
    // payment failed: display message to customer
    echo $response->getMessage();
}
```

```php
$response = $gateway->completePurchase([
    'Authority' => '123', 
    'Amount' => 100
)->send();
```