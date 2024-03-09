<?php

namespace Chandachewe\Currency\Drivers;

require '.../../vendor/autoload.php';
use Chandachewe\Currency\CurrencyConverted;
use Chandachewe\Currency\CurrencyFormats;
use Chandachewe\Currency\Exceptions\CurrencyNotFoundException;
use Chandachewe\Currency\Exceptions\ApiKeyNotFoundException;
use Chandachewe\Currency\DriverAccessKeys\ExchangeRateDriverAccessKey;

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
                throw new CurrencyNotFoundException($base_currency);
            } elseif (!$check_if_valid_reference_currency) {
                throw new CurrencyNotFoundException($referenceCurrency);
            } else {

                $api_key = ExchangeRateDriverAccessKey::$exchangerate_access_key;
                if (empty($api_key) || is_null($api_key)) {
                    throw new ApiKeyNotFoundException(ExchangeRateDriverAccessKey::$exchangerate_access_key);
                }


                $client = new Client([
                    'base_uri' => $_ENV['BASE_URL_EXCHANGERATE'],
                    'timeout' => 120.0,
                ]);
                $response = $client->request('GET', 'live?access_key=' . $api_key);
                ExchangeRate::hydrate($response->getBody(), $base_currency, $referenceCurrency);
            }
        } catch (CurrencyNotFoundException $e) {
            $errorMessage = $e->invalidCurrency();

            return $errorMessage;
        } catch (ApiKeyNotFoundException $e) {
            $errorMessage = $e->invalidApiKey();

            return $errorMessage;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    protected static function hydrate($response, $base_currency, $referenceCurrency)
    {
        $data = json_decode($response, true);


        $currency_rate_key = $base_currency . $referenceCurrency;
        CurrencyConverted::$currency_rate = $data['quotes'][$currency_rate_key];
        return CurrencyConverted::$currency_rate;
    }
}
