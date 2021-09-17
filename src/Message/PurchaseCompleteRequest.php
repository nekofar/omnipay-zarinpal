<?php

/**
 * @package Omnipay\ZarinPal
 *
 * @author Milad Nekofar <milad@nekofar.com>
 */

declare(strict_types=1);

namespace Omnipay\ZarinPal\Message;

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
     *
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        // Validate required parameters before return data
        $this->validate('merchantId', 'amount', 'authority');

        return [
            'MerchantID' => $this->getMerchantId(),
            'Amount' => $this->getAmount(),
            'Authority' => $this->getAuthority(),
        ];
    }

    /**
     */
    protected function createUri(string $endpoint): string
    {
        return $endpoint . '/PaymentVerification.json';
    }

    /**
     * @param array<integer|string, mixed> $data
     */
    protected function createResponse(array $data): PurchaseCompleteResponse
    {
        return new PurchaseCompleteResponse($this, $data);
    }
}
