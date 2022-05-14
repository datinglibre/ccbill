<?php

namespace DatingLibre\CcBill\Event;

use Symfony\Contracts\EventDispatcher\Event;

class ErrorEvent implements CcBillEvent
{
    private int $errorCode;
    private ?string $errorMessage;

    public function __construct(int $errorCode, ?string $errorMessage)
    {
        $this->errorCode = $errorCode;
        $this->errorMessage = $errorMessage;
    }

    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }
}
