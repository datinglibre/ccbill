<?php

declare(strict_types=1);

namespace DatingLibre\CcBill\Event;

class CcBillEventConstants
{
    public const SUBSCRIPTION_ID = 'subscriptionId';
    public const TRANSACTION_ID = 'transactionId';
    public const PRICE = 'price';
    public const USERNAME = 'username';
    public const PASSWORD = 'password';
    public const CLIENT_ACCOUNT_NO = 'clientAccnum';
    public const CLIENT_SUB_ACCOUNT_NO = 'clientSubacc';
    public const EMAIL = 'email';
    public const NEXT_RENEWAL_DATE = 'nextRenewalDate';
    public const TIMESTAMP = 'timestamp';
    public const FIRSTNAME = 'firstName';
    public const LASTNAME = 'lastName';
    public const ADDRESS1 = 'address1';
    public const CITY = 'city';
    public const STATE = 'state';
    public const COUNTRY = 'country';
    public const POSTAL_CODE = 'postalCode';
    public const PHONE_NUMBER = 'phoneNumber';
    public const IP_ADDRESS = 'ipAddress';
    public const RESERVATION_ID = 'reservationId';
    public const FORM_NAME = 'formName';
    public const FLEX_ID = 'flexId';
    public const PRODUCT_DESCRIPTION = 'productDesc';
    public const PRICE_DESCRIPTION = 'priceDescription';
    public const RECURRING_PRICE_DESCRIPTION = 'recurringPriceDescription';
    public const BILLED_INITIAL_PRICE = 'billedInitialPrice';
    public const BILLED_RECURRING_PRICE = 'billedRecurringPrice';
    public const BILLED_CURRENCY_CODE = 'billedCurrencyCode';
    public const SUBSCRIPTION_INITIAL_PRICE = 'subscriptionInitialPrice';
    public const SUBSCRIPTION_RECURRING_PRICE = 'subscriptionRecurringPrice';
    public const SUBSCRIPTION_CURRENCY_CODE = 'subscriptionCurrencyCode';
    public const ACCOUNTING_INITIAL_PRICE = 'accountingInitialPrice';
    public const ACCOUNTING_RECURRING_PRICE = 'accountingRecurringPrice';
    public const ACCOUNTING_CURRENCY_CODE = 'accountingCurrencyCode';
    public const INITIAL_PERIOD = 'initialPeriod';
    public const RECURRING_PERIOD = 'recurringPeriod';
    public const REBILLS = 'rebills';
    public const SUBSCRIPTION_TYPE_ID = 'subscriptionTypeId';
    public const DYNAMIC_PRICING_VALIDATION_DIGEST = 'dynamicPricingValidationDigest';
    public const PAYMENT_TYPE = 'paymentType';
    public const CARD_TYPE = 'cardType';
    public const BIN = 'bin';
    public const PRE_PAID = 'prePaid';
    public const LAST_FOUR = 'last4';
    public const EXP_DATE = 'expDate';
    public const AVS_RESPONSE = 'avsResponse';
    public const CVV2_RESPONSE = 'cvv2Response';
    public const AFFILIATE_SYSTEM = 'affiliateSystem';
    public const REFERRING_URL = 'referringUrl';
    public const LIFETIME_SUBSCRIPTION = 'lifeTimeSubscription';
    public const LIFETIME_PRICE = 'lifeTimePrice';
    public const PAYMENT_ACCOUNT = 'paymentAccount';
    public const THREE_D_SECURE = 'threeDSecure';
    public const FAILURE_CODE = 'failureCode';
    public const FAILURE_REASON = 'failureReason';
    public const ORIGINAL_SUBSCRIPTION_ID = 'originalSubscriptionId';
    public const ORIGINAL_MERCHANT_ACCOUNT_NUMBER = 'originalMerchantAccnum';
    public const ORIGINAL_MERCHANT_SUB_ACCOUNT_NUMBER = 'originalMerchantSubacc';
    public const SOURCE = 'source';
    public const REASON = 'reason';
    public const BILLED_AMOUNT = 'billedAmount';
    public const BILLED_CURRENCY = 'billedCurrency';
    public const ACCOUNTING_AMOUNT = 'accountingAmount';
    public const ACCOUNTING_CURRENCY = 'accountingCurrency';
    public const RENEWAL_DATE = 'renewalDate';
    public const NEXT_RETRY_DATE = 'nextRetryDate';
    public const AMOUNT = 'amount';
    public const CURRENCY_CODE = 'currencyCode';
    public const CURRENCY = 'currency';
    public const CUSTOM_1 = 'X-custom1';
}
