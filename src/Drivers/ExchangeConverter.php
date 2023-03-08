<?php

namespace Chandachewe\Currency\Drivers;

require '.../../vendor/autoload.php';
use Chandachewe\Currency\CurrencyConverted;
use Chandachewe\Currency\CurrencyFormats;
use Chandachewe\Currency\Exceptions\CurrencyNotFoundException;

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();
use GuzzleHttp\Client;

class ExchangeConverter
{
    public static function convert($amount, $from, $to)
    {
        try {
            $check_if_valid_from_currency = in_array($from, CurrencyFormats::$formats);
            $check_if_valid_to_currency = in_array($to, CurrencyFormats::$formats);
            if (!$check_if_valid_from_currency) {
                throw new CurrencyNotFoundException($check_if_valid_from_currency);
            } elseif (!$check_if_valid_to_currency) {
                throw new CurrencyNotFoundException($check_if_valid_to_currency);
            } else {
                $client = new Client([
                    'base_uri' => $_ENV['BASE_URL_EXCHANGERATE'],
                    'timeout'  => 120.0,
                ]);
                $response = $client->request('GET', 'convert?from='.$from.'&to='.$to.'&amount='.$amount);
                ExchangeConverter::hydrate($response->getBody());
            }
        } catch (CurrencyNotFoundException $e) {
            $errorMessage = $e->invalidCurrency();

            return $errorMessage;
        }
    }

    protected static function hydrate($response)
    {
        $data = json_decode($response, true);
        CurrencyConverted::$currency_conversion = $data['result'];

        return CurrencyConverted::$currency_conversion;
    }
}
