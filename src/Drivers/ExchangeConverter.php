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

class ExchangeConverter
{
    public static function convert($amount, $from, $to)
    {
        try {
            $check_if_valid_from_currency = in_array($from, CurrencyFormats::$formats);
            $check_if_valid_to_currency = in_array($to, CurrencyFormats::$formats);
            if (!$check_if_valid_from_currency) {
                throw new CurrencyNotFoundException($from);
            } elseif (!$check_if_valid_to_currency) {
                throw new CurrencyNotFoundException($to);
            } else {

              

                    $api_key = ExchangeRateDriverAccessKey::$exchangerate_access_key;
                    if (empty($api_key) || is_null($api_key)) {
                        throw new ApiKeyNotFoundException(ExchangeRateDriverAccessKey::$exchangerate_access_key);
                    }

                    $client = new Client([
                        'base_uri' => $_ENV['BASE_URL_EXCHANGERATE'],
                        'timeout' => 120.0,
                    ]);
                    $response = $client->request('GET', 'convert?access_key='.$api_key.'&from=' . $from . '&to=' . $to . '&amount=' . $amount);
                    ExchangeConverter::hydrate($response->getBody());
                 

            }
        } catch (CurrencyNotFoundException $e) {
            $errorMessage = $e->invalidCurrency();

            return $errorMessage;
        }
        catch (ApiKeyNotFoundException $e) {
            $errorMessage = $e->invalidApiKey();

            return $errorMessage;
        } catch (\Exception $e) {
            return $e->getMessage();
        }



    }

    protected static function hydrate($response)
    {

        $data = json_decode($response, true);
        if ($data) {
          CurrencyConverted::$currency_conversion = $data['result'];

            return $data;
        }

    }
}
