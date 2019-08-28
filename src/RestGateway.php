<?php
/**
 *
 */

namespace Omnipay\ZarinPal;


use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\ZarinPal\Message\RestPurchaseRequest;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Class RestGateway
 * @package Omnipay\ZarinPal
 * @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface void(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
 */
class RestGateway extends AbstractGateway
{
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
            'merchantId' => '',
        ];
    }

    /**
     * @return string
     */
    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    /**
     * @param string $value
     * @return RestGateway
     */
    public function setMerchantId(string $value)
    {
        return $this->setParameter('merchantId', $value);
    }

    /**
     * Purchase request
     *
     * @param array $parameters
     * @return RequestInterface
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest(RestPurchaseRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     * @return RequestInterface
     */
    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest(RestCompletePurchaseRequest::class, $parameters);
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface void(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
    }
}
