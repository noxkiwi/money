<?php declare(strict_types = 1);
namespace noxkiwi\money\Helper;

use noxkiwi\core\Datacontainer;
use noxkiwi\core\Exception\InvalidJsonException;
use noxkiwi\core\Helper\DateTimeHelper;
use noxkiwi\core\Helper\JsonHelper;
use noxkiwi\money\Currency;
use noxkiwi\money\Exception\ExchangeException;
use noxkiwi\money\Exchange;
use noxkiwi\money\Exchanged;
use noxkiwi\money\Money;
use function file_get_contents;
use const E_USER_NOTICE;

/**
 * I am the helper for Exchanges.
 *
 * @package      noxkiwi\money\Helper
 * @author       Jan Nox <jan.nox@pm.me>
 * @license      https://nox.kiwi/license
 * @copyright    2020 noxkiwi
 * @version      1.0.0
 * @link         https://nox.kiwi/
 */
abstract class MoneyHelper
{
    /**
     * I will exchange the given Money into the given Currency.
     *
     * @param \noxkiwi\money\Money    $source I am the Money value with the source Currency.
     * @param \noxkiwi\money\Currency $target I am the target Currency.
     *
     * @throws \noxkiwi\money\Exception\ExchangeException Thrown in case the exchange rate has not been found.
     * @return \noxkiwi\money\Exchanged
     */
    public static function exchangeMoney(Money $source, Currency $target): Exchanged
    {
        $exchange = static::getExchange($source->getCurrency(), $target);
        $value    = $source->getValue() * $exchange->getRate();
        $result   = new Money($value, $target);

        return new Exchanged($source, $result, $exchange);
    }

    /**
     * I will return the exchange rate between both Currency objects.
     *
     * @param \noxkiwi\money\Currency $source I am the Currency you want to exchange FROM
     * @param \noxkiwi\money\Currency $target I am the Currency you want to exchange INTO
     *
     * @throws \noxkiwi\money\Exception\ExchangeException Thrown in case the exchange rate cannot be found.
     * @return \noxkiwi\money\Exchange
     */
    public static function getExchange(Currency $source, Currency $target): Exchange
    {
        $targetCode = $target::CODE;
        $sourceCode = $source::CODE;
        $response   = file_get_contents("https://api.ratesapi.io/api/latest?base=$sourceCode&symbols=$targetCode");
        if (empty($response)) {
            throw new ExchangeException('The response of the API was invalid.', E_USER_NOTICE);
        }
        try {
            $response = JsonHelper::decodeStringToArray($response);
        } catch (InvalidJsonException $exception) {
            throw new ExchangeException('Invalid JSON was returned from API.', E_USER_NOTICE, $exception);
        }
        $container    = new Datacontainer($response);
        $exchangeRate = $container->get("rates>$targetCode");
        if ($exchangeRate === null) {
            throw new ExchangeException("Currency $targetCode is not part of the response.", E_USER_NOTICE);
        }

        return new Exchange($source, $target, DateTimeHelper::normalize('', true), $exchangeRate, 'ratesAPI');
    }
}
