<?php

declare(strict_types=1);

namespace DatingLibre\CcBill\Tests\Mapper;

use DatingLibre\CcBill\Event\BillingDateChangeEvent;
use DatingLibre\CcBill\Event\CancellationEvent;
use DatingLibre\CcBill\Event\CcBillEventConstants;
use DatingLibre\CcBill\Event\ChargebackEvent;
use DatingLibre\CcBill\Event\CustomerDataUpdate;
use DatingLibre\CcBill\Event\ExpirationEvent;
use DatingLibre\CcBill\Event\RefundEvent;
use DatingLibre\CcBill\Event\RenewalFailureEvent;
use DatingLibre\CcBill\Event\RenewalSuccessEvent;
use DatingLibre\CcBill\Event\ReturnEvent;
use DatingLibre\CcBill\Event\VoidEvent;
use DatingLibre\CcBill\Event\NewSaleFailureEvent;
use DatingLibre\CcBill\Event\NewSaleSuccessEvent;
use DatingLibre\CcBill\Event\UpgradeFailureEvent;
use DatingLibre\CcBill\Event\UpgradeSuccessEvent;
use DatingLibre\CcBill\Event\UserReactivationEvent;
use DatingLibre\CcBill\Mapper\CcBillEventMapper;
use PHPUnit\Framework\TestCase;

class CcbillEventMapperTest extends TestCase
{
    public const TEST_SUBSCRIPTION_ID = '1000000000';
    public const TEST_TRANSACTION_ID = '0912191101000000159';
    public const TEST_TIMESTAMP = '2012-08-05 15:18:17';
    public const TEST_PRICE = '5.95 for 30 days (non‐recurring)';
    public const TEST_USERNAME = 'username1';
    public const TEST_PASSWORD = 'mYPaSSw0rD';
    public const TEST_CLIENT_ACCOUNT_NO = '900100';
    public const TEST_CLIENT_SUB_ACCOUNT_NO = '0000';
    public const TEST_EMAIL = 'user@randomurl.com';
    public const TEST_NEXT_RENEWAL_DATE = '2012-08-20';
    public const TEST_FIRSTNAME = 'John';
    public const TEST_LASTNAME = 'Doe';
    public const TEST_ADDRESS_1 = '123 Main Street';
    public const TEST_CITY = 'Anytown';
    public const TEST_STATE = 'AZ';
    public const TEST_COUNTRY = 'US';
    public const TEST_POSTAL_CODE = '50115';
    public const TEST_PHONE_NUMBER = '	(515) 555-1212';
    public const TEST_IP_ADDRESS = '192.168.27.4';
    public const TEST_RESERVATION_ID = '0109072310330002423';
    public const TEST_FORM_NAME = '13cc';
    public const TEST_FLEX_ID = 'cb617dcc-8467-49ab-b3a7-735ce1d60ad9';
    public const TEST_PRODUCT_DESCRIPTION = 'Sample product description text.';
    public const TEST_PRICE_DESCRIPTION = '10.00(USD) for 10 days (trial) then 10.00(USD) recurring every 30 days';
    public const TEST_RECURRING_PRICE_DESCRIPTION = '22.22(USD) recurring every 30 days';
    public const TEST_BILLED_INITIAL_PRICE = '4.95';
    public const TEST_BILLED_RECURRING_PRICE = '19.95';
    public const TEST_BILLED_CURRENCY_CODE = '879';
    public const TEST_SUBSCRIPTION_INITIAL_PRICE = '4.99';
    public const TEST_SUBSCRIPTION_RECURRING_PRICE = '5.99';
    public const TEST_SUBSCRIPTION_CURRENCY_CODE = '978';
    public const TEST_ACCOUNTING_INITIAL_PRICE = '3.99';
    public const TEST_ACCOUNTING_RECURRING_PRICE = '9.99';
    public const TEST_ACCOUNTING_CURRENCY_CODE = '930';
    public const TEST_INITIAL_PERIOD = '7';
    public const TEST_RECURRING_PERIOD = '30';
    public const TEST_REBILLS = '12';
    public const TEST_SUBSCRIPTION_TYPE_ID = '0000060748';
    public const TEST_DYNAMIC_PRICING_VALIDATION_DIGEST = 's4f5198jgd21a4pk1p2s7sd23lm58937';
    public const TEST_PAYMENT_TYPE = 'CREDIT';
    public const TEST_CARD_TYPE = 'VISA';
    public const TEST_BIN = '510510';
    public const TEST_PRE_PAID = '0';
    public const TEST_LAST_4 = '5100';
    public const TEST_EXPIRY_DATE = '0217';
    public const TEST_AVS_RESPONSE = 'Y';
    public const TEST_CVV2_RESPONSE = 'M';
    public const TEST_AFFILIATE_SYSTEM = 'LTS';
    public const TEST_REFERRING_URL = 'http://www.referringurl.biz';
    public const TEST_LIFETIME_SUBSCRIPTION = '1';
    public const TEST_LIFETIME_PRICE = '40.25';
    public const TEST_PAYMENT_ACCOUNT = '57bc7327b5d721d7d20b240c0357e6ed';
    public const TEST_3_D_SECURE = 'AUTH_SUCCESS';
    public const TEST_FAILURE_REASON = 'Invalid Input.';
    public const TEST_FAILURE_CODE = 'BE-140';
    public const TEST_ORIGINAL_SUBSCRIPTION_ID = '0912187401000000099';
    public const TEST_ORIGINAL_MERCHANT_ACCOUNT_NUMBER = '900003';
    public const TEST_ORIGINAL_MERCHANT_SUB_ACCOUNT_NUMBER = '0005';
    public const TEST_SOURCE = 'FORM';
    public const TEST_ORIGINAL_CLIENT_ACCOUNT_NUMBER = '900003';
    public const TEST_ORIGINAL_CLIENT_SUB_ACCOUNT = '0005';
    public const TEST_CANCELLATION_REASON = 'Customer Refunded';
    public const TEST_BILLING_DATE_CHANGE = '2012-09-19';
    public const TEST_BILLED_AMOUNT = '4.95';
    public const TEST_BILLED_CURRENCY = 'USD';
    public const TEST_ACCOUNTING_AMOUNT = '4.99';
    public const TEST_ACCOUNTING_CURRENCY = 'USD';
    public const TEST_RENEWAL_DATE = '2012-08-19';
    public const TEST_NEXT_RETRY_DATE = '2012-08-20';
    public const TEST_REASON = 'Customer Refunded';
    public const TEST_AMOUNT = '4.95';
    public const TEST_CURRENCY_CODE = '978';
    public const TEST_CURRENCY = 'USD';
    public const TEST_CUSTOM1 = '9875356';

    private CcBillEventMapper $ccBillEventParser;

    public function testParsesUserReactivationEvent(): void
    {
        $this->assertEquals(CcBillEventMapper::mapEvent(UserReactivationEvent::NAME, [
            CcBillEventConstants::SUBSCRIPTION_ID => self::TEST_SUBSCRIPTION_ID,
            CcBillEventConstants::TRANSACTION_ID => self::TEST_TRANSACTION_ID,
            CcBillEventConstants::PRICE => self::TEST_PRICE,
            CcBillEventConstants::USERNAME => self::TEST_USERNAME,
            CcBillEventConstants::PASSWORD => self::TEST_PASSWORD,
            CcBillEventConstants::CLIENT_ACCOUNT_NO => self::TEST_CLIENT_ACCOUNT_NO,
            CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO => self::TEST_CLIENT_SUB_ACCOUNT_NO,
            CcBillEventConstants::EMAIL => self::TEST_EMAIL,
            CcBillEventConstants::NEXT_RENEWAL_DATE => self::TEST_NEXT_RENEWAL_DATE
        ]), new UserReactivationEvent(
            self::TEST_SUBSCRIPTION_ID,
            self::TEST_TRANSACTION_ID,
            self::TEST_PRICE,
            self::TEST_USERNAME,
            self::TEST_PASSWORD,
            self::TEST_CLIENT_ACCOUNT_NO,
            self::TEST_CLIENT_SUB_ACCOUNT_NO,
            self::TEST_EMAIL,
            self::TEST_NEXT_RENEWAL_DATE
        ));
    }

    public function testParsesNewSaleSuccessEvent(): void
    {
        $this->assertEquals(CcBillEventMapper::mapEvent(
            NewSaleSuccessEvent::NAME,
            $this->getSalePayload(
                [
                    CcBillEventConstants::SUBSCRIPTION_ID => self::TEST_SUBSCRIPTION_ID,
                    CcBillEventConstants::PRODUCT_DESCRIPTION => self::TEST_PRODUCT_DESCRIPTION
                ]
            )
        ), new NewSaleSuccessEvent(
            self::TEST_SUBSCRIPTION_ID,
            self::TEST_PRODUCT_DESCRIPTION,
            self::TEST_TRANSACTION_ID,
            self::TEST_CLIENT_ACCOUNT_NO,
            self::TEST_CLIENT_SUB_ACCOUNT_NO,
            self::TEST_TIMESTAMP,
            self::TEST_FIRSTNAME,
            self::TEST_LASTNAME,
            self::TEST_ADDRESS_1,
            self::TEST_CITY,
            self::TEST_STATE,
            self::TEST_COUNTRY,
            self::TEST_POSTAL_CODE,
            self::TEST_EMAIL,
            self::TEST_PHONE_NUMBER,
            self::TEST_IP_ADDRESS,
            self::TEST_RESERVATION_ID,
            self::TEST_USERNAME,
            self::TEST_PASSWORD,
            self::TEST_FORM_NAME,
            self::TEST_FLEX_ID,
            self::TEST_PRICE_DESCRIPTION,
            self::TEST_RECURRING_PRICE_DESCRIPTION,
            self::TEST_BILLED_INITIAL_PRICE,
            self::TEST_BILLED_RECURRING_PRICE,
            self::TEST_BILLED_CURRENCY_CODE,
            self::TEST_SUBSCRIPTION_INITIAL_PRICE,
            self::TEST_SUBSCRIPTION_RECURRING_PRICE,
            self::TEST_SUBSCRIPTION_CURRENCY_CODE,
            self::TEST_ACCOUNTING_INITIAL_PRICE,
            self::TEST_ACCOUNTING_RECURRING_PRICE,
            self::TEST_ACCOUNTING_CURRENCY_CODE,
            self::TEST_INITIAL_PERIOD,
            self::TEST_RECURRING_PERIOD,
            self::TEST_REBILLS,
            self::TEST_NEXT_RENEWAL_DATE,
            self::TEST_SUBSCRIPTION_TYPE_ID,
            self::TEST_DYNAMIC_PRICING_VALIDATION_DIGEST,
            self::TEST_PAYMENT_TYPE,
            self::TEST_CARD_TYPE,
            self::TEST_BIN,
            self::TEST_PRE_PAID,
            self::TEST_LAST_4,
            self::TEST_EXPIRY_DATE,
            self::TEST_AVS_RESPONSE,
            self::TEST_CVV2_RESPONSE,
            self::TEST_AFFILIATE_SYSTEM,
            self::TEST_REFERRING_URL,
            self::TEST_LIFETIME_SUBSCRIPTION,
            self::TEST_LIFETIME_PRICE,
            self::TEST_PAYMENT_ACCOUNT,
            self::TEST_3_D_SECURE,
            self::TEST_CUSTOM1
        ));
    }

    public function testParsesUpgradeSuccessEvent(): void
    {
        $this->assertEquals(CcBillEventMapper::mapEvent(
            UpgradeSuccessEvent::NAME,
            $this->getSalePayload(
                [
                    CcBillEventConstants::ORIGINAL_SUBSCRIPTION_ID => self::TEST_ORIGINAL_SUBSCRIPTION_ID,
                    CcBillEventConstants::ORIGINAL_MERCHANT_ACCOUNT_NUMBER => self::TEST_ORIGINAL_MERCHANT_ACCOUNT_NUMBER,
                    CcBillEventConstants::ORIGINAL_MERCHANT_SUB_ACCOUNT_NUMBER => self::TEST_ORIGINAL_MERCHANT_SUB_ACCOUNT_NUMBER,
                    CcBillEventConstants::SOURCE => self::TEST_SOURCE,
                    CcBillEventConstants::SUBSCRIPTION_ID => self::TEST_SUBSCRIPTION_ID,
                    CcBillEventConstants::PRODUCT_DESCRIPTION => self::TEST_PRODUCT_DESCRIPTION
                ]
            )
        ), new UpgradeSuccessEvent(
            self::TEST_ORIGINAL_SUBSCRIPTION_ID,
            self::TEST_ORIGINAL_MERCHANT_ACCOUNT_NUMBER,
            self::TEST_ORIGINAL_MERCHANT_SUB_ACCOUNT_NUMBER,
            self::TEST_SOURCE,
            self::TEST_SUBSCRIPTION_ID,
            self::TEST_PRODUCT_DESCRIPTION,
            self::TEST_TRANSACTION_ID,
            self::TEST_CLIENT_ACCOUNT_NO,
            self::TEST_CLIENT_SUB_ACCOUNT_NO,
            self::TEST_TIMESTAMP,
            self::TEST_FIRSTNAME,
            self::TEST_LASTNAME,
            self::TEST_ADDRESS_1,
            self::TEST_CITY,
            self::TEST_STATE,
            self::TEST_COUNTRY,
            self::TEST_POSTAL_CODE,
            self::TEST_EMAIL,
            self::TEST_PHONE_NUMBER,
            self::TEST_IP_ADDRESS,
            self::TEST_RESERVATION_ID,
            self::TEST_USERNAME,
            self::TEST_PASSWORD,
            self::TEST_FORM_NAME,
            self::TEST_FLEX_ID,
            self::TEST_PRICE_DESCRIPTION,
            self::TEST_RECURRING_PRICE_DESCRIPTION,
            self::TEST_BILLED_INITIAL_PRICE,
            self::TEST_BILLED_RECURRING_PRICE,
            self::TEST_BILLED_CURRENCY_CODE,
            self::TEST_SUBSCRIPTION_INITIAL_PRICE,
            self::TEST_SUBSCRIPTION_RECURRING_PRICE,
            self::TEST_SUBSCRIPTION_CURRENCY_CODE,
            self::TEST_ACCOUNTING_INITIAL_PRICE,
            self::TEST_ACCOUNTING_RECURRING_PRICE,
            self::TEST_ACCOUNTING_CURRENCY_CODE,
            self::TEST_INITIAL_PERIOD,
            self::TEST_RECURRING_PERIOD,
            self::TEST_REBILLS,
            self::TEST_NEXT_RENEWAL_DATE,
            self::TEST_SUBSCRIPTION_TYPE_ID,
            self::TEST_DYNAMIC_PRICING_VALIDATION_DIGEST,
            self::TEST_PAYMENT_TYPE,
            self::TEST_CARD_TYPE,
            self::TEST_BIN,
            self::TEST_PRE_PAID,
            self::TEST_LAST_4,
            self::TEST_EXPIRY_DATE,
            self::TEST_AVS_RESPONSE,
            self::TEST_CVV2_RESPONSE,
            self::TEST_AFFILIATE_SYSTEM,
            self::TEST_REFERRING_URL,
            self::TEST_LIFETIME_SUBSCRIPTION,
            self::TEST_LIFETIME_PRICE,
            self::TEST_PAYMENT_ACCOUNT,
            self::TEST_3_D_SECURE
        ));
    }

    public function testParsesNewSaleFailureEvent(): void
    {
        $this->assertEquals(
            CcBillEventMapper::mapEvent(
                NewSaleFailureEvent::NAME,
                $this->getSalePayload(
                    [
                    CcBillEventConstants::FAILURE_REASON => self::TEST_FAILURE_REASON,
                    CcBillEventConstants::FAILURE_CODE => self::TEST_FAILURE_CODE
                ]
                )
            ),
            new NewSaleFailureEvent(
                self::TEST_FAILURE_REASON,
                self::TEST_FAILURE_CODE,
                self::TEST_TRANSACTION_ID,
                self::TEST_CLIENT_ACCOUNT_NO,
                self::TEST_CLIENT_SUB_ACCOUNT_NO,
                self::TEST_TIMESTAMP,
                self::TEST_FIRSTNAME,
                self::TEST_LASTNAME,
                self::TEST_ADDRESS_1,
                self::TEST_CITY,
                self::TEST_STATE,
                self::TEST_COUNTRY,
                self::TEST_POSTAL_CODE,
                self::TEST_EMAIL,
                self::TEST_PHONE_NUMBER,
                self::TEST_IP_ADDRESS,
                self::TEST_RESERVATION_ID,
                self::TEST_USERNAME,
                self::TEST_PASSWORD,
                self::TEST_FORM_NAME,
                self::TEST_FLEX_ID,
                self::TEST_PRICE_DESCRIPTION,
                self::TEST_RECURRING_PRICE_DESCRIPTION,
                self::TEST_BILLED_INITIAL_PRICE,
                self::TEST_BILLED_RECURRING_PRICE,
                self::TEST_BILLED_CURRENCY_CODE,
                self::TEST_SUBSCRIPTION_INITIAL_PRICE,
                self::TEST_SUBSCRIPTION_RECURRING_PRICE,
                self::TEST_SUBSCRIPTION_CURRENCY_CODE,
                self::TEST_ACCOUNTING_INITIAL_PRICE,
                self::TEST_ACCOUNTING_RECURRING_PRICE,
                self::TEST_ACCOUNTING_CURRENCY_CODE,
                self::TEST_INITIAL_PERIOD,
                self::TEST_RECURRING_PERIOD,
                self::TEST_REBILLS,
                self::TEST_NEXT_RENEWAL_DATE,
                self::TEST_SUBSCRIPTION_TYPE_ID,
                self::TEST_DYNAMIC_PRICING_VALIDATION_DIGEST,
                self::TEST_PAYMENT_TYPE,
                self::TEST_CARD_TYPE,
                self::TEST_BIN,
                self::TEST_PRE_PAID,
                self::TEST_LAST_4,
                self::TEST_EXPIRY_DATE,
                self::TEST_AVS_RESPONSE,
                self::TEST_CVV2_RESPONSE,
                self::TEST_AFFILIATE_SYSTEM,
                self::TEST_REFERRING_URL,
                self::TEST_LIFETIME_SUBSCRIPTION,
                self::TEST_LIFETIME_PRICE,
                self::TEST_PAYMENT_ACCOUNT,
                self::TEST_3_D_SECURE,
                self::TEST_CUSTOM1
            )
        );
    }

    public function testParsesUpgradeFailureEvent(): void
    {
        $this->assertEquals(CcBillEventMapper::mapEvent(
            UpgradeFailureEvent::NAME,
            $this->getSalePayload(
                [
                    CcBillEventConstants::ORIGINAL_SUBSCRIPTION_ID => self::TEST_ORIGINAL_SUBSCRIPTION_ID,
                    CcBillEventConstants::ORIGINAL_MERCHANT_ACCOUNT_NUMBER => self::TEST_ORIGINAL_MERCHANT_ACCOUNT_NUMBER,
                    CcBillEventConstants::ORIGINAL_MERCHANT_SUB_ACCOUNT_NUMBER => self::TEST_ORIGINAL_MERCHANT_SUB_ACCOUNT_NUMBER,
                    CcBillEventConstants::SOURCE => self::TEST_SOURCE,
                    CcBillEventConstants::FAILURE_REASON => self::TEST_FAILURE_REASON,
                    CcBillEventConstants::FAILURE_CODE => self::TEST_FAILURE_CODE
                ]
            )
        ), new UpgradeFailureEvent(
            self::TEST_ORIGINAL_SUBSCRIPTION_ID,
            self::TEST_ORIGINAL_MERCHANT_ACCOUNT_NUMBER,
            self::TEST_ORIGINAL_MERCHANT_SUB_ACCOUNT_NUMBER,
            self::TEST_SOURCE,
            self::TEST_FAILURE_REASON,
            self::TEST_FAILURE_CODE,
            self::TEST_TRANSACTION_ID,
            self::TEST_CLIENT_ACCOUNT_NO,
            self::TEST_CLIENT_SUB_ACCOUNT_NO,
            self::TEST_TIMESTAMP,
            self::TEST_FIRSTNAME,
            self::TEST_LASTNAME,
            self::TEST_ADDRESS_1,
            self::TEST_CITY,
            self::TEST_STATE,
            self::TEST_COUNTRY,
            self::TEST_POSTAL_CODE,
            self::TEST_EMAIL,
            self::TEST_PHONE_NUMBER,
            self::TEST_IP_ADDRESS,
            self::TEST_RESERVATION_ID,
            self::TEST_USERNAME,
            self::TEST_PASSWORD,
            self::TEST_FORM_NAME,
            self::TEST_FLEX_ID,
            self::TEST_PRICE_DESCRIPTION,
            self::TEST_RECURRING_PRICE_DESCRIPTION,
            self::TEST_BILLED_INITIAL_PRICE,
            self::TEST_BILLED_RECURRING_PRICE,
            self::TEST_BILLED_CURRENCY_CODE,
            self::TEST_SUBSCRIPTION_INITIAL_PRICE,
            self::TEST_SUBSCRIPTION_RECURRING_PRICE,
            self::TEST_SUBSCRIPTION_CURRENCY_CODE,
            self::TEST_ACCOUNTING_INITIAL_PRICE,
            self::TEST_ACCOUNTING_RECURRING_PRICE,
            self::TEST_ACCOUNTING_CURRENCY_CODE,
            self::TEST_INITIAL_PERIOD,
            self::TEST_RECURRING_PERIOD,
            self::TEST_REBILLS,
            self::TEST_NEXT_RENEWAL_DATE,
            self::TEST_SUBSCRIPTION_TYPE_ID,
            self::TEST_DYNAMIC_PRICING_VALIDATION_DIGEST,
            self::TEST_PAYMENT_TYPE,
            self::TEST_CARD_TYPE,
            self::TEST_BIN,
            self::TEST_PRE_PAID,
            self::TEST_LAST_4,
            self::TEST_EXPIRY_DATE,
            self::TEST_AVS_RESPONSE,
            self::TEST_CVV2_RESPONSE,
            self::TEST_AFFILIATE_SYSTEM,
            self::TEST_REFERRING_URL,
            self::TEST_LIFETIME_SUBSCRIPTION,
            self::TEST_LIFETIME_PRICE,
            self::TEST_PAYMENT_ACCOUNT,
            self::TEST_3_D_SECURE,
            self::TEST_CUSTOM1
        ));
    }

    public function testParsesCancellationEvent(): void
    {
        $this->assertEquals(
            CcBillEventMapper::mapEvent(
                CancellationEvent::NAME,
                [
                CcBillEventConstants::SUBSCRIPTION_ID => self::TEST_SUBSCRIPTION_ID,
                CcBillEventConstants::CLIENT_ACCOUNT_NO => self::TEST_CLIENT_ACCOUNT_NO,
                CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO => self::TEST_CLIENT_SUB_ACCOUNT_NO,
                CcBillEventConstants::TIMESTAMP => self::TEST_TIMESTAMP,
                CcBillEventConstants::REASON => self::TEST_CANCELLATION_REASON,
                CcBillEventConstants::SOURCE => self::TEST_SOURCE
            ]
            ),
            new CancellationEvent(
                self::TEST_SUBSCRIPTION_ID,
                self::TEST_CLIENT_ACCOUNT_NO,
                self::TEST_CLIENT_SUB_ACCOUNT_NO,
                self::TEST_TIMESTAMP,
                self::TEST_CANCELLATION_REASON,
                self::TEST_SOURCE
            )
        );
    }

    public function testParsesExpirationEvent(): void
    {
        $this->assertEquals(
            CcBillEventMapper::mapEvent(
                ExpirationEvent::NAME,
                [
                CcBillEventConstants::SUBSCRIPTION_ID => self::TEST_SUBSCRIPTION_ID,
                CcBillEventConstants::CLIENT_ACCOUNT_NO => self::TEST_CLIENT_ACCOUNT_NO,
                CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO => self::TEST_CLIENT_SUB_ACCOUNT_NO,
                CcBillEventConstants::TIMESTAMP => self::TEST_TIMESTAMP
            ]
            ),
            new ExpirationEvent(
                self::TEST_SUBSCRIPTION_ID,
                self::TEST_CLIENT_ACCOUNT_NO,
                self::TEST_CLIENT_SUB_ACCOUNT_NO,
                self::TEST_TIMESTAMP
            )
        );
    }

    public function testParsesCustomerDataUpdate(): void
    {
        $this->assertEquals(CcBillEventMapper::mapEvent(
            CustomerDataUpdate::NAME,
            [
                CcBillEventConstants::SUBSCRIPTION_ID => self::TEST_SUBSCRIPTION_ID,
                CcBillEventConstants::CLIENT_ACCOUNT_NO => self::TEST_CLIENT_ACCOUNT_NO,
                CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO => self::TEST_CLIENT_SUB_ACCOUNT_NO,
                CcBillEventConstants::TIMESTAMP => self::TEST_TIMESTAMP,
                CcBillEventConstants::FIRSTNAME => self::TEST_FIRSTNAME,
                CcBillEventConstants::LASTNAME => self::TEST_LASTNAME,
                CcBillEventConstants::PAYMENT_ACCOUNT => self::TEST_PAYMENT_ACCOUNT,
                CcBillEventConstants::ADDRESS1 => self::TEST_ADDRESS_1,
                CcBillEventConstants::CITY => self::TEST_CITY,
                CcBillEventConstants::STATE => self::TEST_STATE,
                CcBillEventConstants::COUNTRY => self::TEST_COUNTRY,
                CcBillEventConstants::POSTAL_CODE => self::TEST_POSTAL_CODE,
                CcBillEventConstants::EMAIL => self::TEST_EMAIL,
                CcBillEventConstants::PHONE_NUMBER => self::TEST_PHONE_NUMBER,
                CcBillEventConstants::IP_ADDRESS => self::TEST_IP_ADDRESS,
                CcBillEventConstants::RESERVATION_ID => self::TEST_RESERVATION_ID,
                CcBillEventConstants::USERNAME => self::TEST_USERNAME,
                CcBillEventConstants::PASSWORD => self::TEST_PASSWORD,
                CcBillEventConstants::PAYMENT_TYPE => self::TEST_PAYMENT_TYPE,
                CcBillEventConstants::CARD_TYPE => self::TEST_CARD_TYPE,
                CcBillEventConstants::BIN => self::TEST_BIN,
                CcBillEventConstants::EXP_DATE => self::TEST_EXPIRY_DATE
            ]
        ), new CustomerDataUpdate(
            self::TEST_SUBSCRIPTION_ID,
            self::TEST_CLIENT_ACCOUNT_NO,
            self::TEST_CLIENT_SUB_ACCOUNT_NO,
            self::TEST_TIMESTAMP,
            self::TEST_FIRSTNAME,
            self::TEST_LASTNAME,
            self::TEST_PAYMENT_ACCOUNT,
            self::TEST_ADDRESS_1,
            self::TEST_CITY,
            self::TEST_STATE,
            self::TEST_COUNTRY,
            self::TEST_POSTAL_CODE,
            self::TEST_EMAIL,
            self::TEST_PHONE_NUMBER,
            self::TEST_IP_ADDRESS,
            self::TEST_RESERVATION_ID,
            self::TEST_USERNAME,
            self::TEST_PASSWORD,
            self::TEST_PAYMENT_TYPE,
            self::TEST_CARD_TYPE,
            self::TEST_BIN,
            self::TEST_EXPIRY_DATE
        ));
    }

    public function testParsesBillingDateChange(): void
    {
        $this->assertEquals(CcBillEventMapper::mapEvent(
            BillingDateChangeEvent::NAME,
            [
                CcBillEventConstants::SUBSCRIPTION_ID => self::TEST_SUBSCRIPTION_ID,
                CcBillEventConstants::CLIENT_ACCOUNT_NO => self::TEST_CLIENT_ACCOUNT_NO,
                CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO => self::TEST_CLIENT_SUB_ACCOUNT_NO,
                CcBillEventConstants::TIMESTAMP => self::TEST_TIMESTAMP,
                CcBillEventConstants::NEXT_RENEWAL_DATE => self::TEST_NEXT_RENEWAL_DATE
            ]
        ), new BillingDateChangeEvent(
            self::TEST_SUBSCRIPTION_ID,
            self::TEST_CLIENT_ACCOUNT_NO,
            self::TEST_CLIENT_SUB_ACCOUNT_NO,
            self::TEST_TIMESTAMP,
            self::TEST_NEXT_RENEWAL_DATE
        ));
    }

    public function testParsesRenewalSuccessEvent(): void
    {
        $this->assertEquals(
            CcBillEventMapper::mapEvent(
                RenewalSuccessEvent::NAME,
                [
                CcBillEventConstants::TRANSACTION_ID => self::TEST_TRANSACTION_ID,
                CcBillEventConstants::SUBSCRIPTION_ID => self::TEST_SUBSCRIPTION_ID,
                CcBillEventConstants::CLIENT_ACCOUNT_NO => self::TEST_CLIENT_ACCOUNT_NO,
                CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO => self::TEST_CLIENT_SUB_ACCOUNT_NO,
                CcBillEventConstants::TIMESTAMP => self::TEST_TIMESTAMP,
                CcBillEventConstants::BILLED_AMOUNT => self::TEST_BILLED_AMOUNT,
                CcBillEventConstants::BILLED_CURRENCY => self::TEST_BILLED_CURRENCY,
                CcBillEventConstants::BILLED_CURRENCY_CODE => self::TEST_BILLED_CURRENCY_CODE,
                CcBillEventConstants::ACCOUNTING_AMOUNT => self::TEST_ACCOUNTING_AMOUNT,
                CcBillEventConstants::ACCOUNTING_CURRENCY => self::TEST_ACCOUNTING_CURRENCY,
                CcBillEventConstants::ACCOUNTING_CURRENCY_CODE => self::TEST_ACCOUNTING_CURRENCY_CODE,
                CcBillEventConstants::NEXT_RENEWAL_DATE => self::TEST_NEXT_RENEWAL_DATE,
                CcBillEventConstants::RENEWAL_DATE => self::TEST_RENEWAL_DATE,
                CcBillEventConstants::CARD_TYPE => self::TEST_CARD_TYPE,
                CcBillEventConstants::PAYMENT_ACCOUNT => self::TEST_PAYMENT_ACCOUNT,
                CcBillEventConstants::PAYMENT_TYPE => self::TEST_PAYMENT_TYPE,
                CcBillEventConstants::LAST_FOUR => self::TEST_LAST_4,
                CcBillEventConstants::EXP_DATE => self::TEST_EXPIRY_DATE
            ]
            ),
            new RenewalSuccessEvent(
                self::TEST_TRANSACTION_ID,
                self::TEST_SUBSCRIPTION_ID,
                self::TEST_CLIENT_ACCOUNT_NO,
                self::TEST_CLIENT_SUB_ACCOUNT_NO,
                self::TEST_TIMESTAMP,
                self::TEST_BILLED_AMOUNT,
                self::TEST_BILLED_CURRENCY,
                self::TEST_BILLED_CURRENCY_CODE,
                self::TEST_ACCOUNTING_AMOUNT,
                self::TEST_ACCOUNTING_CURRENCY,
                self::TEST_ACCOUNTING_CURRENCY_CODE,
                self::TEST_NEXT_RENEWAL_DATE,
                self::TEST_RENEWAL_DATE,
                self::TEST_CARD_TYPE,
                self::TEST_PAYMENT_ACCOUNT,
                self::TEST_PAYMENT_TYPE,
                self::TEST_LAST_4,
                self::TEST_EXPIRY_DATE
            )
        );
    }

    public function testParsesRenewalFailureEvent(): void
    {
        $this->assertEquals(CcBillEventMapper::mapEvent(
            RenewalFailureEvent::NAME,
            [
                CcBillEventConstants::TRANSACTION_ID => self::TEST_TRANSACTION_ID,
                CcBillEventConstants::SUBSCRIPTION_ID => self::TEST_SUBSCRIPTION_ID,
                CcBillEventConstants::CLIENT_ACCOUNT_NO => self::TEST_CLIENT_ACCOUNT_NO,
                CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO => self::TEST_CLIENT_SUB_ACCOUNT_NO,
                CcBillEventConstants::TIMESTAMP => self::TEST_TIMESTAMP,
                CcBillEventConstants::FAILURE_REASON => self::TEST_FAILURE_REASON,
                CcBillEventConstants::FAILURE_CODE => self::TEST_FAILURE_CODE,
                CcBillEventConstants::NEXT_RETRY_DATE => self::TEST_NEXT_RETRY_DATE,
                CcBillEventConstants::RENEWAL_DATE => self::TEST_RENEWAL_DATE,
                CcBillEventConstants::CARD_TYPE => self::TEST_CARD_TYPE,
                CcBillEventConstants::PAYMENT_TYPE => self::TEST_PAYMENT_TYPE
            ]
        ), new RenewalFailureEvent(
            self::TEST_TRANSACTION_ID,
            self::TEST_SUBSCRIPTION_ID,
            self::TEST_CLIENT_ACCOUNT_NO,
            self::TEST_CLIENT_SUB_ACCOUNT_NO,
            self::TEST_TIMESTAMP,
            self::TEST_FAILURE_REASON,
            self::TEST_FAILURE_CODE,
            self::TEST_NEXT_RETRY_DATE,
            self::TEST_RENEWAL_DATE,
            self::TEST_CARD_TYPE,
            self::TEST_PAYMENT_TYPE
        ));
    }

    public function testParsesChargebackEvent(): void
    {
        $this->assertEquals(CcBillEventMapper::mapEvent(
            ChargebackEvent::NAME,
            [
                CcBillEventConstants::TRANSACTION_ID => self::TEST_TRANSACTION_ID,
                CcBillEventConstants::SUBSCRIPTION_ID => self::TEST_SUBSCRIPTION_ID,
                CcBillEventConstants::CLIENT_ACCOUNT_NO => self::TEST_CLIENT_ACCOUNT_NO,
                CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO => self::TEST_CLIENT_SUB_ACCOUNT_NO,
                CcBillEventConstants::TIMESTAMP => self::TEST_TIMESTAMP,
                CcBillEventConstants::AMOUNT => self::TEST_AMOUNT,
                CcBillEventConstants::CARD_TYPE => self::TEST_CARD_TYPE,
                CcBillEventConstants::PAYMENT_ACCOUNT => self::TEST_PAYMENT_ACCOUNT,
                CcBillEventConstants::PAYMENT_TYPE => self::TEST_PAYMENT_TYPE,
                CcBillEventConstants::BIN => self::TEST_BIN,
                CcBillEventConstants::LAST_FOUR => self::TEST_LAST_4,
                CcBillEventConstants::EXP_DATE => self::TEST_EXPIRY_DATE,
                CcBillEventConstants::REASON => self::TEST_REASON
            ]
        ), new ChargebackEvent(
            self::TEST_TRANSACTION_ID,
            self::TEST_SUBSCRIPTION_ID,
            self::TEST_CLIENT_ACCOUNT_NO,
            self::TEST_CLIENT_SUB_ACCOUNT_NO,
            self::TEST_TIMESTAMP,
            self::TEST_AMOUNT,
            self::TEST_CARD_TYPE,
            self::TEST_PAYMENT_ACCOUNT,
            self::TEST_PAYMENT_TYPE,
            self::TEST_BIN,
            self::TEST_LAST_4,
            self::TEST_EXPIRY_DATE,
            self::TEST_REASON
        ));
    }

    public function testParsesReturnEvent(): void
    {
        $this->assertEquals(CcBillEventMapper::mapEvent(
            ReturnEvent::NAME,
            [
                CcBillEventConstants::TRANSACTION_ID => self::TEST_TRANSACTION_ID,
                CcBillEventConstants::SUBSCRIPTION_ID => self::TEST_SUBSCRIPTION_ID,
                CcBillEventConstants::CLIENT_ACCOUNT_NO => self::TEST_CLIENT_ACCOUNT_NO,
                CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO => self::TEST_CLIENT_SUB_ACCOUNT_NO,
                CcBillEventConstants::TIMESTAMP => self::TEST_TIMESTAMP,
                CcBillEventConstants::AMOUNT => self::TEST_AMOUNT,
                CcBillEventConstants::CURRENCY_CODE => self::TEST_CURRENCY_CODE,
                CcBillEventConstants::ACCOUNTING_AMOUNT => self::TEST_ACCOUNTING_AMOUNT,
                CcBillEventConstants::ACCOUNTING_CURRENCY_CODE => self::TEST_ACCOUNTING_CURRENCY_CODE,
                CcBillEventConstants::PAYMENT_ACCOUNT => self::TEST_PAYMENT_ACCOUNT,
                CcBillEventConstants::PAYMENT_TYPE => self::TEST_PAYMENT_TYPE,
                CcBillEventConstants::LAST_FOUR => self::TEST_LAST_4,
                CcBillEventConstants::REASON => self::TEST_REASON
            ]
        ), new ReturnEvent(
            self::TEST_TRANSACTION_ID,
            self::TEST_SUBSCRIPTION_ID,
            self::TEST_CLIENT_ACCOUNT_NO,
            self::TEST_CLIENT_SUB_ACCOUNT_NO,
            self::TEST_TIMESTAMP,
            self::TEST_AMOUNT,
            self::TEST_CURRENCY_CODE,
            self::TEST_ACCOUNTING_AMOUNT,
            self::TEST_ACCOUNTING_CURRENCY_CODE,
            self::TEST_PAYMENT_ACCOUNT,
            self::TEST_PAYMENT_TYPE,
            self::TEST_LAST_4,
            self::TEST_REASON
        ));
    }

    public function testParsesRefundEvent(): void
    {
        $this->assertEquals(CcBillEventMapper::mapEvent(
            RefundEvent::NAME,
            [
                CcBillEventConstants::TRANSACTION_ID => self::TEST_TRANSACTION_ID,
                CcBillEventConstants::SUBSCRIPTION_ID => self::TEST_SUBSCRIPTION_ID,
                CcBillEventConstants::CLIENT_ACCOUNT_NO => self::TEST_CLIENT_ACCOUNT_NO,
                CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO => self::TEST_CLIENT_SUB_ACCOUNT_NO,
                CcBillEventConstants::TIMESTAMP => self::TEST_TIMESTAMP,
                CcBillEventConstants::AMOUNT => self::TEST_AMOUNT,
                CcBillEventConstants::ACCOUNTING_CURRENCY => self::TEST_ACCOUNTING_CURRENCY,
                CcBillEventConstants::CURRENCY => self::TEST_CURRENCY,
                CcBillEventConstants::CURRENCY_CODE => self::TEST_CURRENCY_CODE,
                CcBillEventConstants::ACCOUNTING_AMOUNT => self::TEST_ACCOUNTING_AMOUNT,
                CcBillEventConstants::ACCOUNTING_CURRENCY_CODE => self::TEST_ACCOUNTING_CURRENCY_CODE,
                CcBillEventConstants::CARD_TYPE => self::TEST_CARD_TYPE,
                CcBillEventConstants::PAYMENT_ACCOUNT => self::TEST_PAYMENT_ACCOUNT,
                CcBillEventConstants::PAYMENT_TYPE => self::TEST_PAYMENT_TYPE,
                CcBillEventConstants::LAST_FOUR => self::TEST_LAST_4,
                CcBillEventConstants::EXP_DATE => self::TEST_EXPIRY_DATE,
                CcBillEventConstants::REASON => self::TEST_REASON
            ]
        ), new RefundEvent(
            self::TEST_TRANSACTION_ID,
            self::TEST_SUBSCRIPTION_ID,
            self::TEST_CLIENT_ACCOUNT_NO,
            self::TEST_CLIENT_SUB_ACCOUNT_NO,
            self::TEST_TIMESTAMP,
            self::TEST_AMOUNT,
            self::TEST_ACCOUNTING_CURRENCY,
            self::TEST_CURRENCY,
            self::TEST_CURRENCY_CODE,
            self::TEST_ACCOUNTING_AMOUNT,
            self::TEST_ACCOUNTING_CURRENCY_CODE,
            self::TEST_CARD_TYPE,
            self::TEST_PAYMENT_ACCOUNT,
            self::TEST_PAYMENT_TYPE,
            self::TEST_LAST_4,
            self::TEST_EXPIRY_DATE,
            self::TEST_REASON
        ));
    }

    public function testParsesVoidEvent(): void
    {
        $this->assertEquals(CcBillEventMapper::mapEvent(
            VoidEvent::NAME,
            [
                CcBillEventConstants::TRANSACTION_ID => self::TEST_TRANSACTION_ID,
                CcBillEventConstants::SUBSCRIPTION_ID => self::TEST_SUBSCRIPTION_ID,
                CcBillEventConstants::CLIENT_ACCOUNT_NO => self::TEST_CLIENT_ACCOUNT_NO,
                CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO => self::TEST_CLIENT_SUB_ACCOUNT_NO,
                CcBillEventConstants::TIMESTAMP => self::TEST_TIMESTAMP,
                CcBillEventConstants::AMOUNT => self::TEST_AMOUNT,
                CcBillEventConstants::CURRENCY => self::TEST_CURRENCY,
                CcBillEventConstants::CURRENCY_CODE => self::TEST_CURRENCY_CODE,
                CcBillEventConstants::ACCOUNTING_AMOUNT => self::TEST_ACCOUNTING_AMOUNT,
                CcBillEventConstants::ACCOUNTING_CURRENCY => self::TEST_ACCOUNTING_CURRENCY,
                CcBillEventConstants::ACCOUNTING_CURRENCY_CODE => self::TEST_ACCOUNTING_CURRENCY_CODE,
                CcBillEventConstants::CARD_TYPE => self::TEST_CARD_TYPE,
                CcBillEventConstants::PAYMENT_ACCOUNT => self::TEST_PAYMENT_ACCOUNT,
                CcBillEventConstants::PAYMENT_TYPE => self::TEST_PAYMENT_TYPE,
                CcBillEventConstants::LAST_FOUR => self::TEST_LAST_4,
                CcBillEventConstants::EXP_DATE => self::TEST_EXPIRY_DATE,
                CcBillEventConstants::REASON => self::TEST_REASON
            ]
        ), new VoidEvent(
            self::TEST_TRANSACTION_ID,
            self::TEST_SUBSCRIPTION_ID,
            self::TEST_CLIENT_ACCOUNT_NO,
            self::TEST_CLIENT_SUB_ACCOUNT_NO,
            self::TEST_TIMESTAMP,
            self::TEST_AMOUNT,
            self::TEST_CURRENCY,
            self::TEST_CURRENCY_CODE,
            self::TEST_ACCOUNTING_AMOUNT,
            self::TEST_ACCOUNTING_CURRENCY,
            self::TEST_ACCOUNTING_CURRENCY_CODE,
            self::TEST_CARD_TYPE,
            self::TEST_PAYMENT_ACCOUNT,
            self::TEST_PAYMENT_TYPE,
            self::TEST_LAST_4,
            self::TEST_EXPIRY_DATE,
            self::TEST_REASON
        ));
    }

    public function getSalePayload(array $merge): array
    {
        return array_merge([
            CcBillEventConstants::TRANSACTION_ID => self::TEST_TRANSACTION_ID,
            CcBillEventConstants::CLIENT_ACCOUNT_NO => self::TEST_CLIENT_ACCOUNT_NO,
            CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO => self::TEST_CLIENT_SUB_ACCOUNT_NO,
            CcBillEventConstants::TIMESTAMP => self::TEST_TIMESTAMP,
            CcBillEventConstants::FIRSTNAME => self::TEST_FIRSTNAME,
            CcBillEventConstants::LASTNAME => self::TEST_LASTNAME,
            CcBillEventConstants::ADDRESS1 => self::TEST_ADDRESS_1,
            CcBillEventConstants::CITY => self::TEST_CITY,
            CcBillEventConstants::STATE => self::TEST_STATE,
            CcBillEventConstants::COUNTRY => self::TEST_COUNTRY,
            CcBillEventConstants::POSTAL_CODE => self::TEST_POSTAL_CODE,
            CcBillEventConstants::EMAIL => self::TEST_EMAIL,
            CcBillEventConstants::PHONE_NUMBER => self::TEST_PHONE_NUMBER,
            CcBillEventConstants::IP_ADDRESS => self::TEST_IP_ADDRESS,
            CcBillEventConstants::RESERVATION_ID => self::TEST_RESERVATION_ID,
            CcBillEventConstants::USERNAME => self::TEST_USERNAME,
            CcBillEventConstants::PASSWORD => self::TEST_PASSWORD,
            CcBillEventConstants::FORM_NAME => self::TEST_FORM_NAME,
            CcBillEventConstants::FLEX_ID => self::TEST_FLEX_ID,
            CcBillEventConstants::PRICE_DESCRIPTION => self::TEST_PRICE_DESCRIPTION,
            CcBillEventConstants::RECURRING_PRICE_DESCRIPTION => self::TEST_RECURRING_PRICE_DESCRIPTION,
            CcBillEventConstants::BILLED_INITIAL_PRICE => self::TEST_BILLED_INITIAL_PRICE,
            CcBillEventConstants::BILLED_RECURRING_PRICE => self::TEST_BILLED_RECURRING_PRICE,
            CcBillEventConstants::BILLED_CURRENCY_CODE => self::TEST_BILLED_CURRENCY_CODE,
            CcBillEventConstants::SUBSCRIPTION_INITIAL_PRICE => self::TEST_SUBSCRIPTION_INITIAL_PRICE,
            CcBillEventConstants::SUBSCRIPTION_RECURRING_PRICE => self::TEST_SUBSCRIPTION_RECURRING_PRICE,
            CcBillEventConstants::SUBSCRIPTION_CURRENCY_CODE => self::TEST_SUBSCRIPTION_CURRENCY_CODE,
            CcBillEventConstants::ACCOUNTING_INITIAL_PRICE => self::TEST_ACCOUNTING_INITIAL_PRICE,
            CcBillEventConstants::ACCOUNTING_RECURRING_PRICE => self::TEST_ACCOUNTING_RECURRING_PRICE,
            CcBillEventConstants::ACCOUNTING_CURRENCY_CODE => self::TEST_ACCOUNTING_CURRENCY_CODE,
            CcBillEventConstants::INITIAL_PERIOD => self::TEST_INITIAL_PERIOD,
            CcBillEventConstants::RECURRING_PERIOD => self::TEST_RECURRING_PERIOD,
            CcBillEventConstants::REBILLS => self::TEST_REBILLS,
            CcBillEventConstants::NEXT_RENEWAL_DATE => self::TEST_NEXT_RENEWAL_DATE,
            CcBillEventConstants::SUBSCRIPTION_TYPE_ID => self::TEST_SUBSCRIPTION_TYPE_ID,
            CcBillEventConstants::DYNAMIC_PRICING_VALIDATION_DIGEST => self::TEST_DYNAMIC_PRICING_VALIDATION_DIGEST,
            CcBillEventConstants::PAYMENT_TYPE => self::TEST_PAYMENT_TYPE,
            CcBillEventConstants::CARD_TYPE => self::TEST_CARD_TYPE,
            CcBillEventConstants::BIN => self::TEST_BIN,
            CcBillEventConstants::PRE_PAID => self::TEST_PRE_PAID,
            CcBillEventConstants::LAST_FOUR => self::TEST_LAST_4,
            CcBillEventConstants::EXP_DATE => self::TEST_EXPIRY_DATE,
            CcBillEventConstants::AVS_RESPONSE => self::TEST_AVS_RESPONSE,
            CcBillEventConstants::CVV2_RESPONSE => self::TEST_CVV2_RESPONSE,
            CcBillEventConstants::AFFILIATE_SYSTEM => self::TEST_AFFILIATE_SYSTEM,
            CcBillEventConstants::REFERRING_URL => self::TEST_REFERRING_URL,
            CcBillEventConstants::LIFETIME_SUBSCRIPTION => self::TEST_LIFETIME_SUBSCRIPTION,
            CcBillEventConstants::LIFETIME_PRICE => self::TEST_LIFETIME_PRICE,
            CcBillEventConstants::PAYMENT_ACCOUNT => self::TEST_PAYMENT_ACCOUNT,
            CcBillEventConstants::THREE_D_SECURE => self::TEST_3_D_SECURE,
            CcBillEventConstants::CUSTOM_1 => self::TEST_CUSTOM1
        ], $merge);
    }
}
