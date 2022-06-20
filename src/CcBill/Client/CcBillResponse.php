<?php

declare(strict_types=1);

namespace DatingLibre\CcBill\Client;

class CcBillResponse
{
    private ?array $content;
    private ?CcBillResponseCode $responseCode;

    public function __construct(?array $content, ?CcBillResponseCode $responseCode)
    {
        $this->content = $content;
        $this->responseCode = $responseCode;
    }

    public function getContent(): ?array
    {
        return $this->content;
    }

    public function getResponseCode(): ?CcBillResponseCode
    {
        return $this->responseCode;
    }

    public function isContent(): bool
    {
        return $this->content !== null;
    }

    public function isResponseCode(): bool
    {
        return $this->responseCode !== null;
    }
}
