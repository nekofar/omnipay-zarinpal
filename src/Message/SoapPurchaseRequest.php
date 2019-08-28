<?php
/**
 * @package Omnipay\ZarinPal
 * @author Milad Nekofar <milad@nekofar.com>
 */

namespace Omnipay\ZarinPal;


use Omnipay\Common\Message\AbstractRequest;

/**
 * Class SoapPurchaseRequest
 */
class SoapPurchaseRequest extends AbstractRequest
{

    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     */
    public function getData()
    {
        // TODO: Implement getData() method.
    }

    /**
     * Send the request with specified data
     *
     * @param mixed $data The data to send.
     * @return void
     */
    public function sendData($data)
    {
        // TODO: Implement sendData() method.
    }
}
