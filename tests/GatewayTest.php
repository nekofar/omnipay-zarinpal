<?php

namespace Omnipay\ZarinPal;

use Omnipay\Tests\GatewayTestCase;
use Omnipay\ZarinPal\Message\PurchaseCompleteResponse;
use Omnipay\ZarinPal\Message\PurchaseResponse;

class GatewayTest extends GatewayTestCase
{
    protected $gateway;

    private $options;

    protected function setUp()
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());

        $this->gateway->setMerchantId('123');
        $this->gateway->setReturnUrl('https://www.example.com/return');

        $this->options = [
            'amount' => 100,
            'description' => 'Marina Run 2016',
        ];
    }

    public function testPurchase()
    {
        $this->gateway->setTestMode(false);
        /** @var PurchaseResponse $response */
        $response = $this->gateway->purchase($this->options)->send();
        $this->assertFalse($response->isSuccessful());
        $this->assertTrue($response->isRedirect());
        $this->assertEquals('https://www.zarinpal.com/pg/StartPay/', $response->getRedirectUrl());

        $this->gateway->setTestMode(true);
        /** @var PurchaseResponse $response */
        $response = $this->gateway->purchase($this->options)->send();
        $this->assertEquals('https://sandbox.zarinpal.com/pg/StartPay/', $response->getRedirectUrl());
    }

    public function testCompletePurchase()
    {
        $this->getHttpRequest()->request->replace([
            'amount' => '100',
            'authority' => '123',
        ]);

        /** @var PurchaseCompleteResponse $response */
        $response = $this->gateway->completePurchase($this->options)->send();
        $this->assertTrue($response->isSuccessful());
        $this->assertSame('12345', $response->getTransactionReference());
    }
}
