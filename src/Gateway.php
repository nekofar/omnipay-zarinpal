<?php

/**
 * @package Omnipay\ZarinPal
 *
 * @author Milad Nekofar <milad@nekofar.com>
 */

declare(strict_types=1);

namespace Omnipay\ZarinPal;

use Omnipay\Common\AbstractGateway;
use Omnipay\ZarinPal\Message\PurchaseCompleteRequest;
use Omnipay\ZarinPal\Message\PurchaseRequest;

/**
 * Class Gateway
 */
class Gateway extends AbstractGateway
{
    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     */
    public function getName(): string
    {
        return 'ZarinPal';
    }

    /**
     * @return array<string,mixed>
     */
    public function getDefaultParameters(): array
    {
        return [
            'testMode' => false,
            'merchantId' => '',
            'returnUrl' => '',
        ];
    }

    /**
     */
    public function getMerchantId(): string
    {
        return $this->getParameter('merchantId');
    }

    /**
     */
    public function getReturnUrl(): string
    {
        return $this->getParameter('returnUrl');
    }

    /**
     */
    public function setMerchantId(string $value): Gateway
    {
        return $this->setParameter('merchantId', $value);
    }

    /**
     * @return $this
     */
    public function setReturnUrl(string $value)
    {
        return $this->setParameter('returnUrl', $value);
    }

    /**
     * @param array<string, mixed> $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest|\Omnipay\ZarinPal\RequestInterface
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }

    /**
     * @param array<string, mixed> $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest|\Omnipay\ZarinPal\RequestInterface
     */
    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest(PurchaseCompleteRequest::class, $parameters);
    }
}
