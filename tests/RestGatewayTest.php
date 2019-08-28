<?php

namespace Omnipay\ZarinPal;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Tests\GatewayTestCase;

class RestGatewayTest extends GatewayTestCase
{
    protected $gateway;

    private $options;

    protected function setUp()
    {
        parent::setUp();

        $this->gateway = new RestGateway($this->getHttpClient(), $this->getHttpRequest());

        $this->gateway->setMerchantId('123');

        $this->options = [
            'amount' => 100,
            'returnUrl' => 'https://www.example.com/return',
            'description' => 'Marina Run 2016',
        ];
    }

    public function testPurchase()
    {
        $this->gateway->setTestMode(false);
        /** @var AbstractResponse $response */
        $response = $this->gateway->purchase($this->options)->send();
        $this->assertFalse($response->isSuccessful());
        $this->assertTrue($response->isRedirect());
        $this->assertEquals('https://www.zarinpal.com/pg/StartPay/', $response->getRedirectUrl());

        $this->gateway->setTestMode(true);
        /** @var AbstractResponse $response */
        $response = $this->gateway->purchase($this->options)->send();
        $this->assertEquals('https://sandbox.zarinpal.com/pg/StartPay/', $response->getRedirectUrl());
    }

    public function testCompletePurchase()
    {
        $this->getHttpRequest()->request->replace([
            'Authority' => '123',
            'Amount' => 100
        ]);
        $response = $this->gateway->completePurchase($this->options)->send();
        $this->assertTrue($response->isSuccessful());
        $this->assertSame('12345', $response->getTransactionReference());
    }
}
