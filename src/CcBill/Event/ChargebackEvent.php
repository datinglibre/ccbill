<?php

declare(strict_types=1);

namespace DatingLibre\CcBill\Event;

use DateTimeImmutable;
use DateTimeInterface;
use Symfony\Contracts\EventDispatcher\Event;

/** Uses Chargeback version 4 */
class ChargebackEvent implements CcBillEvent
{
    public const NAME = 'Chargeback';
    private ?string $transactionId;
    private ?string $subscriptionId;
    private ?string $clientAccnum;
    private ?string $clientSubacc;
    private DateTimeInterface $timestamp;
    private ?string $amount;
    private ?string $cardType;
    private ?string $paymentAccount;
    private ?string $paymentType;
    private ?string $bin;
    private ?string $last4;
    private ?string $expDate;
    private ?string $reason;

    public function __construct(?string $transactionId, ?string $subscriptionId, ?string $clientAccnum, ?string $clientSubacc, ?string $timestamp, ?string $amount, ?string $cardType, ?string $paymentAccount, ?string $paymentType, ?string $bin, ?string $last4, ?string $expDate, ?string $reason)
    {
        $this->transactionId = $transactionId;
        $this->subscriptionId = $subscriptionId;
        $this->clientAccnum = $clientAccnum;
        $this->clientSubacc = $clientSubacc;
        $this->timestamp = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $timestamp);
        $this->amount = $amount;
        $this->cardType = $cardType;
        $this->paymentAccount = $paymentAccount;
        $this->paymentType = $paymentType;
        $this->bin = $bin;
        $this->last4 = $last4;
        $this->expDate = $expDate;
        $this->reason = $reason;
    }

    public static function fromArray(array $event): ChargebackEvent
    {
        return new ChargebackEvent(
            $event[CcBillEventConstants::TRANSACTION_ID] ?? null,
            $event[CcBillEventConstants::SUBSCRIPTION_ID] ?? null,
            $event[CcBillEventConstants::CLIENT_ACCOUNT_NO] ?? null,
            $event[CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO] ?? null,
            $event[CcBillEventConstants::TIMESTAMP] ?? null,
            $event[CcBillEventConstants::AMOUNT] ?? null,
            $event[CcBillEventConstants::CARD_TYPE] ?? null,
            $event[CcBillEventConstants::PAYMENT_ACCOUNT] ?? null,
            $event[CcBillEventConstants::PAYMENT_TYPE] ?? null,
            $event[CcBillEventConstants::BIN] ?? null,
            $event[CcBillEventConstants::LAST_FOUR] ?? null,
            $event[CcBillEventConstants::EXP_DATE] ?? null,
            $event[CcBillEventConstants::REASON] ?? null
        );
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function getSubscriptionId(): ?string
    {
        return $this->subscriptionId;
    }

    public function getClientAccnum(): ?string
    {
        return $this->clientAccnum;
    }

    public function getClientSubacc(): ?string
    {
        return $this->clientSubacc;
    }

    public function getTimestamp(): DateTimeInterface
    {
        return $this->timestamp;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }
    public function getCardType(): ?string
    {
        return $this->cardType;
    }

    public function getPaymentAccount(): ?string
    {
        return $this->paymentAccount;
    }
    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }
    public function getBin(): ?string
    {
        return $this->bin;
    }

    public function getLast4(): ?string
    {
        return $this->last4;
    }

    public function getExpDate(): ?string
    {
        return $this->expDate;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }
}
