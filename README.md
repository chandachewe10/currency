<h1 align="center">Currency</h1>

<p align="center">
A PHP Package to convert Amount from one currency to the other.
</p>



## Requirements

- PHP >= 7.3

## Installation

Install currency using `composer require`:

```bash
composer require chandachewe/currency
```

Add the  `namespaces and vendor/autoload in the file you will be doing your conversions from. Am assuming the file and the vendor are both in the root directory. In your file include the following on top`:


```php
 require './vendor/autoload.php';   
 use Chandachewe\Currency\Drivers\ExchangeConverter;
 use Chandachewe\Currency\Drivers\ExchangeRate;
 use Chandachewe\Currency\CurrencyConverted;
 use Chandachewe\Currency\CurrencyFormats;
```


## Usage

### Convert Amount from One Currency to the other
You can convert the amount from one currency to the other using the following code:

```php
ExchangeConverter::convert('amount', 'from this currency', 'to this currency');

> **Important**: See the supoorted currency formats below. 
>  Use of unsupoorted formats will throw an exception

Suppose I want to convert 10 USD to GBP then my code will be:

ExchangeConverter::convert(10, 'USD', 'GBP');

Then you can retrieve the result as follows: 
echo CurrencyConverted::$currency_conversion 


```


### Obtain the Exchange rate between two currencies
You can also obtain the exchange rates between two currencies as follows: 
```php
ExchangeRate::exchange('from this currency', 'to this currency');

Suppose I want to obtain the exchange rate between 1 USD and the GBP then my code will be as follows:

ExchangeRate::exchange('USD', 'GBP');

Then you can retrieve the result as follows: 

echo CurrencyConverted::$currency_rate;

```
## Drivers

### Available Drivers


- [Exchangerates](https://exchangerate.host/) 


## Versioning

Releases will be numbered with the following format:

```bash
<major>.<minor>.<patch>
```

## Supported Currency Formats

```bash
        "AED",
        "AFN",
        "ALL",
        "AMD",
        "ANG",
        "AOA",
        "ARS",
        "AUD",
        "AWG",
        "AZN",
        "BAM",
        "BBD",
        "BDT",
        "BGN",
        "BHD",
        "BIF",
        "BMD",
        "BND",
        "BOB",
        "BRL",
        "BSD",
        "BTC",
        "BTN",
        "BWP",
        "BYN",
        "BZD",
        "CAD",
        "CDF",
        "CHF",
        "CLF",
        "CLP",
        "CNH",
        "CNY",
        "COP",
        "CRC",
        "CUC",
        "CUP",
        "CVE",
        "CZK",
        "DJF",
        "DKK",
        "DOP",
        "DZD",
        "EGP",
        "ERN",
        "ETB",
        "EUR",
        "FJD",
        "FKP",
        "GBP",
        "GEL",
        "GGP",
        "GHS",
        "GIP",
        "GMD",
        "GNF",
        "GTQ",
        "GYD",
        "HKD",
        "HNL",
        "HRK",
        "HTG",
        "HUF",
        "IDR",
        "ILS",
        "IMP",
        "INR",
        "IQD",
        "IRR",
        "ISK",
        "JEP",
        "JMD",
        "JOD",
        "JPY",
        "KES",
        "KGS",
        "KHR",
        "KMF",
        "KPW",
        "KRW",
        "KWD",
        "KYD",
        "KZT",
        "LAK",
        "LBP",
        "LKR",
        "LRD",
        "LSL",
        "LYD",
        "MAD",
        "MDL",
        "MGA",
        "MKD",
        "MMK",
        "MNT",
        "MOP",
        "MRU",
        "MUR",
        "MVR",
        "MWK",
        "MXN",
        "MYR",
        "MZN",
        "NAD",
        "NGN",
        "NIO",
        "NOK",
        "NPR",
        "NZD",
        "OMR",
        "PAB",
        "PEN",
        "PGK",
        "PHP",
        "PKR",
        "PLN",
        "PYG",
        "QAR",
        "RON",
        "RSD",
        "RUB",
        "RWF",
        "SAR",
        "SBD",
        "SCR",
        "SDG",
        "SEK",
        "SGD",
        "SHP",
        "SLL",
        "SOS",
        "SRD",
        "SSP",
        "STD",
        "STN",
        "SVC",
        "SYP",
        "SZL",
        "THB",
        "TJS",
        "TMT",
        "TND",
        "TOP",
        "TRY",
        "TTD",
        "TWD",
        "TZS",
        "UAH",
        "UGX",
        "USD",
        "UYU",
        "UZS",
        "VES",
        "VND",
        "VUV",
        "WST",
        "XAF",
        "XAG",
        "XAU",
        "XCD",
        "XDR",
        "XOF",
        "XPD",
        "XPF",
        "XPT",
        "YER",
        "ZAR",
        "ZMW",
        "ZWL"
        ```
