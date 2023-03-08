<?php

use Chandachewe\Currency\CurrencyConverted;
use Chandachewe\Currency\Drivers\ExchangeRate;

it('asserts ExchangeRate request is working Fine', function () {
    // Prepare
    ExchangeRate::exchange('USD', 'AED');

    // Act

    $AED_currency = CurrencyConverted::$currency_rate;
    // Assert
    expect($AED_currency)->toBeFloat();
});
