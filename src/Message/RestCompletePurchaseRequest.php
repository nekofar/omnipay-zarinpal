<?php
/**
 * @package Omnipay\ZarinPal
 * @author Milad Nekofar <milad@nekofar.com>
 */

namespace Omnipay\ZarinPal;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\ZarinPal\Message\AbstractRequest;

/**
 * Class RestCompletePurchaseRequest
 */
class RestCompletePurchaseRequest extends AbstractRequest
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
        parent::getData();

        $data = $this->httpRequest->request->all();

        return $data;
    }

    /**
     * Send the request with specified data
     *
     * @param mixed $data The data to send.
     * @return RestCompletePurchaseResponse
     */
    public function sendData($data)
    {
        return $this->response = new RestCompletePurchaseResponse($this, $data);
    }
}