<?php
/**
 *
 */

namespace Omnipay\ZarinPal;


use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\ZarinPal\Message\RestPurchaseRequest;
use phpDocumentor\Reflection\Types\Boolean;

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
class RestGateway extends AbstractGateway
{
    /**
     * Main gateway url
     *
     * @var string
     */
    const MAIN_URL = 'https://www.zarinpal.com/pg/rest/WebGate/PaymentRequest.json';

    /**
     * Test gateway url
     *
     * @var string
     */
    const TEST_URL = 'https://sandbox.zarinpal.com/pg/rest/WebGate/PaymentRequest.json';

    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     * @return string
     */
    public function getName()
    {
        return 'ZarinPal REST';
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
     * @return RestGateway
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
        return $this->createRequest(RestPurchaseRequest::class, $parameters);
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface purchase(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface completePurchase(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface void(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
    }
}
