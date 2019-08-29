<?php
/**
 * @package Omnipay\ZarinPal
 * @author Milad Nekofar <milad@nekofar.com>
 */

namespace Omnipay\ZarinPal\Message;

/**
 * Class AbstractResponse
 */
abstract class AbstractResponse extends \Omnipay\Common\Message\AbstractResponse
{
    /**
     * @var array
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
        '-34' => 'Limit the number of transactions or number has crossed the divide.',
        '-40' => 'There is no access to the method.',
        '-41' => 'Additional Data related to information submitted is invalid.',
        '-42' => 'The validity period of the payment id lifetime must be between 30 minutes to 45 days.',
        '-54' => 'Request archived.',
        '100' => 'Operation was successful.',
        '101' => 'Operation was successful but verification operation on this transaction have already been done.',
    ];

    /**
     * Response Message
     *
     * @return null|string A response message from the payment gateway
     */
    public function getMessage()
    {
        return $this->errorCodes[$this->getCode()];
    }

    /**
     * Response code
     *
     * @return null|string A response code from the payment gateway
     */
    public function getCode()
    {
        return $this->data['Status'];
    }
}
