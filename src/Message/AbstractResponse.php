<?php

/**
 * @package Omnipay\ZarinPal
 *
 * @author Milad Nekofar <milad@nekofar.com>
 */

declare(strict_types=1);

namespace Omnipay\ZarinPal\Message;

use Omnipay\Common\Message\AbstractResponse as BaseAbstractResponse;

/**
 * Class AbstractResponse
 */
abstract class AbstractResponse extends BaseAbstractResponse
{
    /**
     * @var array<int|string, string>
     */
    private $errorCodes = [
        '-1' => 'Information submitted is incomplete..',
        '-2' => 'Merchant ID or Acceptor IP is not correct.',
        '-3' => 'Amount should be above 100 Toman.',
        '-4' => 'Approved level of Acceptor is Lower than the silver.',
        '-11' => 'Request Not found.',
        '-12' => 'It is not possible to edit the request.',
        '-21' => 'Financial operations for this transaction was not found.',
        '-22' => 'Transaction is unsuccessful.',
        '-33' => 'Transaction amount does not match the amount paid.',
        '-34' => 'Limit the number of transactions or number has crossed the divide.', // phpcs:ignoree
        '-40' => 'There is no access to the method.',
        '-41' => 'Additional Data related to information submitted is invalid.',
        '-42' => 'The validity period of the payment id lifetime must be between 30 minutes to 45 days.', // phpcs:ignore
        '-54' => 'Request archived.',
        '100' => 'Operation was successful.',
        '101' => 'Operation was successful but verification operation on this transaction have already been done.', // phpcs:ignore
    ];

    /**
     * Response Message
     *
     * @return string|null A response message from the payment gateway
     */
    public function getMessage(): ?string
    {
        return $this->errorCodes[$this->getCode()] ?? parent::getMessage();
    }

    /**
     * Response code
     *
     * @return string|null A response code from the payment gateway
     */
    public function getCode(): ?string
    {
        return (string) ($this->data['Status'] ?? parent::getCode());
    }
}
