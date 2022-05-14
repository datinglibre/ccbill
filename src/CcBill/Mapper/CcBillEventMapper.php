<?php

declare(strict_types=1);

namespace DatingLibre\CcBill\Mapper;

use DatingLibre\CcBill\Event\BillingDateChangeEvent;
use DatingLibre\CcBill\Event\CancellationEvent;
use DatingLibre\CcBill\Event\CcBillEvent;
use DatingLibre\CcBill\Event\ChargebackEvent;
use DatingLibre\CcBill\Event\CustomerDataUpdate;
use DatingLibre\CcBill\Event\ErrorEvent;
use DatingLibre\CcBill\Event\ExpirationEvent;
use DatingLibre\CcBill\Event\NewSaleFailureEvent;
use DatingLibre\CcBill\Event\NewSaleSuccessEvent;
use DatingLibre\CcBill\Event\RefundEvent;
use DatingLibre\CcBill\Event\RenewalFailureEvent;
use DatingLibre\CcBill\Event\RenewalSuccessEvent;
use DatingLibre\CcBill\Event\ReturnEvent;
use DatingLibre\CcBill\Event\UpgradeFailureEvent;
use DatingLibre\CcBill\Event\UpgradeSuccessEvent;
use DatingLibre\CcBill\Event\UserReactivationEvent;
use DatingLibre\CcBill\Event\VoidEvent;

class CcBillEventMapper
{
    public static function mapEvent(string $eventType, array $event): CcBillEvent
    {
        switch ($eventType) {
            case NewSaleSuccessEvent::NAME:
                return NewSaleSuccessEvent::fromArray($event);
            case NewSaleFailureEvent::NAME:
                return NewSaleFailureEvent::fromArray($event);
            case UserReactivationEvent::NAME:
                return UserReactivationEvent::fromArray($event);
            case UpgradeSuccessEvent::NAME:
                return UpgradeSuccessEvent::fromArray($event);
            case UpgradeFailureEvent::NAME:
                return UpgradeFailureEvent::fromArray($event);
            case CancellationEvent::NAME:
                return CancellationEvent::fromArray($event);
            case ExpirationEvent::NAME:
                return ExpirationEvent::fromArray($event);
            case BillingDateChangeEvent::NAME:
                return BillingDateChangeEvent::fromArray($event);
            case CustomerDataUpdate::NAME:
                return CustomerDataUpdate::fromArray($event);
            case RenewalSuccessEvent::NAME:
                return RenewalSuccessEvent::fromArray($event);
            case RenewalFailureEvent::NAME:
                return RenewalFailureEvent::fromArray($event);
            case ChargebackEvent::NAME:
                return ChargebackEvent::fromArray($event);
            case ReturnEvent::NAME:
                return ReturnEvent::fromArray($event);
            case RefundEvent::NAME:
                return RefundEvent::fromArray($event);
            case VoidEvent::NAME:
                return VoidEvent::fromArray($event);
            default:
                return new ErrorEvent(-1, sprintf('Unrecognized eventType %s', $eventType));
        }
    }
}
