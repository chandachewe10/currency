<?php

require_once './vendor/autoload.php';
use Chandachewe\Currency\CurrencyFormats;

it('asserts Currency is Valid', function () {
    // Prepare
    $currencyName = 'USD';

    // Act
    $check_if_valid = in_array($currencyName, CurrencyFormats::$formats);

    // Assert
    expect($check_if_valid)->toEqual(1);
});


?>