<?php

declare(strict_types=1);

namespace DatingLibre\CcBill\Client;

use Exception;
use SimpleXMLElement;

class CcBillClient
{
    /**
     * @throws Exception
     */
    public static function parseResponse(string $xmlString): CcBillResponse
    {
        $xml = @simplexml_load_string($xmlString);

        if ($xml === false) {
            throw new Exception(sprintf('Could not parse XML [%s]', $xmlString));
        }

        if (self::isCodeResponse($xml)) {
            return new CcBillResponse(null, self::parseResponseCode($xml));
        } else {
            return new CcBillResponse(json_decode(json_encode($xml), true), null);
        }
    }

    private static function isCodeResponse(SimpleXMLElement $xml): bool
    {
        return count(json_decode(json_encode($xml), true)) === 1;
    }

    /**
     * @throws CcBillResponseCodeException
     */
    private static function parseResponseCode(SimpleXMLElement $xml): CcBillResponseCode
    {
        // don't cast non-numeric values to an int
        // to avoid evaluating to 1, which is a success code
        if (!is_numeric((string) $xml[0])) {
            throw new CcBillResponseCodeException(sprintf('Response code [%s] is not numeric', $xml[0]));
        }

        $responseCode = $xml[0];

        switch ($responseCode) {
            case -24:
                return new CcBillResponseCode(-24, 'Purchase limit reached');
            case -23:
                return new CcBillResponseCode(-23, 'Transaction limit reached');
            case -16:
                return new CcBillResponseCode(-16, 'Merchant over void threshold');
            case -15:
                return new CcBillResponseCode(-15, 'Merchant over refund threshold');
            case -12:
                return new CcBillResponseCode(-12, 'The merchant has unsuccessfully logged into the system 3 or more times in the last hour. The merchant should wait an hour before attempting to login again and is advised to review the login information.');
            case -11:
                return new CcBillResponseCode(-11, 'Subscription is not eligible for a discount, recurring price less than $5.00.');
            case -10:
                return new CcBillResponseCode(-10, 'The merchant has not been set up to use the Datalink system.');
            case -9:
                return new CcBillResponseCode(-9, 'The merchant’s account has been deactivated for use on the Datalink system or the merchant is not permitted to perform the requested action');
            case -8:
                return new CcBillResponseCode(-8, 'The IP Address the merchant was attempting to authenticate on was not in the valid range.');
            case -7:
                return new CcBillResponseCode(-7, 'There was an internal error or a database error and the requested action could not complete.');
            case -6:
                return new CcBillResponseCode(-6, 'The requested action was invalid');
            case -5:
                return new CcBillResponseCode(-5, 'The arguments provided for the requested action were invalid or missing.');
            case -4:
                return new CcBillResponseCode(-4, 'The given subscription was not for the account the merchant was authenticated on.');
            case -3:
                return new CcBillResponseCode(-3, 'No record was found for the given subscription.');
            case -2:
                return new CcBillResponseCode(-2, 'The subscription id provided was invalid or the subscription type is not supported by the requested action.');
            case -1:
                return new CcBillResponseCode(-1, 'The arguments provided to authenticate the merchant were invalid or missing.');
            case 0:
                return new CcBillResponseCode(0, 'The requested action failed.');
            case 1:
                return new CcBillResponseCode(1, 'The requested action was a success.');
            default:
                throw new CcBillResponseCodeException(sprintf('Unrecognized error code %s', $responseCode));
        }
    }
}
