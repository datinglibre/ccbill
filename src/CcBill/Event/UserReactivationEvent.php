<?php

declare(strict_types=1);

namespace DatingLibre\CcBill\Event;

use DateTimeImmutable;
use DateTimeInterface;

class UserReactivationEvent implements CcBillEvent
{
    public const NAME = 'UserReactivation';
    private ?string $subscriptionId;
    private ?string $transactionId;
    private ?string $price;
    private ?string $username;
    private ?string $clientAccountNumber;
    private ?string  $clientSubAccountNumber;
    private ?string  $email;
    private DateTimeInterface $nextRenewalDate;
    private ?string $password;

    public function __construct(
        $subscriptionId,
        ?string  $transactionId,
        ?string  $price,
        ?string  $username,
        ?string  $password,
        ?string $clientAccountNumber,
        ?string $clientSubAccountNumber,
        ?string $email,
        ?string $nextRenewalDate
    ) {
        $this->subscriptionId = $subscriptionId;
        $this->transactionId = $transactionId;
        $this->price = $price;
        $this->username = $username;
        $this->password = $password;
        $this->clientAccountNumber = $clientAccountNumber;
        $this->clientSubAccountNumber = $clientSubAccountNumber;
        $this->email = $email;
        $this->nextRenewalDate = DateTimeImmutable::createFromFormat('Y-m-d', $nextRenewalDate);
    }

    public static function fromArray(array $event): UserReactivationEvent
    {
        return new UserReactivationEvent(
            $event[CcBillEventConstants::SUBSCRIPTION_ID] ?? null,
            $event[CcBillEventConstants::TRANSACTION_ID] ?? null,
            $event[CcBillEventConstants::PRICE] ?? null,
            $event[CcBillEventConstants::USERNAME] ?? null,
            $event[CcBillEventConstants::PASSWORD] ?? null,
            $event[CcBillEventConstants::CLIENT_ACCOUNT_NO] ?? null,
            $event[CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO] ?? null,
            $event[CcBillEventConstants::EMAIL] ?? null,
            $event[CcBillEventConstants::NEXT_RENEWAL_DATE] ?? null
        );
    }

    public function getSubscriptionId(): ?string
    {
        return $this->subscriptionId;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getClientAccountNumber(): ?string
    {
        return $this->clientAccountNumber;
    }

    public function getClientSubAccountNumber(): ?string
    {
        return $this->clientSubAccountNumber;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getNextRenewalDate(): DateTimeInterface
    {
        return $this->nextRenewalDate;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }
}
