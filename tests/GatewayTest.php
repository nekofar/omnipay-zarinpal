<?php

namespace Omnipay\ZarinPal\Tests;

use Omnipay\Tests\GatewayTestCase;
use Omnipay\ZarinPal\Gateway;
use Omnipay\ZarinPal\Message\AbstractResponse;

/**
 * Class GatewayTest
 * @package Omnipay\ZarinPal\Tests
 */
class GatewayTest extends GatewayTestCase
{
    /**
     * @var Gateway
     */
    protected $gateway;

    /**
     * @var array
     */
    protected $options;

    /**
     *
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());

        $this->gateway->setMerchantId('xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx');
        $this->gateway->setReturnUrl('https://www.example.com/return');

        $this->options = [
            'amount' => 100,
            'description' => 'Example',
            'mobile' => '09123456789',
            'email' => 'info@example.com',
        ];
    }

    /**
     *
     */
    public function testPurchaseSuccess(): void
    {
        $this->setMockHttpResponse('PurchaseSuccess.txt');

        /** @var AbstractResponse $response */
        $response = $this->gateway->purchase($this->options)->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertTrue($response->isRedirect());
        $this->assertEquals('https://www.zarinpal.com/pg/StartPay/000000000000000000000000000000034225', $response->getRedirectUrl());
    }

    /**
     *
     */
    public function testPurchaseFailure(): void
    {
        $this->setMockHttpResponse('PurchaseFailure.txt');

        /** @var AbstractResponse $response */
        $response = $this->gateway->purchase($this->options)->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('Amount should be above 100 Toman.', $response->getMessage());
    }

    /**
     *
     */
    public function testCompletePurchaseSuccess(): void
    {
        $this->setMockHttpResponse('PurchaseCompleteSuccess.txt');

        $this->getHttpRequest()->request->replace([
            'amount' => '100',
            'authority' => '000000000000000000000000000000034225',
        ]);

        $response = $this->gateway->completePurchase([
            'amount' => '100',
            'authority' => '000000000000000000000000000000034225',
        ])->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertSame('0000001', $response->getTransactionReference());
    }

    /**
     *
     */
    public function testCompletePurchaseFailure(): void
    {
        $this->setMockHttpResponse('PurchaseCompleteFailure.txt');

        $this->getHttpRequest()->request->replace([
            'amount' => '100',
            'authority' => '000000000000000000000000000000034225',
        ]);

        $response = $this->gateway->completePurchase([
            'amount' => '100',
            'authority' => '000000000000000000000000000000034225',
        ])->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertSame('Merchant ID or Acceptor IP is not correct.', $response->getMessage());
    }
}
