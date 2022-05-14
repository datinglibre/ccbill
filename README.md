# DatingLibre CCBill library (unofficial)

Provides following functionality:
- maps CCBill JSON webhook event payloads to PHP objects.

Please test each of the events you require.

## Installation

### Composer

Include as composer dependency

    composer require datinglibre/ccbill

### Error handling

An unknown event will return `ErrorEvent`.

### Tests

    composer install
    ./vendor/bin/phpunit

### Versions

| Event | Version |
|-------|---------|
| BillingDateChange | 1 | 
| Cancellation | 1 |
| ChargeBack | 4 | 
| CrossSaleFailure | Not implemented |
| CrossSaleSuccess | Not implemented |
| CustomerDataUpdate | 4 |
| Expiration | 1 |
| NewSaleFailure | 3 | 
| NewSaleSuccess | 6 |
| Refund | 4 | 
| RenewalFailure | 3 | 
| RenewalSucesss | 5 | 
| Return | 4 |
| UpgradeFailure | Same as NewSaleFailure |
| UpgradeSuccess | 2 |
| UpSaleFailure | Not implemented |
| UpSaleSuccess | Not implemented |
| UserReactivation | 1 |
| Void | 4 | 

## Licence

Copyright 2020-2022 DatingLibre.

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
