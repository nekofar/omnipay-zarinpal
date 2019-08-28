<?php
/**
 * @package Omnipay\ZarinPal
 * @author Milad Nekofar <milad@nekofar.com>
 */

namespace Omnipay\ZarinPal\Message;


use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

/**
 * Class RestPurchaseResponse
 */
class RestPurchaseResponse extends AbstractResponse
{
    /**
     * The embodied request object.
     *
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var string
     */
    protected $liveEndpoint = 'https://www.zarinpal.com/pg/StartPay/';

    /**
     * @var string
     */
    protected $testEndpoint = 'https://sandbox.zarinpal.com/pg/StartPay/';

    /**
     * RestPurchaseResponse constructor.
     * @param RestPurchaseRequest $param
     * @param mixed               $data
     */
    public function __construct(RestPurchaseRequest $param, $data)
    {
        parent::__construct($param, $data);
    }

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
        return $this->request->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }


}
