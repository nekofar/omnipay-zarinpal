<?php

/**
 * @package Omnipay\ZarinPal
 *
 * @author Milad Nekofar <milad@nekofar.com>
 */

declare(strict_types=1);

namespace Omnipay\ZarinPal\Message;

use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Class PurchaseResponse
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    /**
     * The embodied request object.
     *
     * @var \Omnipay\ZarinPal\Message\PurchaseRequest
     */
    protected $request;

    /**
     * Sandbox Endpoint URL
     *
     * @var string URL
     */
    protected $testEndpoint = 'https://sandbox.zarinpal.com/pg/StartPay/';

    /**
     * Live Endpoint URL
     *
     * @var string URL
     */
    protected $liveEndpoint = 'https://www.zarinpal.com/pg/StartPay/';

    /**
     * Is the response successful?
     */
    public function isSuccessful(): bool
    {
        return false;
    }

    /**
     * Does the response require a redirect?
     */
    public function isRedirect(): bool
    {
        return isset($this->data['Authority']) && !in_array($this->data['Authority'], [null, ''], true);
    }

    /**
     * Gets the redirect target url.
     */
    public function getRedirectUrl(): string
    {
        return $this->getEndpoint() . $this->data['Authority'];
    }

    /**
     */
    protected function getEndpoint(): string
    {
        return $this->request->getTestMode()
            ? $this->testEndpoint
            : $this->liveEndpoint;
    }
}
