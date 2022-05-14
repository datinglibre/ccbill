<?php

declare(strict_types=1);

namespace DatingLibre\CcBill\Event;

use DateTimeImmutable;
use DateTimeInterface;

class CancellationEvent implements CcBillEvent
{
    public const NAME = 'Cancellation';
    private ?string $subscriptionId;
    private ?string $clientAccnum;
    private ?string $clientSubacc;
    private DateTimeInterface $timestamp;
    private ?string $reason;
    private ?string $source;

    public function __construct(?string $subscriptionId, ?string $clientAccnum, ?string $clientSubacc, ?string $timestamp, ?string $reason, ?string $source)
    {
        $this->subscriptionId = $subscriptionId;
        $this->clientAccnum = $clientAccnum;
        $this->clientSubacc = $clientSubacc;
        $this->timestamp = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $timestamp);
        $this->reason = $reason;
        $this->source = $source;
    }

    public static function fromArray(array $event): CancellationEvent
    {
        return new CancellationEvent(
            $event[CcBillEventConstants::SUBSCRIPTION_ID] ?? null,
            $event[CcBillEventConstants::CLIENT_ACCOUNT_NO] ?? null,
            $event[CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO] ?? null,
            $event[CcBillEventConstants::TIMESTAMP] ?? null,
            $event[CcBillEventConstants::REASON] ?? null,
            $event[CcBillEventConstants::SOURCE] ?? null
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

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }
}
