<?php

namespace Chandachewe\Currency\Drivers;

require '.../../vendor/autoload.php';
use Chandachewe\Currency\CurrencyConverted;
use Chandachewe\Currency\CurrencyFormats;
use Chandachewe\Currency\Exceptions\CurrencyNotFoundException;

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();
use GuzzleHttp\Client;

class ExchangeRate
{
    public static function exchange($base_currency, $referenceCurrency)
    {
        try {
            $check_if_valid_base_currency = in_array($base_currency, CurrencyFormats::$formats);
            $check_if_valid_reference_currency = in_array($referenceCurrency, CurrencyFormats::$formats);
            if (!$check_if_valid_base_currency) {
                throw new CurrencyNotFoundException($check_if_valid_base_currency);
            } elseif (!$check_if_valid_reference_currency) {
                throw new CurrencyNotFoundException($check_if_valid_reference_currency);
            } else {
                $client = new Client([
                    'base_uri' => $_ENV['BASE_URL_EXCHANGERATE'],
                    'timeout'  => 120.0,
                ]);
                $response = $client->request('GET', 'latest?base='.$base_currency);
                ExchangeRate::hydrate($response->getBody(), $referenceCurrency);
            }
        } catch (CurrencyNotFoundException $e) {
            $errorMessage = $e->invalidCurrency();

            return $errorMessage;
        }
    }

    protected static function hydrate($response, $referenceCurrency)
    {
        $data = json_decode($response, true);
        $positionOfReferenceCurrency = array_search($referenceCurrency, CurrencyFormats::$formats);
        CurrencyConverted::$currency_rate = $data['rates'][$referenceCurrency];

        return CurrencyConverted::$currency_rate;
    }
}
