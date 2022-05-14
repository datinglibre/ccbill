<?php

declare(strict_types=1);

namespace DatingLibre\CcBill\Event;

/** Uses Upgrade Success v2  */
class UpgradeSuccessEvent extends NewSaleSuccessEvent
{
    public const NAME = 'UpgradeSuccess';
    private ?string $originalSubscriptionId;
    private ?string $originalMerchantAccnum;
    private ?string $originalMerchantSubacc;
    private ?string $source;

    public function __construct(?string $originalSubscriptionId, ?string $originalMerchantAccnum, ?string $originalMerchantSubacc, ?string $source, ?string $subscriptionId, ?string $productDescription, ?string $transactionId, ?string $clientAccountNo, ?string $clientSubAccountNo, ?string $timestamp, ?string $firstName, ?string $lastName, ?string $address1, ?string $city, ?string $state, ?string $country, ?string $postalCode, ?string $email, ?string $phoneNumber, ?string $ipAddress, ?string $reservationId, ?string $username, ?string $password, ?string $formName, ?string $flexId, ?string $priceDescription, ?string $recurringPriceDescription, ?string $billedInitialPrice, ?string $billedRecurringPrice, ?string $billedCurrencyCode, ?string $subscriptionInitialPrice, ?string $subscriptionRecurringPrice, ?string $subscriptionCurrencyCode, ?string $accountingInitialPrice, ?string $accountingRecurringPrice, ?string $accountingCurrencyCode, ?string $initialPeriod, ?string $recurringPeriod, ?string $rebills, ?string $nextRenewalDate, ?string $subscriptionTypeId, ?string $dynamicPricingValidationDigest, ?string $paymentType, ?string $cardType, ?string $bin, ?string $prePaid, ?string $last4, ?string $expDate, ?string $avsResponse, ?string $cvv2Response, ?string $affiliateSystem, ?string $referringUrl, ?string $lifeTimeSubscription, ?string $lifeTimePrice, ?string $paymentAccount, ?string $threeDSecure)
    {
        parent::__construct($subscriptionId, $productDescription, $transactionId, $clientAccountNo, $clientSubAccountNo, $timestamp, $firstName, $lastName, $address1, $city, $state, $country, $postalCode, $email, $phoneNumber, $ipAddress, $reservationId, $username, $password, $formName, $flexId, $priceDescription, $recurringPriceDescription, $billedInitialPrice, $billedRecurringPrice, $billedCurrencyCode, $subscriptionInitialPrice, $subscriptionRecurringPrice, $subscriptionCurrencyCode, $accountingInitialPrice, $accountingRecurringPrice, $accountingCurrencyCode, $initialPeriod, $recurringPeriod, $rebills, $nextRenewalDate, $subscriptionTypeId, $dynamicPricingValidationDigest, $paymentType, $cardType, $bin, $prePaid, $last4, $expDate, $avsResponse, $cvv2Response, $affiliateSystem, $referringUrl, $lifeTimeSubscription, $lifeTimePrice, $paymentAccount, $threeDSecure, null);
        $this->originalSubscriptionId = $originalSubscriptionId;
        $this->originalMerchantAccnum = $originalMerchantAccnum;
        $this->originalMerchantSubacc = $originalMerchantSubacc;
        $this->source = $source;
    }

    public static function fromArray(array $event): UpgradeSuccessEvent
    {
        return new UpgradeSuccessEvent(
            $event[CcBillEventConstants::ORIGINAL_SUBSCRIPTION_ID] ?? null,
            $event[CcBillEventConstants::ORIGINAL_MERCHANT_ACCOUNT_NUMBER] ?? null,
            $event[CcBillEventConstants::ORIGINAL_MERCHANT_SUB_ACCOUNT_NUMBER] ?? null,
            $event[CcBillEventConstants::SOURCE] ?? null,
            $event[CcBillEventConstants::SUBSCRIPTION_ID] ?? null,
            $event[CcBillEventConstants::PRODUCT_DESCRIPTION] ?? null,
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
            $event[CcBillEventConstants::THREE_D_SECURE] ?? null
        );
    }

    public function getOriginalSubscriptionId(): ?string
    {
        return $this->originalSubscriptionId;
    }
    public function getOriginalMerchantAccnum(): ?string
    {
        return $this->originalMerchantAccnum;
    }

    public function getOriginalMerchantSubacc(): ?string
    {
        return $this->originalMerchantSubacc;
    }
    public function getSource(): ?string
    {
        return $this->source;
    }
}
