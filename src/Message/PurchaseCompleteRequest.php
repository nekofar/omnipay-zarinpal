<?php
/**
 * @package Omnipay\ZarinPal
 * @author Milad Nekofar <milad@nekofar.com>
 */

namespace Omnipay\ZarinPal\Message;

use Omnipay\Common\Exception\InvalidRequestException;

/**
 * Class PurchaseCompleteRequest
 */
class PurchaseCompleteRequest extends AbstractRequest
{
    /**
     * Sandbox Endpoint URL
     *
     * @var string URL
     */
    protected $testEndpoint = 'https://sandbox.zarinpal.com/pg/rest/WebGate/PaymentVerification.json';

    /**
     * Live Endpoint URL
     *
     * @var string URL
     */
    protected $liveEndpoint = 'https://www.zarinpal.com/pg/rest/WebGate/PaymentVerification.json';

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
        $this->validate('merchantId', 'amount', 'authority');

        return [
            'MerchantID' => $this->getMerchantId(),
            'Amount' => $this->getAmount() ? $this->getAmount() : $this->httpRequest->query->get('Amount'),
            'Authority' => $this->getAuthority() ? $this->getAuthority() : $this->httpRequest->query->get('Authority'),
        ];
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function createResponse(array $data)
    {
        return new PurchaseCompleteResponse($this, $data);
    }
}
