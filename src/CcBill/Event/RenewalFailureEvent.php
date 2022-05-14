<?php

declare(strict_types=1);

namespace DatingLibre\CcBill\Event;

use DateTimeImmutable;
use DateTimeInterface;

/** Uses RenewalFailureEvent version 3 */
class RenewalFailureEvent implements CcBillEvent
{
    public const NAME = 'RenewalFailure';
    private ?string $transactionId;
    private ?string $subscriptionId;
    private ?string $clientAccnum;
    private ?string $clientSubacc;
    private DateTimeInterface $timestamp;
    private ?string $failureReason;
    private ?string $failureCode;
    private DateTimeInterface $nextRetryDate;
    private DateTimeInterface $renewalDate;
    private ?string $cardType;
    private ?string $paymentType;

    public function __construct(?string $transactionId, ?string $subscriptionId, ?string $clientAccnum, ?string $clientSubacc, ?string $timestamp, ?string $failureReason, ?string $failureCode, ?string $nextRetryDate, ?string $renewalDate, ?string $cardType, ?string $paymentType)
    {
        $this->transactionId = $transactionId;
        $this->subscriptionId = $subscriptionId;
        $this->clientAccnum = $clientAccnum;
        $this->clientSubacc = $clientSubacc;
        $this->timestamp = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $timestamp);
        $this->failureReason = $failureReason;
        $this->failureCode = $failureCode;
        $this->nextRetryDate = DateTimeImmutable::createFromFormat('Y-m-d', $nextRetryDate);
        $this->renewalDate = DateTimeImmutable::createFromFormat('Y-m-d', $renewalDate);
        $this->cardType = $cardType;
        $this->paymentType = $paymentType;
    }

    public static function fromArray(array $event): RenewalFailureEvent
    {
        return new RenewalFailureEvent(
            $event[CcBillEventConstants::TRANSACTION_ID] ?? null,
            $event[CcBillEventConstants::SUBSCRIPTION_ID] ?? null,
            $event[CcBillEventConstants::CLIENT_ACCOUNT_NO] ?? null,
            $event[CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO] ?? null,
            $event[CcBillEventConstants::TIMESTAMP] ?? null,
            $event[CcBillEventConstants::FAILURE_REASON] ?? null,
            $event[CcBillEventConstants::FAILURE_CODE] ?? null,
            $event[CcBillEventConstants::NEXT_RETRY_DATE] ?? null,
            $event[CcBillEventConstants::RENEWAL_DATE] ?? null,
            $event[CcBillEventConstants::CARD_TYPE] ?? null,
            $event[CcBillEventConstants::PAYMENT_TYPE] ?? null
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

    public function getFailureReason(): ?string
    {
        return $this->failureReason;
    }

    public function getFailureCode(): ?string
    {
        return $this->failureCode;
    }

    public function getNextRetryDate(): DateTimeInterface
    {
        return $this->nextRetryDate;
    }

    public function getRenewalDate(): DateTimeInterface
    {
        return $this->renewalDate;
    }

    public function getCardType(): ?string
    {
        return $this->cardType;
    }

    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }
}
