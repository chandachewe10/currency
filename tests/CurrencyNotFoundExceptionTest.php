<?php

require_once './vendor/autoload.php';
use Chandachewe\Currency\CurrencyFormats;
use Chandachewe\Currency\Exceptions\CurrencyNotFoundException;

it('asserts CurrencyNotFoundException is Valid', function () {
    // Prepare
    $currencyName = 'USDD';

    // Act
    $check_if_valid = in_array($currencyName, CurrencyFormats::$formats);

    try {
        if (!$check_if_valid) {
            throw new CurrencyNotFoundException($currencyName);
        }
    } catch (CurrencyNotFoundException $e) {
        $errorMessage = $e->invalidCurrency();
    }
    // Assert
    expect($errorMessage)->toContain('Whoops, this');
});
