<?php

use Chandachewe\Currency\CurrencyFormats;
use Chandachewe\Currency\Drivers\ExchangeRate;

it('asserts ExchangeRate request is working Fine', function () {
    // Prepare
    $response = new ExchangeRate('USD', 'AED');

    // Act

    $AED_currency = CurrencyFormats::$formats[0];
    // Assert
    expect($AED_currency)->toBeFloat();
});
