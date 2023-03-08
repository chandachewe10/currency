<?php

require_once './vendor/autoload.php';
use Chandachewe\Currency\CurrencyConverted;
use Chandachewe\Currency\Drivers\ExchangeConverter;

it('asserts ExchangeConverter request is working Fine', function () {
    // Prepare
    ExchangeConverter::convert(1, 'USD', 'ZMW');

    // Act

    $ZMW_currency = CurrencyConverted::$currency_conversion;
    // Assert
    expect($ZMW_currency)->toBeFloat();
});


?>