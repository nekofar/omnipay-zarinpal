<?php
/**
 * @package Omnipay\ZarinPal
 * @author Milad Nekofar <milad@nekofar.com>
 */

namespace Omnipay\ZarinPal\Message;

use Omnipay\Common\Exception\InvalidRequestException;

/**
 * Class PurchaseRequest
 */
class PurchaseRequest extends AbstractRequest
{
    /**
     * Sandbox Endpoint URL
     *
     * @var string URL
     */
    protected $testEndpoint = 'https://sandbox.zarinpal.com/pg/rest/WebGate/PaymentRequest.json';

    /**
     * Live Endpoint URL
     *
     * @var string URL
     */
    protected $liveEndpoint = 'https://www.zarinpal.com/pg/rest/WebGate/PaymentRequest.json';

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
     * @param array $data
     * @return PurchaseResponse
     */
    public function createResponse(array $data)
    {
        return new PurchaseResponse($this, $data);
    }
}
