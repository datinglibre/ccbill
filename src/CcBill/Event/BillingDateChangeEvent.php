<?php

declare(strict_types=1);

namespace DatingLibre\CcBill\Event;

use DateTimeImmutable;
use DateTimeInterface;

class BillingDateChangeEvent implements CcBillEvent
{
    public const NAME = 'BillingDateChange';
    private ?string $subscriptionId;
    private ?string $clientAccnum;
    private ?string $clientSubacc;
    private DateTimeInterface $timestamp;
    private DateTimeInterface $nextRenewalDate;

    public function __construct(?string $subscriptionId, ?string $clientAccnum, ?string $clientSubacc, ?string $timestamp, ?string $nextRenewalDate)
    {
        $this->subscriptionId = $subscriptionId;
        $this->clientAccnum = $clientAccnum;
        $this->clientSubacc = $clientSubacc;
        $this->timestamp = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $timestamp);
        $this->nextRenewalDate = DateTimeImmutable::createFromFormat('Y-m-d', $nextRenewalDate);
    }

    public static function fromArray(array $event): BillingDateChangeEvent
    {
        return new BillingDateChangeEvent(
            $event[CcBillEventConstants::SUBSCRIPTION_ID] ?? null,
            $event[CcBillEventConstants::CLIENT_ACCOUNT_NO] ?? null,
            $event[CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO] ?? null,
            $event[CcBillEventConstants::TIMESTAMP] ?? null,
            $event[CcBillEventConstants::NEXT_RENEWAL_DATE] ?? null
        );
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

    public function getNextRenewalDate(): DateTimeInterface
    {
        return $this->nextRenewalDate;
    }
}
