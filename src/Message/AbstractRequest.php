<?php

/**
 * @package Omnipay\ZarinPal
 *
 * @author Milad Nekofar <milad@nekofar.com>
 */

declare(strict_types=1);

namespace Omnipay\ZarinPal\Message;

use Exception;
use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Exception\InvalidResponseException;
use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;
use Omnipay\Common\Message\ResponseInterface;

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
     * @param string $endpoint
     *
     * @return string
     */
    abstract protected function createUri(string $endpoint);

    /**
     * @param array $data
     *
     * @return AbstractResponse
     */
    abstract protected function createResponse(array $data);

    /**
     * @return string
     *
     * @throws InvalidRequestException
     */
    public function getAmount()
    {
        if (!$value = parent::getAmount()) {
            $value = $this->httpRequest->query->get('Amount');
        }
        return $value;
    }

    /**
     * @return string
     */
    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    /**
     * @return string
     */
    public function getAuthority()
    {
        if (!$value = $this->getParameter('authority')) {
            $value = $this->httpRequest->query->get('Authority');
        }
        return $value;
    }

    /**
     * @param string $value
     *
     * @return AbstractRequest
     */
    public function setMerchantId(string $value)
    {
        return $this->setParameter('merchantId', $value);
    }

    /**
     * @param string $value
     *
     * @return AbstractRequest
     */
    public function setAuthority(string $value)
    {
        return $this->setParameter('authority', $value);
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->getParameter('email');
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->getParameter('mobile');
    }

    /**
     * @param string $value
     *
     * @return AbstractRequest
     */
    public function setEmail(string $value)
    {
        return $this->setParameter('email', $value);
    }

    /**
     * @param string $value
     *
     * @return AbstractRequest
     */
    public function setMobile(string $value)
    {
        return $this->setParameter('mobile', $value);
    }

    /**
     * Send the request with specified data
     *
     * @param mixed $data The data to send.
     *
     * @return ResponseInterface
     *
     * @throws InvalidResponseException
     */
    public function sendData($data)
    {
        try {
            $httpResponse = $this->httpClient->request(
                'POST',
                $this->createUri($this->getEndpoint()),
                [
                    'Accept' => 'application/json',
                    'Content-type' => 'application/json',
                ],
                json_encode($data)
            );
            $json = $httpResponse->getBody()->getContents();
            $data = !empty($json) ? json_decode($json, true) : [];
            return $this->response = $this->createResponse($data);
        } catch (Exception $e) {
            throw new InvalidResponseException(
                'Error communicating with payment gateway: ' . $e->getMessage(),
                $e->getCode()
            );
        }
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }
}
