<?php declare(strict_types = 1);
namespace noxkiwi\money\Currency;

use noxkiwi\money\Currency;

/**
 * I am the currency setup for the Japanese Yen.
 *
 * @package      noxkiwi\money\Currency
 * @author       Jan Nox <jan.nox@pm.me>
 * @license      https://nox.kiwi/license
 * @copyright    2020 noxkiwi
 * @version      1.0.0
 * @link         https://nox.kiwi/
 */
final class JPY extends Currency
{
    public const CODE   = 'JPY';
    public const SYMBOL = '¥';
}
