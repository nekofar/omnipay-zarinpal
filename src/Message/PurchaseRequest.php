<?php

/**
 * @package Omnipay\ZarinPal
 *
 * @author Milad Nekofar <milad@nekofar.com>
 */

declare(strict_types=1);

namespace Omnipay\ZarinPal\Message;

use Omnipay\Common\Exception\InvalidRequestException;

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
     *
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
            'Email' => $this->getEmail(),
            'Mobile' => $this->getMobile(),
            'CallbackURL' => $this->getReturnUrl(),
        ];
    }

    /**
     * @return string
     */
    protected function createUri(string $endpoint)
    {
        return $endpoint . '/PaymentRequest.json';
    }

    /**
     * @param array<integer|string, mixed> $data
     *
     * @return PurchaseResponse
     */
    protected function createResponse(array $data)
    {
        return new PurchaseResponse($this, $data);
    }
}
