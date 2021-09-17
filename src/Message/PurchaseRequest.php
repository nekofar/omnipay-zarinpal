<?php

/**
 * @package Omnipay\ZarinPal
 *
 * @author Milad Nekofar <milad@nekofar.com>
 */

declare(strict_types=1);

namespace Omnipay\ZarinPal\Message;

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
     * @return array<string, integer|string|float>
     *
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData(): array
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
     */
    protected function createUri(string $endpoint): string
    {
        return $endpoint . '/PaymentRequest.json';
    }

    /**
     * @param array<string, integer|string|float> $data
     */
    protected function createResponse(array $data): ResponseInterface
    {
        return new PurchaseResponse($this, $data);
    }
}
