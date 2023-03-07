<?php
require_once './vendor/autoload.php';
use Chandachewe\Currency\Drivers\ExchangeConverter;
use Chandachewe\Currency\CurrencyConverted;

it('asserts ExchangeConverter request is working Fine', function () {
    // Prepare
    $response = new ExchangeConverter();
    $response->convert(1,'USD','ZMW');

    // Act

    $ZMW_currency = CurrencyConverted::$currency_conversion;
    // Assert
    expect($ZMW_currency)->toBeFloat();
});


?>
