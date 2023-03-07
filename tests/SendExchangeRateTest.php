<?php    
use Chandachewe\Currency\Drivers\ExchangeRate;    
use Chandachewe\Currency\CurrencyFormats; 

it('asserts ExchangeRate request is working Fine', function () {
    // Prepare
    $response = new ExchangeRate('USD');

    // Act
   
$AED_currency = CurrencyFormats::$formats[0];
    // Assert
    expect($AED_currency)->toBeFloat();
});






?>