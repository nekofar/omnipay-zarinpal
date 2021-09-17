<?php

/**
 * @package Omnipay\ZarinPal
 *
 * @author Milad Nekofar <milad@nekofar.com>
 */

declare(strict_types=1);

namespace Omnipay\ZarinPal\Message;

/**
 * Class PurchaseCompleteResponse
 */
class PurchaseCompleteResponse extends AbstractResponse
{
    /**
     * Is the response successful?
     */
    public function isSuccessful(): bool
    {
        return '100' === $this->getCode();
    }

    /**
     * A reference provided by the gateway to represent this transaction.
     */
    public function getTransactionReference(): ?string
    {
        return $this->data['RefID'];
    }
}
