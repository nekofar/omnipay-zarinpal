<?php
/**
 * @package Omnipay\ZarinPal
 * @author Milad Nekofar <milad@nekofar.com>
 */

namespace Omnipay\ZarinPal\Message;

use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Class PurchaseResponse
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
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
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return false;
    }

    /**
     * Response code
     *
     * @return null|string A response code from the payment gateway
     */
    public function getCode()
    {
        return $this->data['Status'];
    }

    /**
     * Does the response require a redirect?
     *
     * @return boolean
     */
    public function isRedirect()
    {
        return true;
    }

    /**
     * Gets the redirect target url.
     *
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->getEndpoint() . $this->data['Authority'];
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return $this->request->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }
}
