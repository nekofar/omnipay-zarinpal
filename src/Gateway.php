<?php
/**
 * @package Omnipay\ZarinPal
 * @author Milad Nekofar <milad@nekofar.com>
 */

namespace Omnipay\ZarinPal;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\ZarinPal\Message\PurchaseRequest;

/**
 * Class Gateway
 */
class Gateway extends AbstractGateway
{
    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     * @return string
     */
    public function getName()
    {
        return 'ZarinPal';
    }

    /**
     * @return array
     */
    public function getDefaultParameters()
    {
        return [
            'testMode' => false,
            'merchantId',
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
     * @return Gateway
     */
    public function setMerchantId(string $value)
    {
        return $this->setParameter('merchantId', $value);
    }

    /**
     * @param array $parameters
     * @return AbstractRequest|RequestInterface
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }
}