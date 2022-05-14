<?php

declare(strict_types=1);

namespace CcBill\Client;

use DatingLibre\CcBill\Client\CcBillClient;
use DatingLibre\CcBill\Client\CcBillResponseCodeException;
use Exception;
use PHPUnit\Framework\TestCase;

class CcBillClientTest extends TestCase
{
    /**
     * @throws CcBillResponseCodeException
     */
    public function testParsesError(): void
    {
        $response = CcBillClient::parseResponse(<<<EOD
<?xml version='1.0' standalone='yes'?>
<results>-3</results>
EOD);

        $this->assertTrue($response->isResponseCode());
        $this->assertTrue($response->getResponseCode()->isError());
    }

    public function testThrowsExceptionWhenMalformedXml(): void
    {
        $this->expectException(Exception::class);
        CcBillClient::parseResponse(<<<EOD
malformed
EOD);
    }

    public function testThrowsExceptionWhenMissingResponseCode(): void
    {
        $this->expectException(CcBillResponseCodeException::class);
        CcBillClient::parseResponse(<<<EOD
<?xml version='1.0' standalone='yes'?>
<results>hello</results>
EOD);
    }
}
