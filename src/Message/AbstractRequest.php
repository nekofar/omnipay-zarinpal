<?php
/**
 * @package Omnipay\ZarinPal
 * @author Milad Nekofar <milad@nekofar.com>
 */

namespace Omnipay\ZarinPal\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\ResponseInterface;
use Omnipay\ZarinPal\RestGateway;

/**
 * Class AbsractRequest
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @throws InvalidRequestException
     */
    public function getData()
    {
        $this->validate([
            'merchantId',
            'returnUrl',
            'amount',
            'description'
        ]);
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
     * @return AbstractRequest
     */
    public function setMerchantId(string $value)
    {
        return $this->setParameter('merchantId', $value);
    }
}