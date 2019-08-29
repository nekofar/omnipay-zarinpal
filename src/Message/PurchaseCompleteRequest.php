<?php
/**
 * @package Omnipay\ZarinPal
 * @author Milad Nekofar <milad@nekofar.com>
 */

namespace Omnipay\ZarinPal\Message;

use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\ResponseInterface;

/**
 * Class PurchaseCompleteRequest
 */
class PurchaseCompleteRequest extends AbstractRequest
{

    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     */
    public function getData()
    {
        return [];
    }

    /**
     * Send the request with specified data
     *
     * @param mixed $data The data to send.
     * @return AbstractResponse|ResponseInterface
     */
    public function sendData($data)
    {
        return $this->response = new PurchaseCompleteResponse($this, $data);
    }
}