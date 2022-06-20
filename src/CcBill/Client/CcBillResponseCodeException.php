<?php

declare(strict_types=1);

namespace DatingLibre\CcBill\Client;

use Exception;

class CcBillResponseCodeException extends Exception
{
    private ?string $response;
    private string $responseMessage;
}
