<?php
/**
 * @package Omnipay\ZarinPal
 * @author Milad Nekofar <milad@nekofar.com>
 */

namespace Omnipay\ZarinPal\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\ResponseInterface;

/**
 * Class PurchaseRequest
 */
class PurchaseRequest extends AbstractRequest
{

    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     * @throws InvalidRequestException
     */
    public function getData()
    {
        // Validate required parameters before return data
        $this->validate('merchantId', 'amount', 'description', 'returnUrl');

        return [
            'MerchantID' => $this->getMerchantId(),
            'Amount' => $this->getAmount(),
            'Description' => $this->getDescription(),
            'Email' => '',
            'Mobile' => '',
            'CallbackURL' => $this->getReturnUrl(),
        ];
    }

    /**
     * Send the request with specified data
     *
     * @param mixed $data The data to send.
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
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
     * @return PurchaseRequest
     */
    public function setMerchantId(string $value)
    {
        return $this->setParameter('merchantId', $value);
    }
}