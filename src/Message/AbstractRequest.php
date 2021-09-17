<?php

/**
 * @package Omnipay\ZarinPal
 *
 * @author Milad Nekofar <milad@nekofar.com>
 */

declare(strict_types=1);

namespace Omnipay\ZarinPal\Message;

use Omnipay\Common\Exception\InvalidResponseException;
use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;
use Omnipay\Common\Message\ResponseInterface;
use Throwable;

use function json_decode;

use const JSON_THROW_ON_ERROR;

/**
 * Class AbstractRequest
 */
abstract class AbstractRequest extends BaseAbstractRequest
{
    /**
     * Sandbox Endpoint URL
     *
     * @var string URL
     */
    protected $testEndpoint = 'https://sandbox.zarinpal.com/pg/rest/WebGate';

    /**
     * Live Endpoint URL
     *
     * @var string URL
     */
    protected $liveEndpoint = 'https://www.zarinpal.com/pg/rest/WebGate';

    /**
     */
    abstract protected function createUri(string $endpoint): string;

    /**
     * @param array<string, integer|string|float> $data
     */
    abstract protected function createResponse(array $data): ResponseInterface;

    /**
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getAmount(): string
    {
        $value = parent::getAmount();

        if (!in_array($value, [null, ''], true)) {
            return $value;
        }

        return (string) $this->httpRequest->query->get('Amount');
    }

    /**
     */
    public function getMerchantId(): string
    {
        return $this->getParameter('merchantId');
    }

    /**
     */
    public function getAuthority(): ?string
    {
        $value = (string) $this->getParameter('authority');

        if (!in_array($value, [null, ''], true)) {
            return $value;
        }

        return (string) $this->httpRequest->query->get('Authority');
    }

    /**
     */
    public function setMerchantId(string $value): AbstractRequest
    {
        return $this->setParameter('merchantId', $value);
    }

    /**
     */
    public function setAuthority(string $value): AbstractRequest
    {
        return $this->setParameter('authority', $value);
    }

    /**
     */
    public function getEmail(): string
    {
        return $this->getParameter('email');
    }

    /**
     */
    public function getMobile(): string
    {
        return $this->getParameter('mobile');
    }

    /**
     */
    public function setEmail(string $value): AbstractRequest
    {
        return $this->setParameter('email', $value);
    }

    /**
     */
    public function setMobile(string $value): AbstractRequest
    {
        return $this->setParameter('mobile', $value);
    }

    /**
     * Send the request with specified data
     *
     * @param array<string, integer|string|float|bool> $data The data to send.
     *
     * @throws \Omnipay\Common\Exception\InvalidResponseException
     */
    public function sendData($data): ResponseInterface
    {
        try {
            $httpResponse = $this->httpClient->request(
                'POST',
                $this->createUri($this->getEndpoint()),
                [
                    'Accept' => 'application/json',
                    'Content-type' => 'application/json',
                ],
                json_encode($data),
            );
            $json = $httpResponse->getBody()->getContents();
            $data = [];

            if (!in_array($json, [null, ''], true)) {
                $data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
            }

            return $this->response = $this->createResponse($data);
        } catch (Throwable $e) {
            throw new InvalidResponseException(
                'Error communicating with payment gateway: ' . $e->getMessage(),
                $e->getCode(),
            );
        }
    }

    /**
     */
    protected function getEndpoint(): string
    {
        return $this->getTestMode()
            ? $this->testEndpoint
            : $this->liveEndpoint;
    }
}
