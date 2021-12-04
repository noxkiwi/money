<?php declare(strict_types = 1);
namespace noxkiwi\money;

use JetBrains\PhpStorm\Pure;
use noxkiwi\core\Helper\StringHelper;

/**
 * I am a money value.
 * A money value consists of the value itself,
 * next to the Currency that the monetary value exists for.
 *
 * I consist of a code and a symbol.
 *
 * @package      noxkiwi\money
 * @author       Jan Nox <jan.nox@pm.me>
 * @license      https://nox.kiwi/license
 * @copyright    2020 noxkiwi
 * @version      1.0.0
 * @link         https://nox.kiwi/
 */
final class Money
{
    /** @var float I am the amount of given $currency that is held in the object. */
    private float    $value;
    /** @var \noxkiwi\money\Currency I am the Currency that the $value is meant in. */
    private Currency $currency;

    /**
     * Money constructor.
     *
     * @param float                   $value    I am the amount of given $currency that is held in the object.
     * @param \noxkiwi\money\Currency $currency I am the Currency that the $value is meant in.
     */
    public function __construct(float $value, Currency $currency)
    {
        $this->value    = $value;
        $this->currency = $currency;
    }

    /**
     * I will simply output the price without formatting.
     * @return string
     */
    #[Pure] public function output(): string
    {
        return StringHelper::interpolate(
            $this->getCurrency()::MASK,
            [
                'symbol' => $this->getCurrency()::SYMBOL,
                'code'   => $this->getCurrency()::CODE,
                'value'  => $this->getValue()
            ]
        );
    }

    /**
     * I will return the Currency of this Money object.
     * @return \noxkiwi\money\Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     * I will return the value that is part of me.
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
}
