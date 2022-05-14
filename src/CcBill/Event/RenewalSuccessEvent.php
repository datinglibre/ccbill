<?php

declare(strict_types=1);

namespace DatingLibre\CcBill\Event;

use DateTimeImmutable;
use DateTimeInterface;

/** Uses RenewalSuccessEvent version 5 */
class RenewalSuccessEvent implements CcBillEvent
{
    public const NAME = 'RenewalSuccess';
    private ?string $transactionId;
    private ?string $subscriptionId;
    private ?string $clientAccnum;
    private ?string $clientSubacc;
    private DateTimeInterface $timestamp;
    private ?string $billedAmount;
    private ?string $billedCurrency;
    private ?string $billedCurrencyCode;
    private ?string $accountingAmount;
    private ?string $accountingCurrency;
    private ?string $accountingCurrencyCode;
    private DateTimeInterface $nextRenewalDate;
    private DateTimeInterface $renewalDate;
    private ?string $cardType;
    private ?string $paymentAccount;
    private ?string $paymentType;
    private ?string $last4;
    private ?string $expDate;

    public function __construct(?string $transactionId, ?string $subscriptionId, ?string $clientAccnum, ?string $clientSubacc, ?string $timestamp, ?string $billedAmount, ?string $billedCurrency, ?string $billedCurrencyCode, ?string $accountingAmount, ?string $accountingCurrency, ?string $accountingCurrencyCode, ?string $nextRenewalDate, ?string $renewalDate, ?string $cardType, ?string $paymentAccount, ?string $paymentType, ?string $last4, ?string $expDate)
    {
        $this->transactionId = $transactionId;
        $this->subscriptionId = $subscriptionId;
        $this->clientAccnum = $clientAccnum;
        $this->clientSubacc = $clientSubacc;
        $this->timestamp = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $timestamp);
        $this->billedAmount = $billedAmount;
        $this->billedCurrency = $billedCurrency;
        $this->billedCurrencyCode = $billedCurrencyCode;
        $this->accountingAmount = $accountingAmount;
        $this->accountingCurrency = $accountingCurrency;
        $this->accountingCurrencyCode = $accountingCurrencyCode;
        $this->nextRenewalDate = DateTimeImmutable::createFromFormat('Y-m-d', $nextRenewalDate);
        $this->renewalDate = DateTimeImmutable::createFromFormat('Y-m-d', $renewalDate);
        $this->cardType = $cardType;
        $this->paymentAccount = $paymentAccount;
        $this->paymentType = $paymentType;
        $this->last4 = $last4;
        $this->expDate = $expDate;
    }

    public static function fromArray(array $event): RenewalSuccessEvent
    {
        return new RenewalSuccessEvent(
            $event[CcBillEventConstants::TRANSACTION_ID] ?? null,
            $event[CcBillEventConstants::SUBSCRIPTION_ID] ?? null,
            $event[CcBillEventConstants::CLIENT_ACCOUNT_NO] ?? null,
            $event[CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO] ?? null,
            $event[CcBillEventConstants::TIMESTAMP] ?? null,
            $event[CcBillEventConstants::BILLED_AMOUNT] ?? null,
            $event[CcBillEventConstants::BILLED_CURRENCY] ?? null,
            $event[CcBillEventConstants::BILLED_CURRENCY_CODE] ?? null,
            $event[CcBillEventConstants::ACCOUNTING_AMOUNT] ?? null,
            $event[CcBillEventConstants::ACCOUNTING_CURRENCY] ?? null,
            $event[CcBillEventConstants::ACCOUNTING_CURRENCY_CODE] ?? null,
            $event[CcBillEventConstants::NEXT_RENEWAL_DATE] ?? null,
            $event[CcBillEventConstants::RENEWAL_DATE] ?? null,
            $event[CcBillEventConstants::CARD_TYPE] ?? null,
            $event[CcBillEventConstants::PAYMENT_ACCOUNT] ?? null,
            $event[CcBillEventConstants::PAYMENT_TYPE] ?? null,
            $event[CcBillEventConstants::LAST_FOUR] ?? null,
            $event[CcBillEventConstants::EXP_DATE] ?? null
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

    public function getBilledAmount(): ?string
    {
        return $this->billedAmount;
    }

    public function getBilledCurrency(): ?string
    {
        return $this->billedCurrency;
    }

    public function getBilledCurrencyCode(): ?string
    {
        return $this->billedCurrencyCode;
    }

    public function getAccountingAmount(): ?string
    {
        return $this->accountingAmount;
    }

    public function getAccountingCurrency(): ?string
    {
        return $this->accountingCurrency;
    }

    public function getAccountingCurrencyCode(): ?string
    {
        return $this->accountingCurrencyCode;
    }

    public function getNextRenewalDate(): DateTimeInterface
    {
        return $this->nextRenewalDate;
    }

    public function getRenewalDate(): DateTimeInterface
    {
        return $this->renewalDate;
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

    public function getLast4(): ?string
    {
        return $this->last4;
    }

    public function getExpDate(): ?string
    {
        return $this->expDate;
    }
}
