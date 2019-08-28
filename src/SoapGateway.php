<?php
/**
 * @package Omnipay\ZarinPal
 * @author Milad Nekofar <milad@nekofar.com>
 */

namespace Omnipay\ZarinPal;


use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\ZarinPal\Message\RestPurchaseRequest;

/**
 * @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface completePurchase(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface void(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
 */
class SoapGateway extends AbstractGateway
{
    /**
     * Main gateway url
     *
     * @var string
     */
    const MAIN_URL = 'https://www.zarinpal.com/pg/services/WebGate/wsdl';

    /**
     * Test gateway url
     *
     * @var string
     */
    const TEST_URL = 'https://sandbox.zarinpal.com/pg/services/WebGate/wsdl';

    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     * @return string
     */
    public function getName()
    {
        return 'ZarinPal SOAP';
    }

    /**
     * Define gateway default parameters
     *
     * @return array
     */
    public function getDefaultParameters()
    {
        return [
            'testMode' => false,
            'endpoint' => self::TEST_URL,
            'MerchantID' => '',
            'CallbackURL' => '',
        ];
    }

    /**
     * @return string
     */
    public function getMerchantId()
    {
        return $this->getParameter('MerchantID');
    }
    /**
     * @param string $value
     * @return SoapGateway
     */
    public function setMerchantId(string $value)
    {
        return $this->setParameter('MerchantID', $value);
    }

    /**
     * Purchase request
     *
     * @param array $parameters
     * @return AbstractRequest
     */
    public function purchase(array $parameters = []): AbstractRequest
    {
        return $this->createRequest(SoapPurchaseRequest::class, $parameters);
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface completePurchase(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface void(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
    }
}
