<?php declare(strict_types = 1);
namespace noxkiwi\money;

use noxkiwi\money\Currency\AUD;
use noxkiwi\money\Currency\BGN;
use noxkiwi\money\Currency\BRL;
use noxkiwi\money\Currency\CAD;
use noxkiwi\money\Currency\CHF;
use noxkiwi\money\Currency\CNY;
use noxkiwi\money\Currency\CZK;
use noxkiwi\money\Currency\DKK;
use noxkiwi\money\Currency\GBP;
use noxkiwi\money\Currency\HKD;
use noxkiwi\money\Currency\HRK;
use noxkiwi\money\Currency\HUF;
use noxkiwi\money\Currency\IDR;
use noxkiwi\money\Currency\ILS;
use noxkiwi\money\Currency\INR;
use noxkiwi\money\Currency\ISK;
use noxkiwi\money\Currency\JPY;
use noxkiwi\money\Currency\KRW;
use noxkiwi\money\Currency\MXN;
use noxkiwi\money\Currency\MYR;
use noxkiwi\money\Currency\NOK;
use noxkiwi\money\Currency\NZD;
use noxkiwi\money\Currency\PHP;
use noxkiwi\money\Currency\PLN;
use noxkiwi\money\Currency\RON;
use noxkiwi\money\Currency\RUB;
use noxkiwi\money\Currency\SEK;
use noxkiwi\money\Currency\SGD;
use noxkiwi\money\Currency\THB;
use noxkiwi\money\Currency\USD;
use noxkiwi\money\Currency\ZAR;

/**
 * I am a Currency object.
 *
 * I consist of a code and a symbol.
 * Also I contain the list of registered Currencies in the system.
 *
 * @package      noxkiwi\money
 * @author       Jan Nox <jan.nox@pm.me>
 * @license      https://nox.kiwi/license
 * @copyright    2020 noxkiwi
 * @version      1.0.0
 * @link         https://nox.kiwi/
 */
abstract class Currency
{
    public const CURRENCIES = [
        AUD::class,
        BGN::class,
        BRL::class,
        CAD::class,
        CHF::class,
        CNY::class,
        CZK::class,
        DKK::class,
        GBP::class,
        HKD::class,
        HRK::class,
        HUF::class,
        IDR::class,
        ILS::class,
        INR::class,
        ISK::class,
        JPY::class,
        KRW::class,
        MXN::class,
        MYR::class,
        NOK::class,
        NZD::class,
        PHP::class,
        PLN::class,
        RON::class,
        RUB::class,
        SEK::class,
        SGD::class,
        THB::class,
        USD::class,
        ZAR::class
    ];
    public const CODE   = '';
    public const SYMBOL = '';
    public const MASK   = '{value} <abbr title="{code}">{symbol}</abbr>';
}
