<?php declare(strict_types = 1);
namespace noxkiwi\money\Currency;

use noxkiwi\money\Currency;

/**
 * I am the currency setup for the Israeli Shekel.
 *
 * @package      noxkiwi\money\Currency
 * @author       Jan Nox <jan.nox@pm.me>
 * @license      https://nox.kiwi/license
 * @copyright    2020 noxkiwi
 * @version      1.0.0
 * @link         https://nox.kiwi/
 */
final class ILS extends Currency
{
    public const CODE   = 'ILS';
    public const SYMBOL = '₪';
}
