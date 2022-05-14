<?php

declare(strict_types=1);

namespace DatingLibre\CcBill\Event;

use DateTimeImmutable;
use DateTimeInterface;

/** Uses RefundEvent version 4 */
class RefundEvent implements CcBillEvent
{
    public const NAME = 'Refund';
    private ?string $transactionId;
    private ?string $subscriptionId;
    private ?string $clientAccnum;
    private ?string $clientSubacc;
    private DateTimeInterface $timestamp;
    private ?string $amount;
    private ?string $accountingCurrency;
    private ?string $currency;
    private ?string $currencyCode;
    private ?string $accountingAmount;
    private ?string $accountingCurrencyCode;
    private ?string $cardType;
    private ?string $paymentAccount;
    private ?string $paymentType;
    private ?string $last4;
    private ?string $expDate;
    private ?string $reason;

    public function __construct(?string  $transactionId, ?string  $subscriptionId, ?string $clientAccnum, ?string $clientSubacc, ?string  $timestamp, ?string  $amount, ?string  $accountingCurrency, ?string  $currency, ?string  $currencyCode, ?string  $accountingAmount, ?string  $accountingCurrencyCode, ?string  $cardType, ?string $paymentAccount, ?string  $paymentType, ?string  $last4, ?string  $expDate, ?string  $reason)
    {
        $this->transactionId = $transactionId;
        $this->subscriptionId = $subscriptionId;
        $this->clientAccnum = $clientAccnum;
        $this->clientSubacc = $clientSubacc;
        $this->timestamp = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $timestamp);
        $this->amount = $amount;
        $this->accountingCurrency = $accountingCurrency;
        $this->currency = $currency;
        $this->currencyCode = $currencyCode;
        $this->accountingAmount = $accountingAmount;
        $this->accountingCurrencyCode = $accountingCurrencyCode;
        $this->cardType = $cardType;
        $this->paymentAccount = $paymentAccount;
        $this->paymentType = $paymentType;
        $this->last4 = $last4;
        $this->expDate = $expDate;
        $this->reason = $reason;
    }

    public static function fromArray(array $event): RefundEvent
    {
        return new RefundEvent(
            $event[CcBillEventConstants::TRANSACTION_ID] ?? null,
            $event[CcBillEventConstants::SUBSCRIPTION_ID] ?? null,
            $event[CcBillEventConstants::CLIENT_ACCOUNT_NO] ?? null,
            $event[CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO] ?? null,
            $event[CcBillEventConstants::TIMESTAMP] ?? null,
            $event[CcBillEventConstants::AMOUNT] ?? null,
            $event[CcBillEventConstants::ACCOUNTING_CURRENCY] ?? null,
            $event[CcBillEventConstants::CURRENCY] ?? null,
            $event[CcBillEventConstants::CURRENCY_CODE] ?? null,
            $event[CcBillEventConstants::ACCOUNTING_AMOUNT] ?? null,
            $event[CcBillEventConstants::ACCOUNTING_CURRENCY_CODE] ?? null,
            $event[CcBillEventConstants::CARD_TYPE] ?? null,
            $event[CcBillEventConstants::PAYMENT_ACCOUNT] ?? null,
            $event[CcBillEventConstants::PAYMENT_TYPE] ?? null,
            $event[CcBillEventConstants::LAST_FOUR] ?? null,
            $event[CcBillEventConstants::EXP_DATE] ?? null,
            $event[CcBillEventConstants::REASON]
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

    public function getAccountingCurrency(): ?string
    {
        return $this->accountingCurrency;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    public function getAccountingAmount(): ?string
    {
        return $this->accountingAmount;
    }

    public function getAccountingCurrencyCode(): ?string
    {
        return $this->accountingCurrencyCode;
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

    public function getReason(): ?string
    {
        return $this->reason;
    }
}
