<?php

declare(strict_types=1);

namespace DatingLibre\CcBill\Client;

class CcBillResponseCode
{
    private int $code;
    private string $message;

    public function __construct(int $code, string $message)
    {
        $this->code = $code;
        $this->message = $message;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function isError(): bool
    {
        return $this->code !== 1;
    }
}
