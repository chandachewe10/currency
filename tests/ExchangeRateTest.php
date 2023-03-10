<?php

require_once './vendor/autoload.php';
use Chandachewe\Currency\CurrencyFormats;

it('asserts ExchangeRate Array is Working Fine', function () {
    // Prepare
    $requestResponse = '{
        "motd": {
            "msg": "If you or your company use this project or like what we doing, please consider backing us so we can continue maintaining and evolving this project.",
            "url": "https://exchangerate.host/#/donate"
        },
        "success": true,
        "base": "USD",
        "date": "2023-03-07",
        "rates": {
            "AED": 3.672471,
            "AFN": 88.573557,
            "ALL": 107.480047,
            "AMD": 386.491914,
            "ANG": 1.794577,
            "AOA": 504.731151,
            "ARS": 199.29418,
            "AUD": 1.490437,
            "AWG": 1.800181,
            "AZN": 1.700371,
            "BAM": 1.830417,
            "BBD": 1.999884,
            "BDT": 104.46548,
            "BGN": 1.829672,
            "BHD": 0.377443,
            "BIF": 2078.292247,
            "BMD": 1.000483,
            "BND": 1.341161,
            "BOB": 6.878547,
            "BRL": 5.154031,
            "BSD": 0.999971,
            "BTC": 0.000045,
            "BTN": 81.890513,
            "BWP": 13.18466,
            "BYN": 2.512524,
            "BZD": 2.006825,
            "CAD": 1.361817,
            "CDF": 2075.415221,
            "CHF": 0.930319,
            "CLF": 0.02984,
            "CLP": 799.386385,
            "CNH": 6.937718,
            "CNY": 6.933967,
            "COP": 4761.675322,
            "CRC": 553.117734,
            "CUC": 1.000207,
            "CUP": 25.745413,
            "CVE": 103.871304,
            "CZK": 22.049238,
            "DJF": 177.239564,
            "DKK": 6.961369,
            "DOP": 55.190544,
            "DZD": 136.230334,
            "EGP": 30.672406,
            "ERN": 14.99726,
            "ETB": 53.562876,
            "EUR": 0.935967,
            "FJD": 2.216678,
            "FKP": 0.830941,
            "GBP": 0.830911,
            "GEL": 2.595052,
            "GGP": 0.830761,
            "GHS": 12.492654,
            "GIP": 0.830996,
            "GMD": 61.088954,
            "GNF": 8570.850934,
            "GTQ": 7.774219,
            "GYD": 210.027455,
            "HKD": 7.849008,
            "HNL": 24.548264,
            "HRK": 7.046858,
            "HTG": 151.762007,
            "HUF": 352.484528,
            "IDR": 15357.225659,
            "ILS": 3.580218,
            "IMP": 0.831316,
            "INR": 81.767713,
            "IQD": 1452.497416,
            "IRR": 42266.876919,
            "ISK": 140.013214,
            "JEP": 0.830801,
            "JMD": 152.659175,
            "JOD": 0.709549,
            "JPY": 135.981209,
            "KES": 127.975807,
            "KGS": 87.404246,
            "KHR": 4035.186694,
            "KMF": 463.411357,
            "KPW": 899.827473,
            "KRW": 1297.930648,
            "KWD": 0.307139,
            "KYD": 0.830458,
            "KZT": 434.457006,
            "LAK": 16792.688901,
            "LBP": 15147.274325,
            "LKR": 338.748234,
            "LRD": 159.470387,
            "LSL": 18.147595,
            "LYD": 4.806338,
            "MAD": 10.37302,
            "MDL": 18.788692,
            "MGA": 4270.919734,
            "MKD": 57.645808,
            "MMK": 2090.36627,
            "MNT": 3406.311175,
            "MOP": 8.083885,
            "MRU": 34.661112,
            "MUR": 46.741706,
            "MVR": 15.347074,
            "MWK": 1012.486875,
            "MXN": 17.988146,
            "MYR": 4.477175,
            "MZN": 63.88782,
            "NAD": 18.167188,
            "NGN": 458.336864,
            "NIO": 36.491685,
            "NOK": 10.405018,
            "NPR": 130.459968,
            "NZD": 1.611927,
            "OMR": 0.3857,
            "PAB": 1.000784,
            "PEN": 3.773336,
            "PGK": 3.508667,
            "PHP": 55.05579,
            "PKR": 272.646634,
            "PLN": 4.381182,
            "PYG": 7173.097654,
            "QAR": 3.640679,
            "RON": 4.601439,
            "RSD": 109.701442,
            "RUB": 75.458333,
            "RWF": 1089.823738,
            "SAR": 3.752705,
            "SBD": 8.266308,
            "SCR": 13.131222,
            "SDG": 593.386317,
            "SEK": 10.439878,
            "SGD": 1.345591,
            "SHP": 0.831165,
            "SLL": 17661.605482,
            "SOS": 565.932796,
            "SRD": 33.550054,
            "SSP": 130.23518,
            "STD": 22819.604506,
            "STN": 23.304031,
            "SVC": 8.710282,
            "SYP": 2512.047465,
            "SZL": 18.129945,
            "THB": 34.450401,
            "TJS": 10.012418,
            "TMT": 3.499686,
            "TND": 3.116412,
            "TOP": 2.36001,
            "TRY": 18.902607,
            "TTD": 6.747275,
            "TWD": 30.568987,
            "TZS": 2339.550477,
            "UAH": 36.761499,
            "UGX": 3704.737827,
            "USD": 1,
            "UYU": 39.439594,
            "UZS": 11373.970384,
            "VES": 24.2826,
            "VND": 23650.099793,
            "VUV": 118.021673,
            "WST": 2.698179,
            "XAF": 613.535445,
            "XAG": 0.048114,
            "XAU": 0.001704,
            "XCD": 2.702774,
            "XDR": 0.748817,
            "XOF": 613.53489,
            "XPD": 0.001652,
            "XPF": 111.615447,
            "XPT": 0.001656,
            "YER": 250.251782,
            "ZAR": 18.23386,
            "ZMW": 20.033589,
            "ZWL": 321.938271
        }
    }';

    // Act
    $data = json_decode($requestResponse, true);

    // Assert
    expect($data['rates']['AED'])->toEqual(3.672471);
    expect(CurrencyFormats::$formats[0])->toEqual('AED');
});
