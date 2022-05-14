<?php

declare(strict_types=1);

namespace DatingLibre\CcBill\Event;

use DateTimeImmutable;
use DateTimeInterface;

/** Uses CustomerDataUpdate version 4 */
class CustomerDataUpdate implements CcBillEvent
{
    public const NAME = 'CustomerDataUpdate';
    private ?string $subscriptionId;
    private ?string $clientAccnum;
    private ?string $clientSubacc;
    private DateTimeInterface $timestamp;
    private ?string $firstName;
    private ?string $lastName;
    private ?string $paymentAccount;
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
    private ?string $paymentType;
    private ?string $cardType;
    private ?string $bin;
    private ?string $expDate;

    public function __construct(?string $subscriptionId, ?string $clientAccnum, ?string $clientSubacc, ?string $timestamp, ?string $firstName, ?string $lastName, ?string $paymentAccount, ?string $address1, ?string $city, ?string $state, ?string $country, ?string $postalCode, ?string $email, ?string $phoneNumber, ?string $ipAddress, ?string $reservationId, ?string $username, ?string $password, ?string $paymentType, ?string $cardType, ?string $bin, ?string $expDate)
    {
        $this->subscriptionId = $subscriptionId;
        $this->clientAccnum = $clientAccnum;
        $this->clientSubacc = $clientSubacc;
        $this->timestamp =  DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $timestamp);
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->paymentAccount = $paymentAccount;
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
        $this->paymentType = $paymentType;
        $this->cardType = $cardType;
        $this->bin = $bin;
        $this->expDate = $expDate;
    }

    public static function fromArray(array $event)
    {
        return new CustomerDataUpdate(
            $event[CcBillEventConstants::SUBSCRIPTION_ID] ?? null,
            $event[CcBillEventConstants::CLIENT_ACCOUNT_NO] ?? null,
            $event[CcBillEventConstants::CLIENT_SUB_ACCOUNT_NO] ?? null,
            $event[CcBillEventConstants::TIMESTAMP] ?? null,
            $event[CcBillEventConstants::FIRSTNAME] ?? null,
            $event[CcBillEventConstants::LASTNAME] ?? null,
            $event[CcBillEventConstants::PAYMENT_ACCOUNT] ?? null,
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
            $event[CcBillEventConstants::PAYMENT_TYPE] ?? null,
            $event[CcBillEventConstants::CARD_TYPE] ?? null,
            $event[CcBillEventConstants::BIN] ?? null,
            $event[CcBillEventConstants::EXP_DATE] ?? null
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

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getPaymentAccount(): ?string
    {
        return $this->paymentAccount;
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

    public function getExpDate(): ?string
    {
        return $this->expDate;
    }
}
