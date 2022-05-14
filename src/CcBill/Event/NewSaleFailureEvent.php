<?php

declare(strict_types=1);

namespace DatingLibre\CcBill\Event;

use DateTimeImmutable;
use DateTimeInterface;

/** Uses CCBill version 3 */
class NewSaleFailureEvent implements CcBillEvent
{
    public const NAME = 'NewSaleFailure';
    private ?string $transactionId;
    private ?string $clientAccountNo;
    private ?string $clientSubAccountNo;
    private DateTimeInterface $timestamp;
    private ?string $firstName;
    private ?string $lastName;
    private ?string $address1;
    private ?string $city;
    private ?string $state;
    private ?string $country;
    private ?string $postalCode;
    private ?string $email;
    private ?string $phoneNumber;
    private ?string $ipAddress;
    private ?string $reservationId;
    private ?string $username;
    private ?string $password;
    private ?string $formName;
    private ?string $flexId;
    private ?string $priceDescription;
    private ?string $recurringPriceDescription;
    private ?string $billedInitialPrice;
    private ?string $billedRecurringPrice;
    private ?string $billedCurrencyCode;
    /** @var string Decimal (9,2) */
    private ?string $subscriptionInitialPrice;
    /** @var string Decimal (7,2) */
    private ?string $subscriptionRecurringPrice;
    private ?string $subscriptionCurrencyCode;
    /** @var string Decimal (9,2) */
    private ?string $accountingInitialPrice;
    /** @var string Decimal (9,2) */
    private ?string $accountingRecurringPrice;
    private ?string $accountingCurrencyCode;
    private ?string $initialPeriod;
    private ?string $recurringPeriod;
    private ?string $rebills;
    private ?string $nextRenewalDate;
    private ?string $subscriptionTypeId;
    private ?string $dynamicPricingValidationDigest;
    private ?string $paymentType;
    private ?string $cardType;
    private ?string $bin;
    private ?string $prePaid;
    private ?string $last4;
    private ?string $expDate;
    private ?string $avsResponse;
    private ?string $cvv2Response;
    private ?string $affiliateSystem;
    private ?string $referringUrl;
    private ?string $failureReason;
    private ?string $failureCode;
    private ?string $lifeTimeSubscription;
    private ?string $lifeTimePrice;
    private ?string $paymentAccount;
    private ?string $threeDSecure;
    private ?string $custom1;

    public function __construct(?string $failureReason, ?string $failureCode, ?string $transactionId, ?string $clientAccountNo, ?string $clientSubAccountNo, ?string $timestamp, ?string $firstName, ?string $lastName, ?string $address1, ?string $city, ?string $state, ?string $country, ?string $postalCode, ?string $email, ?string $phoneNumber, ?string $ipAddress, ?string $reservationId, ?string $username, ?string $password, ?string $formName, ?string $flexId, ?string $priceDescription, ?string $recurringPriceDescription, ?string $billedInitialPrice, ?string $billedRecurringPrice, ?string $billedCurrencyCode, ?string $subscriptionInitialPrice, ?string $subscriptionRecurringPrice, ?string $subscriptionCurrencyCode, ?string $accountingInitialPrice, ?string $accountingRecurringPrice, ?string $accountingCurrencyCode, ?string $initialPeriod, ?string $recurringPeriod, ?string $rebills, ?string $nextRenewalDate, ?string $subscriptionTypeId, ?string $dynamicPricingValidationDigest, ?string $paymentType, ?string $cardType, ?string $bin, ?string $prePaid, ?string $last4, ?string $expDate, ?string $avsResponse, ?string $cvv2Response, ?string $affiliateSystem, ?string $referringUrl, ?string $lifeTimeSubscription, ?string $lifeTimePrice, ?string $paymentAccount, ?string $threeDSecure, ?string $custom1)
    {
        $this->failureReason = $failureReason;
        $this->failureCode = $failureCode;
        $this->transactionId = $transactionId;
        $this->clientAccountNo = $clientAccountNo;
        $this->clientSubAccountNo = $clientSubAccountNo;
        $this->timestamp = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $timestamp);
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address1 = $address1;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
        $this->postalCode = $postalCode;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->ipAddress = $ipAddress;
        $this->reservationId = $reservationId;
        $this->username = $username;
        $this->password = $password;
        $this->formName = $formName;
        $this->flexId = $flexId;
        $this->priceDescription = $priceDescription;
        $this->recurringPriceDescription = $recurringPriceDescription;
        $this->billedInitialPrice = $billedInitialPrice;
        $this->billedRecurringPrice = $billedRecurringPrice;
        $this->billedCurrencyCode = $billedCurrencyCode;
        $this->subscriptionInitialPrice = $subscriptionInitialPrice;
        $this->subscriptionRecurringPrice = $subscriptionRecurringPrice;
        $this->subscriptionCurrencyCode = $subscriptionCurrencyCode;
        $this->accountingInitialPrice = $accountingInitialPrice;
        $this->accountingRecurringPrice = $accountingRecurringPrice;
        $this->accountingCurrencyCode = $accountingCurrencyCode;
        $this->initialPeriod = $initialPeriod;
        $this->recurringPeriod = $recurringPeriod;
        $this->rebills = $rebills;
        $this->nextRenewalDate = $nextRenewalDate;
        $this->subscriptionTypeId = $subscriptionTypeId;
        $this->dynamicPricingValidationDigest = $dynamicPricingValidationDigest;
        $this->paymentType = $paymentType;
        $this->cardType = $cardType;
        $this->bin = $bin;
        $this->prePaid = $prePaid;
        $this->last4 = $last4;
        $this->expDate = $expDate;
        $this->avsResponse = $avsResponse;
        $this->cvv2Response = $cvv2Response;
        $this->affiliateSystem = $affiliateSystem;
        $this->referringUrl = $referringUrl;
        $this->lifeTimeSubscription = $lifeTimeSubscription;
        $this->lifeTimePrice = $lifeTimePrice;
        $this->paymentAccount = $paymentAccount;
        $this->threeDSecure = $threeDSecure;
        $this->custom1 = $custom1;
    }

    public static function fromArray(array $event): NewSaleFailureEvent
    {
        return new NewSaleFailureEvent(
            $event[CcBillEventConstants::FAILURE_REASON] ?? null,
            $event[CcBillEventConstants::FAILURE_CODE] ?? null,
            $event[CcBillEventConstants::TRANSACTION_ID] ?? null,
            $event[CcBillEventConstants::CLIENT_ACCOUNT_NO] ?? null,
            $event[CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO] ?? null,
            $event[CcBillEventConstants::TIMESTAMP] ?? null,
            $event[CcBillEventConstants::FIRSTNAME] ?? null,
            $event[CcBillEventConstants::LASTNAME] ?? null,
            $event[CcBillEventConstants::ADDRESS1] ?? null,
            $event[CcBillEventConstants::CITY] ?? null,
            $event[CcBillEventConstants::STATE] ?? null,
            $event[CcBillEventConstants::COUNTRY] ?? null,
            $event[CcBillEventConstants::POSTAL_CODE] ?? null,
            $event[CcBillEventConstants::EMAIL] ?? null,
            $event[CcBillEventConstants::PHONE_NUMBER] ?? null,
            $event[CcBillEventConstants::IP_ADDRESS] ?? null,
            $event[CcBillEventConstants::RESERVATION_ID] ?? null,
            $event[CcBillEventConstants::USERNAME] ?? null,
            $event[CcBillEventConstants::PASSWORD] ?? null,
            $event[CcBillEventConstants::FORM_NAME] ?? null,
            $event[CcBillEventConstants::FLEX_ID] ?? null,
            $event[CcBillEventConstants::PRICE_DESCRIPTION] ?? null,
            $event[CcBillEventConstants::RECURRING_PRICE_DESCRIPTION] ?? null,
            $event[CcBillEventConstants::BILLED_INITIAL_PRICE] ?? null,
            $event[CcBillEventConstants::BILLED_RECURRING_PRICE] ?? null,
            $event[CcBillEventConstants::BILLED_CURRENCY_CODE] ?? null,
            $event[CcBillEventConstants::SUBSCRIPTION_INITIAL_PRICE] ?? null,
            $event[CcBillEventConstants::SUBSCRIPTION_RECURRING_PRICE] ?? null,
            $event[CcBillEventConstants::SUBSCRIPTION_CURRENCY_CODE] ?? null,
            $event[CcBillEventConstants::ACCOUNTING_INITIAL_PRICE] ?? null,
            $event[CcBillEventConstants::ACCOUNTING_RECURRING_PRICE] ?? null,
            $event[CcBillEventConstants::ACCOUNTING_CURRENCY_CODE] ?? null,
            $event[CcBillEventConstants::INITIAL_PERIOD] ?? null,
            $event[CcBillEventConstants::RECURRING_PERIOD] ?? null,
            $event[CcBillEventConstants::REBILLS] ?? null,
            $event[CcBillEventConstants::NEXT_RENEWAL_DATE] ?? null,
            $event[CcBillEventConstants::SUBSCRIPTION_TYPE_ID] ?? null,
            $event[CcBillEventConstants::DYNAMIC_PRICING_VALIDATION_DIGEST] ?? null,
            $event[CcBillEventConstants::PAYMENT_TYPE] ?? null,
            $event[CcBillEventConstants::CARD_TYPE] ?? null,
            $event[CcBillEventConstants::BIN] ?? null,
            $event[CcBillEventConstants::PRE_PAID] ?? null,
            $event[CcBillEventConstants::LAST_FOUR] ?? null,
            $event[CcBillEventConstants::EXP_DATE] ?? null,
            $event[CcBillEventConstants::AVS_RESPONSE] ?? null,
            $event[CcBillEventConstants::CVV2_RESPONSE] ?? null,
            $event[CcBillEventConstants::AFFILIATE_SYSTEM] ?? null,
            $event[CcBillEventConstants::REFERRING_URL] ?? null,
            $event[CcBillEventConstants::LIFETIME_SUBSCRIPTION] ?? null,
            $event[CcBillEventConstants::LIFETIME_PRICE] ?? null,
            $event[CcBillEventConstants::PAYMENT_ACCOUNT] ?? null,
            $event[CcBillEventConstants::THREE_D_SECURE] ?? null,
            $event[CcBillEventConstants::CUSTOM_1] ?? null
        );
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function getClientAccountNo(): ?string
    {
        return $this->clientAccountNo;
    }

    public function getClientSubAccountNo(): ?string
    {
        return $this->clientSubAccountNo;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getAddress1(): ?string
    {
        return $this->address1;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function getReservationId(): ?string
    {
        return $this->reservationId;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getFormName(): ?string
    {
        return $this->formName;
    }

    public function getFlexId(): ?string
    {
        return $this->flexId;
    }

    public function getPriceDescription(): ?string
    {
        return $this->priceDescription;
    }

    public function getRecurringPriceDescription(): ?string
    {
        return $this->recurringPriceDescription;
    }

    public function getBilledInitialPrice(): ?string
    {
        return $this->billedInitialPrice;
    }

    public function getBilledRecurringPrice(): ?string
    {
        return $this->billedRecurringPrice;
    }

    public function getBilledCurrencyCode(): ?string
    {
        return $this->billedCurrencyCode;
    }

    public function getSubscriptionInitialPrice(): ?string
    {
        return $this->subscriptionInitialPrice;
    }

    public function getSubscriptionRecurringPrice(): ?string
    {
        return $this->subscriptionRecurringPrice;
    }

    public function getSubscriptionCurrencyCode(): ?string
    {
        return $this->subscriptionCurrencyCode;
    }

    public function getAccountingInitialPrice(): ?string
    {
        return $this->accountingInitialPrice;
    }

    public function getAccountingRecurringPrice(): ?string
    {
        return $this->accountingRecurringPrice;
    }

    public function getAccountingCurrencyCode(): ?string
    {
        return $this->accountingCurrencyCode;
    }

    public function getInitialPeriod(): ?string
    {
        return $this->initialPeriod;
    }

    public function getRecurringPeriod(): ?string
    {
        return $this->recurringPeriod;
    }

    public function getRebills(): ?string
    {
        return $this->rebills;
    }

    public function getNextRenewalDate(): ?string
    {
        return $this->nextRenewalDate;
    }

    public function getSubscriptionTypeId(): ?string
    {
        return $this->subscriptionTypeId;
    }

    public function getDynamicPricingValidationDigest(): ?string
    {
        return $this->dynamicPricingValidationDigest;
    }

    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    public function getCardType(): ?string
    {
        return $this->cardType;
    }

    public function getBin(): ?string
    {
        return $this->bin;
    }

    public function getPrePaid(): ?string
    {
        return $this->prePaid;
    }

    public function getLast4(): ?string
    {
        return $this->last4;
    }

    public function getExpDate(): ?string
    {
        return $this->expDate;
    }

    public function getAvsResponse(): ?string
    {
        return $this->avsResponse;
    }

    public function getCvv2Response(): ?string
    {
        return $this->cvv2Response;
    }

    public function getAffiliateSystem(): ?string
    {
        return $this->affiliateSystem;
    }

    public function getReferringUrl(): ?string
    {
        return $this->referringUrl;
    }

    public function getFailureReason(): ?string
    {
        return $this->failureReason;
    }

    public function getFailureCode(): ?string
    {
        return $this->failureCode;
    }

    public function getLifeTimeSubscription(): ?string
    {
        return $this->lifeTimeSubscription;
    }

    public function getLifeTimePrice(): ?string
    {
        return $this->lifeTimePrice;
    }

    public function getPaymentAccount(): ?string
    {
        return $this->paymentAccount;
    }

    public function getThreeDSecure(): ?string
    {
        return $this->threeDSecure;
    }

    public function getCustom1(): ?string
    {
        return $this->custom1;
    }
}
